<?php
namespace frontend\controllers;

use common\enum\CommentsType;
use common\models\SitePages;
use common\models\BlogPosts;
use common\models\Comments;
use common\models\CommentsSubscribe;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\View;

class BlogController extends AppController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    function actionIndex($post_url = "")
    {
        Yii::$app->view->registerJsFile('/js/load_post.js', [
            'position' => View::POS_END,
            'depends'  => 'frontend\assets\MainAsset',
        ]);
        //TODO - костыль, потом убрать
        $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
        $uri = $uri[0].'/'.$uri[1];
        $page = SitePages::find()->where(['url' => $uri])->one();

        return empty($post_url) ? $this->allPost($page)
            : $this->detailsPost($page, $post_url);
    }

    function allPost($page)
    {
        Yii::$app->view->title = empty($page['title']) ? $page['name']
            : $page['title'];
        Yii::$app->view->registerMetaTag([
            'name'    => 'description',
            'content' => $page['description'],
        ]);
        Yii::$app->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => $page['keywords'],
        ]);
        $this->processPageRequest('page');
        $posts = BlogPosts::find()->where(['published' => 1])
            ->orderBy(['post_datetime' => SORT_DESC]);
        $countQuery = clone $posts;
        $pages = new Pagination([
            'totalCount'   => $countQuery->count(),
            'pageSize'     => 10,
            'validatePage' => false,
        ]);
        $pages->pageSizeParam = false;
        $posts = $posts->offset($pages->offset)->limit($pages->limit)->all();
        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('partial_blog_item', [
                'page'  => $page,
                'posts' => $posts,
            ]);
        }

        return $this->render('index', [
            'page'  => $page,
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }

    function detailsPost($page, $post_url)
    {
        $post = BlogPosts::find()->where([
            'published' => 1,
            'post_url'  => $post_url,
        ])->one();
        if (empty($post)) {
            throw new NotFoundHttpException();
        }
        $comment = new Comments();
        $subscribe = new CommentsSubscribe();
        $comments = $comment->getComments($post['id'], CommentsType::BLOG);
        $subscribeStatus = $subscribe->subscribeStatus($post['id'],
            CommentsType::BLOG);

        # Seo-block
        $this->page->title = $post['post_title'];
        $this->page->description = $post->getSeoDescription();

        if($post->report_template == 1){
            return $this->render('post_report', [
                'subscribe'     => $subscribeStatus,
                'post'          => $post,
                'comments'      => $comments['comments'],
                'countComments' => $comments['count'],
                'type'          => CommentsType::BLOG,
            ]);
        }else{
            return $this->render('post', [
                'subscribe'     => $subscribeStatus,
                'post'          => $post,
                'comments'      => $comments['comments'],
                'countComments' => $comments['count'],
                'type'          => CommentsType::BLOG,
            ]);
        }

    }

}