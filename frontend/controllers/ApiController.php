<?php

namespace frontend\controllers;

use common\models\BlogPosts;
use common\models\LykkeUser;
use common\models\NewsPosts;
use yii;
use yii\helpers\Json;

class ApiController extends AppController {

    function actionGetNews() {
        $origin = Yii::$app->request->getHostInfo();
        $news = NewsPosts::find()->all();
        $news_dict = [];
        foreach ($news as $news_post) {
            $user = LykkeUser::findOne([
                'id' => $news_post->post_author,
            ]);

            $title = strip_tags($news_post->post_title);
            $title = htmlspecialchars_decode($title);
            $title = trim($title);

            $text = strip_tags($news_post->post_text);
            $text = htmlspecialchars_decode($text);
            $text = trim($text);
            $text = str_replace("\r\n", ' ', $text);
            $text = str_replace('&ldquo;', ' ', $text);
            $text = str_replace('&rsquo;', ' ', $text);
            $text = str_replace('&rdquo;', ' ', $text);
            $text = str_replace('&nbsp;', ' ', $text);

            $text_preview = strip_tags($news_post->post_preview_text);
            $text_preview = htmlspecialchars_decode($text_preview);
            $text_preview = trim($text_preview);
            $text_preview = str_replace("\r\n", ' ', $text_preview);
            $text_preview = str_replace('&ldquo;', ' ', $text_preview);
            $text_preview = str_replace('&rsquo;', ' ', $text_preview);
            $text_preview = str_replace('&rdquo;', ' ', $text_preview);
            $text_preview = str_replace('&nbsp;', ' ', $text_preview);

            $dt = date(DATE_ATOM, strtotime($news_post->post_datetime));

            array_push($news_dict, [
                'Author' => $user->first_name." ".$user->last_name,
                'Title' => $title,
                'Datetime' => $dt,
                'ImgUrl' => $origin.'/media/news/'.$news_post->post_img,
                'Url' => $origin.'/company/news/'.$news_post->post_url,
                'ShortText' => $text_preview,
                'Text' => $text
            ]);
        }
        return Json::encode($news_dict);
    }

    function actionGetBlog() {
        $origin = Yii::$app->request->getHostInfo();
        $blog_posts = BlogPosts::find()->all();
        $blog_dict = [];
        foreach ($blog_posts as $news_post) {
            $user = LykkeUser::findOne([
                'id' => $news_post->post_author,
            ]);

            $title = strip_tags($news_post->post_title);
            $title = htmlspecialchars_decode($title);
            $title = trim($title);

            $text = strip_tags($news_post->post_text);
            $text = htmlspecialchars_decode($text);
            $text = trim($text);
            $text = str_replace("\r\n", ' ', $text);
            $text = str_replace('&ldquo;', ' ', $text);
            $text = str_replace('&rsquo;', ' ', $text);
            $text = str_replace('&rdquo;', ' ', $text);
            $text = str_replace('&nbsp;', ' ', $text);

            $text_preview = strip_tags($news_post->post_preview_text);
            $text_preview = htmlspecialchars_decode($text_preview);
            $text_preview = trim($text_preview);
            $text_preview = str_replace("\r\n", ' ', $text_preview);
            $text_preview = str_replace('&ldquo;', ' ', $text_preview);
            $text_preview = str_replace('&rsquo;', ' ', $text_preview);
            $text_preview = str_replace('&rdquo;', ' ', $text_preview);
            $text_preview = str_replace('&nbsp;', ' ', $text_preview);


            $dt = date(DATE_ATOM, strtotime($news_post->post_datetime));

            array_push($blog_dict, [
                'Author' => $user->first_name." ".$user->last_name,
                'Title' => $title,
                'Datetime' => $dt,
                'ImgUrl' => $origin.'/media/news/'.$news_post->post_img,
                'Url' => $origin.'/company/news/'.$news_post->post_url,
                'ShortText' => $text_preview,
                'Text' => $text
            ]);
        }
        return Json::encode($blog_dict);
    }

}