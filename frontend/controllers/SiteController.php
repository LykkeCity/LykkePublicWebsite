<?php

namespace frontend\controllers;

use common\enum\KycStatus;
use Yii;
use common\models\LykkeUser;
use common\models\LykkeUserAccess;

class SiteController extends AppController {

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = FALSE;
        return parent::beforeAction($action);
    }

    function actionSignin() {
        $getParams = [
            'client_id' => Yii::$app->params['oAuthLykke']['clientId'],
            'redirect_uri' => Yii::$app->params['oAuthLykke']['redirectUri'],
            'response_type' => 'code',
            'scope' => 'openid profile email address',
            'response_mode' => 'form_post',
            'state' => Yii::$app->request->getCsrfToken(),
        ];
        $urlRedirect = Yii::$app->params['oAuthLykke']['urlAuthorize']."?"
            .http_build_query($getParams);
        $session = Yii::$app->session;
        $session->set('redirect_to', Yii::$app->request->referrer);
        print_r($getParams);
        Yii::$app->response->redirect($urlRedirect);
    }

    function actionLogout() {
        Yii::$app->user->logout();
        $this->cUrl(Yii::$app->params['oAuthLykke']['urlLogout'], '');
        return $this->goHome();
    }

    function actionAuth() {
        $state = Yii::$app->request->post('state');
        $csrfToken = Yii::$app->request->validateCsrfToken($state);
        if (Yii::$app->request->isPost && $csrfToken) {
            $params = [
                'code' => Yii::$app->request->post('code'),
                'client_secret' => Yii::$app->params['oAuthLykke']['clientSecret'],
                'client_id' => Yii::$app->params['oAuthLykke']['clientId'],
                'grant_type' => "authorization_code",
                'redirect_uri' => Yii::$app->params['oAuthLykke']['redirectUri'],
            ];
            //TODO: wrapping this integration with auth core
            $responseJson
                = $this->cUrl(Yii::$app->params['oAuthLykke']['urlToken'],
                $params);
            if (!empty($responseJson->error)) {
                return $this->render('error', [
                    'name' => 'AUTHORIZATION ERROR',
                    'message' => '',
                ]);
            }
            $this->getUserInfo($responseJson->access_token);
        }
    }

    function getUserInfo($access_token) {
        // TODO: wrapping this integration with auth core
        $userInfo = $this->cUrl(Yii::$app->params['oAuthLykke']['urlUserInfo']
            .'?access_token='.$access_token, '', 'GET');
        if (!empty($userInfo->error)) {
            return $this->render('error', [
                'name' => 'AUTHORIZATION ERROR',
                'message' => '',
            ]);
        }
        $this->authorizeUser($userInfo);
    }

    function getKycStatus($email) {
        $kycStatus = $this->cUrl(Yii::$app->params['oAuthLykke']['urlKycStatus']
            .'?email='.$email, '', 'GET',
            ['application_id: '.getenv('OAUTH_CLIENT_ID')]);
        return empty($kycStatus) ? KycStatus::NEED_TO_FILL_DATA : $kycStatus;
    }

    function authorizeUser($userInfo) {
        $model = new LykkeUser();
        $user = $model->findUserByEmail($userInfo->email);
        $userInfo->kyc_status = $this->getKycStatus($userInfo->email);
        if (empty($user)) {
            $user = $model->addNewUser($userInfo);
            if ($user === FALSE) {
                return $this->render('error', [
                    'name' => 'AUTHORIZATION ERROR',
                    'message' => '',
                ]);
            }
            $access = new LykkeUserAccess();
            $access->accessByNewUser($user->id);
        } else {
            $user = $model->updateUserData($user->id, $userInfo);
            if ($user === FALSE) {
                return $this->render('error', [
                    'name' => 'AUTHORIZATION ERROR',
                    'message' => '',
                ]);
            }
        }
        Yii::$app->user->login($user, 0);
        $session = Yii::$app->session;
        $redirect = $session->get('redirect_to');
        $session->remove('redirect_to');
        return empty($redirect) ? $this->goHome() : $this->redirect($redirect);
    }

}
