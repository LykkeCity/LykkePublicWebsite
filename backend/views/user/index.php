<?

use backend\components\helpers\UrlHelper;
use yii\widgets\LinkPager;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<table class="table table-hover">
  <thead>
  <tr>
    <th>Id</th>
    <th>Имя</th>
    <th>Email</th>
    <th style="text-align: center;">Админ</th>
    <th style="text-align: center;">Frontend редактирование</th>
    <th style="text-align: center;">Уведомлять о спаме?</th>
    <th style="text-align: center;">Заблокирован в комментариях</th>
  </tr>
  </thead>
  <tbody>
  <? foreach ($users as $user) { ?>
    <tr>
      <td><?= $user['id'] ?></td>
      <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
      <td><?= $user['email'] ?></td>
      <td align="center"><input data-id="<?= $user['id'] ?>" class="admin" onchange="updateDate(this)" type="checkbox" <?=$user['admin_panel'] == 1 ? "checked" : ""?> ></td>
      <td align="center"><input data-id="<?= $user['id'] ?>" class="frontend" onchange="updateDate(this)" type="checkbox" <?=$user['edit_frontent'] == 1 ? "checked" : ""?> ></td>
      <td align="center"><input data-id="<?= $user['id'] ?>" class="notify-spam" type="checkbox" onchange="updateDate(this)" <?=$user['notify_spam'] == 1 ? "checked" : ""?> ></td>
      <td align="center"><input data-id="<?= $user['id'] ?>" class="blocked-comment" type="checkbox" onchange="updateDate(this)" <?=$user['blocked_comment'] == 1 ? "checked" : ""?>></td>
    </tr>
  <? } ?>
  </tbody>
</table>

<?

echo LinkPager::widget([
  'pagination' => $pages,
]);

?>

