<?php

namespace frontend\controllers;

use common\models\ContentBlock;
use common\models\Redirects;
use common\models\SitePages;
use yii\web\Controller;
use Yii;

abstract class AppController extends Controller {

    public $pageId;
    public $page;
    public $blocks;

    function init() {
        try {
            $redirects = (new Redirects())->getAllRedirect();
            foreach ($redirects as $redirect) {
                if ($redirect['redirect_with']
                    === trim(Yii::$app->request->pathInfo, '/')
                ) {
                    $redirect_url = empty($redirect['redirect_to']) ? '/'
                        : $redirect['redirect_to'];
                    $redirect_url = strripos($redirect_url, 'http') === FALSE
                        ? '/'.$redirect_url : $redirect_url;
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$redirect_url);
                    exit();
                }
            }
        } catch (\Exception $e) {
        }
        $url = trim(Yii::$app->request->pathInfo, '/');
        $this->page = SitePages::findOne([
            'url' => $url,
        ]);
        $this->blocks = ContentBlock::getBlockByPage($this->page->id);

        parent::init();
    }

    protected function processPageRequest($param = 'page') {
        if (Yii::$app->request->isAjax && isset($_POST[$param])) {
            $_GET[$param] = Yii::$app->request->post($param);
        }
    }

    protected function cUrl($url, $params, $method = 'POST', $header = []) {
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            if (!empty($header)) {
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            }
            if ($method == 'POST') {
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($curl, CURLOPT_POSTFIELDS,
                    http_build_query($params));
            }
            $responseJson = json_decode(curl_exec($curl));
            curl_close($curl);
        }
        return $responseJson;
    }

}