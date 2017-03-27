<?php
namespace common\models;

use common\classes\CommentsTypeClass;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\SqlDataProvider;

/**
 * CommentsSubscribe model
 * This is the model class for table "{{%comments_subscribe}}".
 *
 * @property integer $id
 * @property integer $lykke_user_id
 * @property integer $page_post_id
 * @property integer $subscribe
 * @property string  $type
 */
class CommentsSubscribe extends ActiveRecord
{

    public static function tableName()
    {
        return 'comments_subscribe';
    }

    function subscribe($pagePostId, $type)
    {
        $subscribe = self::findOne([
            'lykke_user_id' => $pagePostId,
            'lykke_user_id' => Yii::$app->user->id,
            'type'          => $type,
        ]);
        if (empty($subscribe)) {
            $subscribe = new CommentsSubscribe();
            $subscribe->lykke_user_id = Yii::$app->user->id;
            $subscribe->page_post_id = $pagePostId;
            $subscribe->subscribe = 1;
            $subscribe->type = $type;
        } else {
            $subscribe->subscribe = 1;
        }

        return $subscribe->save() ? $subscribe : false;
    }

    function unsubscribe($pagePostId, $type)
    {
        $subscribe = self::findOne([
            'lykke_user_id' => $pagePostId,
            'lykke_user_id' => Yii::$app->user->id,
            'type'          => $type,
        ]);
        $subscribe->subscribe = 0;

        return $subscribe->save() ? $subscribe : false;
    }

    function subscribeStatus($pagePostId, $type)
    {
        $subscribe = self::findOne([
            'lykke_user_id' => $pagePostId,
            'lykke_user_id' => Yii::$app->user->id,
            'type'          => $type,
        ]);

        return $subscribe->subscribe;
    }

    function getSubscribers($pagePostId, $type)
    {
        $class = CommentsTypeClass::getClass($type);
        if (!$class) {
            return false;
        }

        return (new Query)->select("lu.first_name,
                    lu.email,
                    lu.last_name,
                    bp.post_title,
                    bp.post_url,              
                    sub.*")->from(self::tableName().' sub')
            ->leftJoin(LykkeUser::tableName().' as lu',
                'lu.id = sub.lykke_user_id')->leftJoin($class::tableName()
                .' bp', 'bp.id = '.$pagePostId)->where("sub.page_post_id = "
                .$pagePostId." AND sub.subscribe = 1 AND sub.lykke_user_id != "
                .Yii::$app->user->id)->createCommand()->queryAll();
    }

}