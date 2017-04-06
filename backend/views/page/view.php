<script>
    window.page = new PageModel(
        <?=$page->id?>,
        "<?=$page->name?>",
        "<?=$page->title?>",
        "<?=$page->description?>",
        "<?=$page->keywords?>",
        "<?=$page->datetime?>"
    );

    <? foreach ($contentBlocks as $block) { ?>
    var block = new contentBlockModel(
        <?=$block->id;?>,
        <?=$block->pageId;?>,
        <?=$block->ordering;?>,
        "<?=$block->name;?>",
        "<?=$block->title;?>",
        "<?=addslashes($block->content);?>"
    );
    window.page.contentBlocks.push(block);
    <? } ?>

</script>

<?php
?>


<div ng-app="lykkeAdminApp" ng-controller="PageViewCtrl">

  <div class="col-md-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <div class="box-title">
          Main
        </div>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="inputName">Name</label>
          <input type="text" class="form-control"
                 id="inputName"
                 ng-model="page.name"
                 placeholder="Page name">
        </div>
        <div class="form-group">
          <label for="inputDatetime">Name</label>
          <input type="text" class="form-control"
                 id="inputDatetime"
                 ng-model="page.datetime"
                 placeholder="Publish date">
        </div>
        <div class="form-group">
          <label for="inputDatetime">Page template</label><br>
          <select multiple name="" id="" class="form-control">
            <option value="Normal">Normal</option>
            <option value="SEO">SEO-page</option>
            <option value="Embedded">Embedded</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <div class="box-title">
          SEO
        </div>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="inputSEOTitle">Title</label>
          <input type="text" class="form-control"
                 id="inputSEOTitle"
                 ng-model="page.seo_title"
                 placeholder="SEO title">
        </div>
        <div class="form-group">
          <label for="inputSEODescription">Description</label>
          <textarea id="inputSEODescription" cols="30" rows="10"
                    ng-model="page.seo_description"
                    class="form-control"
                    placeholder="SEO Description"></textarea>
        </div>
        <div class="form-group">
          <label for="inputSEOKeywords">Keywords</label>
          <input type="text" class="form-control"
                 id="inputSEOKeywords"
                 ng-model="page.seo_keywords"
                 placeholder="SEO Keywords">

        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <div class="box-title">
          Content
        </div>
      </div>
      <div class="box-body">
        <div class="box collapsed-box" ng-repeat="block in page.contentBlocks">
          <div class="box-header with-border">
            <div class="box-title" ng-bind="block.name"></div>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool"
                      data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="inputTitle">Title</label>
              <input type="text" class="form-control"
                     id="inputTitle"
                     ng-model="block.title"
                     placeholder="SEO Keywords">
            </div>
            <div class="form-group">
              <label for="inputContent">Content</label>
              <textarea id="inputContent editor_basic" cols="30" rows="10"
                        ng-model="block.content"
                        ui-tinymce="tinymceOptions"
                        class="form-control"
                        placeholder="Content"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
