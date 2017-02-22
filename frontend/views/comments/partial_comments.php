<?php

use yii\web\View;

Yii::$app->view->registerJsFile('/js/comments.js', [
  'position' => View::POS_END,
  'depends'  => 'frontend\assets\MainAsset'
]);

foreach ($comments as $comment){
  echo $this->render('partial_comment_item', ['comment' => $comment, 'idAuthor' => $idAuthor, 'idPage' => $idPage, 'type' => $type]);
}
