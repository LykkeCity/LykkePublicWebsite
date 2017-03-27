<?php
namespace common\classes;

use common\enum\CommentsType;
use common\models\BlogPosts;
use common\models\NewsPosts;

class CommentsTypeClass
{

    public static function getClass($type)
    {
        switch ($type) {
            case CommentsType::BLOG:
                $class = BlogPosts::class;
                break;
            case CommentsType::NEWS:
                $class = NewsPosts::class;
                break;
            default:
                return false;
        }

        return $class;
    }

}