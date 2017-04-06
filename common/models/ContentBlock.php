<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%site_pages}}".
 *
 * @property integer $id
 * @property integer $pageId
 * @property integer $ordering
 * @property string  $name
 * @property string  $title
 * @property string  $content
 */
class ContentBlock extends ActiveRecord {

    public static function tableName() {
        return 'content_blocks';
    }

    public function rules() {
        return [];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'pageId' => 'Page ID',
            'ordering' => 'Ordering',
            'name' => 'Name',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

    public static function createBlock($pageId) {
        $block = new ContentBlock();
        $block->pageId = $pageId;
        if ($block->save()) {
            return $block;
        } else {
            return false;
        }
    }

    public function updateBlock($ordering, $title, $content) {
        $this->$ordering = $ordering;
        $this->title = $title;
        $this->content = $content;
        if ($this->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBlock() {
        if ($this->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getBlockByPage($pageId) {
        return ContentBlock::findAll(['pageId' => $pageId]);
    }
}
