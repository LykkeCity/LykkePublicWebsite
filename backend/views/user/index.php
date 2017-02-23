<?

use backend\components\helpers\UrlHelper;
use yii\widgets\LinkPager;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<table class="table table-hover">
  <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th style="text-align: center;">Is Admin?</th>
    <th style="text-align: center;">Frontend Edit</th>
    <th style="text-align: center;">KYC Status</th>
    <!--<th>To notify about spam</th>-->
    <th style="text-align: center;">Blocked in the comments</th>
  </tr>
  </thead>
  <tbody>
  <? foreach ($users as $user) { ?>
    <tr>
      <td><?= $user['id'] ?></td>
      <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
      <td><?= $user['email'] ?></td>
      <td align="center"><input data-id="<?= $user['id'] ?>" class="admin" onchange="updateData(this)" type="checkbox" <?=$user['admin_panel'] == 1 ? "checked" : ""?> ></td>
      <td align="center"><input data-id="<?= $user['id'] ?>" class="frontend" onchange="updateData(this)" type="checkbox" <?=$user['edit_frontent'] == 1 ? "checked" : ""?> ></td>
      <td align="center"><?= $user['kyc_status'] ?></td>
      <!--<td align="center"><input data-id="<?= $user['id'] ?>" class="notify-spam" type="checkbox" onchange="updateData(this)" <?=$user['notify_spam'] == 1 ? "checked" : ""?> ></td>-->
      <td align="center"><input data-id="<?= $user['id'] ?>" class="blocked-comment" type="checkbox" onchange="updateData(this)" <?=$user['blocked_comment'] == 1 ? "checked" : ""?>></td>
    </tr>
  <? } ?>
  </tbody>
</table>

<?

echo LinkPager::widget([
  'pagination' => $pages,
]);

?>

