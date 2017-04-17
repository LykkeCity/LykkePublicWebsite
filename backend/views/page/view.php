<script>
    window.page = new PageModel(
        <?=$page->id?>,
        "<?=$page->name?>",
        "<?=$page->title?>",
        "<?=$page->description?>",
        "<?=$page->keywords?>",
        "<?=$page->datetime?>",
        "<?=$page->template?>",
        "<?=$page->url?>",
        <?echo $page->in_menu ? 'true' : 'false'?>,
        <?echo $page->published ? 'true' : 'false'?>
    );

    <? foreach ($contentBlocks as $block) { ?>
    var block = new contentBlockModel(
        <?=$block->id;?>,
        <?=$block->pageId;?>,
        <?=$block->ordering;?>,
        "<?=$block->name;?>",
        "<?=$block->title;?>",
        "<?=str_replace("\n", "", addslashes($block->content));?>"
    );
    window.page.contentBlocks.push(block);
    <? } ?>

</script>

<?php
?>


<div ng-app="lykkeAdminApp" ng-controller="PageViewCtrl">
  <section class="content-header">
    <h4 ng-bind="page.name"></h4>
  </section>

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
          <label for="inputDatetime">Datetime</label>
          <input type="text" class="form-control dateTimePickerSingle"
                 id="inputDatetime"
                 ng-model="page.datetime"
                 dateTimePicker
                 placeholder="Publish date">
        </div>
        <div class="form-group">
          <label for="inputTemplate">Page template</label><br>

          <select name="inputTemplate" id="inputTemplate" class="form-control"
                  ng-model="page.template"
                  ng-hide="isEmbedded()"
                  ng-options="template for template in templateEnum">
          </select>
          <span ng-hide="!isEmbedded()">Embeded</span>
        </div>
        <div class="form-group">
          <input type="checkbox" id="inputPublished" ng-model="page.published">
          <label for="inputPublished">Published</label>
        </div>
        <div class="form-group">
          <input type="checkbox" id="inputInMenu" ng-model="page.in_menu">
          <label for="inputInMenu">In menu</label>
        </div>
        <div class="form-group">
          <label for="inputUrl">Url</label>
          <input type="text" class="form-control" id="inputUrl"
                 ng-model="page.url">
        </div>
      </div>
      <div class="box-footer">
        <div class="pull-right">
          <div class="btn btn-success btn-flat" ng-click="savePage()">Save
            Page
          </div>
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
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-success"
                  ng-click="addBlock()"
                  ng-hide="isEmbedded()">
            <i class="fa fa-plus"></i> Add block
          </button>
        </div>
      </div>

      <div class="box-body">
        <div class="box collapsed-box"
             ng-repeat="block in page.contentBlocks track by $index">
          <div class="box-header with-border">
            <div class="box-title">
              <input type="text" class="form-control border_bottom"
                     ng-model="block.name">
            </div>
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
                     placeholder="Title">
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
          <div class="box-footer">
            <div class="btn btn-danger btn-flat pull-right"
                 ng-click="deleteBlock(block.id, $index)">
              <i class="fa fa-remove"></i> Delete block
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
