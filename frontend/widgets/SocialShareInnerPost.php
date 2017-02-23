<?php


namespace frontend\widgets;


use yii\base\Widget;


class SocialShareInnerPost extends Widget {

  public $page_url;
  public $post_title;
  public $post_url;

  function run() {
    return $this->render('SocialShareInnerPost', ['page_url'   => $this->page_url,
                                                  'post_url'   => $this->post_url,
                                                  'post_title' => $this->post_title
    ]);
  }
}