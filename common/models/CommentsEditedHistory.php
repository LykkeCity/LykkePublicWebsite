<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\SqlDataProvider;

class CommentsEditedHistory extends ActiveRecord
{

    public static function tableName()
    {
        return 'comments_edited_history';
    }

    public static function add($pagePostId, $commentId, $comment, $type)
    {
        $history = new CommentsEditedHistory();
        $history->page_post_id = $pagePostId;
        $history->comments_id = $commentId;
        $history->lykke_user_id = Yii::$app->user->id;
        $history->comment = $comment;
        $history->datetime = date('Y-m-d H:i:s');
        $history->type = $type;

        return $history->save() ? $history : false;
    }

    function get($post)
    {
        return self::findAll([
            'comments_id'  => $post['comments_id'],
            'page_post_id' => $post['page_post_id'],
            'type'         => $post['type'],
        ]);
    }

}