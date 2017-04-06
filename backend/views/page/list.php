<?php

?>


<div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h4>Pages</h4>
    </div>
    <div class="box-body">
      <table class="table table-bordered table-hover dataTable">
        <thead>
        <tr>
          <td>Name</td>
          <td>slug</td>
          <td class="non-sorting" style="width: 20px;"></td>
        </tr>
        </thead>
        <tbody>
        <? foreach ($pages as $page) { ?>
          <tr>
            <td><?=$page->name?></td>
            <td><?=$page->url?></td>
            <td>
              <a href="/control/pages/<?=$page->id?>/view" class="btn btn-app">
                <i class="fa fa-edit"></i> Edit
              </a>
            </td>
          </tr>
        <? } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
