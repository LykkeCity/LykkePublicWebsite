<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "{{%site_pages}}".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $url
 * @property string  $content
 * @property string  $parent
 * @property string  $datetime
 * @property string  $title
 * @property string  $keywords
 * @property string  $description
 * @property integer $author
 * @property string  $route
 * @property integer $published
 * @property integer $in_menu
 * @property string  $normal_tpl
 * @property integer $template
 */

class SitePages extends \yii\db\ActiveRecord
{

  public static function tableName()
  {
    return 'site_pages';
  }

  public function rules()
  {
    return [
      [['name', 'url'], 'required'],
      [['content'], 'string'],
      [['parent', 'author', 'published', 'in_menu'], 'integer'],
      [['datetime'], 'safe'],
      [
        ['name', 'url', 'title', 'keywords', 'description', 'route'],
        'string',
        'max' => 255
      ],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'url' => 'Url',
      'content' => 'Content',
      'parent' => 'Parent',
      'datetime' => 'Date Time',
      'title' => 'Title',
      'keywords' => 'Keywords',
      'description' => 'Description',
      'author' => 'Author',
      'route' => 'Route',
      'published' => 'Published',
      'in_menu' => 'In Menu',
    ];
  }

  public static function getListPages($forMenu = false)
  {

    $getListPages = $forMenu
      ? SitePages::find()->where(['published' => 1, 'in_menu' => 1])->asArray()
        ->all()
      : SitePages::find()->asArray()->all();

    $listPages = [];
    foreach ($getListPages as $key => $item) {
      if (array_key_exists($item['parent'], $listPages)) {
        $listPages[$item['parent']]['sub_pages'][] = $item;
      } else {
        $listPages[$item['id']] = $item;
      }

    }

    return $listPages;
  }

  public function InsertOrUpdate($post, $id = '')
  {

    $page = empty($id) ? new SitePages() : SitePages::findOne($id);

    print_r($post['content']);

    $page->name = $post['name'];
    $page->url = $post['url'];
    $page->content = $post['content'];
    $page->parent = $post['parent'];
    $page->datetime = date("Y-m-d H:i:s", strtotime($post['datetime']));
    $page->title = $post['title'];
    $page->keywords = $post['keywords'];
    $page->description = $post['description'];
    $page->author = Yii::$app->user->id;
    $page->route = $post['controller'] . '/' . $post['action'];
    $page->published = !isset($post['published']) ? 0 : $post['published'];
    $page->in_menu = !isset($post['in_menu']) ? 0 : $post['in_menu'];
    $page->normal_tpl = !isset($post['normal_tpl']) ? 0 : $post['normal_tpl'];
    $page->template = $post['template'];

    return $page->save() ? $page : false;

  }

}
