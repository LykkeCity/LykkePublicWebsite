<?php
namespace backend\controllers;

use common\enum\CommentsType;
use common\models\Asset;
use common\models\Comments;
use common\models\CommentsEditedHistory;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii;

class CommentsController extends AppController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index', 'delete', 'history'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post', 'get'],
                    'history' => ['post', 'get'],
                    'delete' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    function actionIndex($type = CommentsType::BLOG)
    {
        $model = new Comments();
        $res = $model->getAllCommentsForBackOffice($type);
        return $this->render('index', [
            'comments' => $res['comments'],
            'pages' => $res['pages'],
            'type' => $type,
        ]);
    }

    public function actionDeleted($id, $type)
    {
        $comment = Comments::findOne(['id' => $id, 'type' => $type]);
        CommentsEditedHistory::deleteAll([
            'comments_id' => $comment->id,
            'page_post_id' => $comment->page_post_id,
            'type' => $type,
        ]);
        if ($comment->reply_comment_id === null) {
            Comments::deleteAll([
                'reply_comment_id' => $comment->id,
                'type' => $type,
            ]);
        }
        $comment->delete();
        $this->redirect(['index', 'type' => $type]);
    }

    public function actionHistory()
    {
        $history = (new CommentsEditedHistory)->get(Yii::$app->request->post());
        return $this->renderPartial('history', [
            'history' => $history,
        ]);
    }

}