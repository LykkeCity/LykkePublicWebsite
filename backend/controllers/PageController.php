<?php

namespace backend\controllers;

use common\models\ContentBlock;
use common\models\SitePages;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii;

class PageController extends AppController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add', 'edit', 'inlinesave'],
                'rules' => [
                    [
                        'actions' => ['index', 'add', 'edit', 'inlinesave'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add' => ['post', 'get'],
                    'edit' => ['post', 'get'],
                    'inlinesave' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $pages = SitePages::find()->all();
        return $this->render('index', [
            'pages' => $pages,
        ]);
    }

    public function actionAdd() {
        $result = null;
        $pageid = null;
        if (Yii::$app->request->isPost) {
            $model = new SitePages();
            $page = $model->InsertOrUpdate(Yii::$app->request->post());
            $result = $page ? 'success' : 'error';
            $pageid = $page->id;
        }
        return $this->render('add', [
            'result' => $result,
            'id' => $pageid,
            'parents' => SitePages::find()->where(['parent' => ''])->all(),
        ]);
    }

    public function actionEdit($id) {
        $result = null;
        if (empty($id)) {
            $this->redirect('index');
        }
        if (Yii::$app->request->isPost) {
            $model = new SitePages();
            $pageUpd = $model->InsertOrUpdate(Yii::$app->request->post(),
                Yii::$app->request->post('id'));
            $result = $pageUpd ? 'success' : 'error';
        }
        $page = SitePages::find()->where(['id' => $id])->asArray()->one();
        $route = explode('/', $page['route']);
        $page['controller'] = $route[0];
        $page['action'] = $route[1];
        if (empty($page)) {
            $this->redirect('index');
        }
        return $this->render('edit', [
            'page' => $page,
            'result' => $result,
            'parents' => SitePages::find()->where(['parent' => ''])->all(),
        ]);
    }

    public function actionDeleted($id) {
        $page = SitePages::findOne($id);
        $page->delete();
        $this->redirect('index');
    }

    function actionInlinesave() {
        if (Yii::$app->request->isAjax) {
            if (Yii::$app->request->isPost) {
                $page = SitePages::findOne(Yii::$app->request->post('id'));
                $page->content = Yii::$app->request->post('content');
                return $page->save() ? 'success' : 'fail';
            }
        }
        return false;
    }

    public function actionNew(){
        $page = SitePages::createPage();

        return $this->redirect('/control/pages/'.$page->id.'/view');
    }

    public function actionDelete($id){
        $page = SitePages::findOne([
            'id' => $id
        ]);

        if($page->deletePage()){
            return $this->redirect('/control/pages/');
        }else{
            return $this->redirect('/control/pages/'.$id.'/view');
        }
    }

    public function actionList() {
        $this->view->title = "Pages";
        $pages = SitePages::find()->all();
        return $this->render("list", [
            'pages' => $pages,
        ]);
    }

    public function actionView($id) {
        $page = SitePages::findOne([
            'id' => $id,
        ]);

        $this->view->title = 'Edit page';

        $contentBlocks = ContentBlock::findAll([
            'pageId' => $id,
        ]);
        return $this->render('view', [
            'page' => $page,
            'contentBlocks' => $contentBlocks,
        ]);
    }

    public function actionSavePage() {
        if (!Yii::$app->request->isPost) {
            return Json::encode([
                'result' => 'error',
                'message' => 'method not allowed'
            ]);
        }

        $id = Yii::$app->request->post('id');
        if($id == ''){
            return Json::encode([
                'result' => 'error',
                'message' => 'id - is needed param'
            ]);
        }
        $page = SitePages::findOne([
            'id' => $id
        ]);
        $page->name = Yii::$app->request->post('name', '');
        $page->datetime = Yii::$app->request->post('datetime', '');
        $page->template = Yii::$app->request->post('template');
        $page->title = Yii::$app->request->post('title', '');
        $page->description = Yii::$app->request->post('description', '');
        $page->keywords = Yii::$app->request->post('keywords', '');
        $page->in_menu = (Yii::$app->request->post('in_menu', '')=='true'?1:0);
        $page->published = Yii::$app->request->post('published', '')=='true'?1:0;
        $page->url = Yii::$app->request->post('url', '');

        print_r($_POST);
        print_r($page);
        if($page->save()){
            return Json::encode([
                'result' => 'OK'
            ]);
        }else{
            return Json::encode([
                'result' => 'error',
            ]);
        }
    }

    public function actionCreateContentBlock(){
        if (!Yii::$app->request->isAjax) {
            return Json::encode([
                'result' => 'error',
                'message' => 'not xhr'
            ]);
        }
        if (!Yii::$app->request->isPost) {
            return Json::encode([
                'result' => 'error',
                'message' => 'method not allowed'
            ]);
        }


        $pageId = Yii::$app->request->post('pageId');
        if($pageId == ''){
            return Json::encode([
                'result' => 'error',
                'message' => 'pageId - is needed param'
            ]);
        }

        $contentBlock = new ContentBlock();
        $contentBlock->pageId = $pageId;
        if($contentBlock->save()){
            return Json::encode([
                'result' => 'OK',
                'id' => $contentBlock->id
            ]);
        }else{
            return Json::encode([
                'result' => 'error'
            ]);
        }
    }

    public function actionDeleteContentBlock(){

    }

    public function actionSaveContentBlock(){
//        if (!Yii::$app->request->isAjax) {
//            return Json::encode([
//                'result' => 'error',
//                'message' => 'not xhr'
//            ]);
//        }
        if (!Yii::$app->request->isPost) {
            return Json::encode([
                'result' => 'error',
                'message' => 'method not allowed'
            ]);
        }


        $id = Yii::$app->request->post('id');
        if($id == ''){
            return Json::encode([
                'result' => 'error',
                'message' => 'id - is needed param'
            ]);
        }
        $contentBlock = ContentBlock::findOne([
            'id' => $id
        ]);

        $contentBlock->ordering = Yii::$app->request->post('ordering');
        $contentBlock->name = Yii::$app->request->post('name');
        $contentBlock->title = Yii::$app->request->post('title');
        $contentBlock->content = Yii::$app->request->post('content');

        if($contentBlock->save()){
            return Json::encode([
                'result' => 'OK'
            ]);
        }else{
            return Json::encode([
                'result' => 'error'
            ]);
        }
    }

}
