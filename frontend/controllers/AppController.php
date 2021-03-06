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

        $uri = explode('/', ltrim(Yii::$app->request->getUrl(), '/'));
        $uri = $uri[0].'/'.$uri[1];

        if(($uri == 'company/news')or($uri == 'city/blog')){
            $url = $uri;
        }

        $this->page = SitePages::findOne([
            'url' => $url,
        ]);
        if (!$this->page->published){
            return $this->redirect('/404');
        }
        $this->blocks = ContentBlock::getBlockByPage($this->page->id);

        parent::init();
    }

    public function render($view, $params = []) {
        Yii::$app->view->title = empty($this->page->title) ? $this->page->name : $this->page->title;
        Yii::$app->view->registerMetaTag([
            'name'    => 'description',
            'content' => $this->page->description,
        ]);
        Yii::$app->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => $this->page->keywords,
        ]);

        $params['page'] = $this->page;
        $params['blocks'] = $this->blocks;

        return parent::render($view, $params);
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