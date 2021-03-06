<?php
/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\helpers\UrlHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=Html::encode($this->title)?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport">

  <link rel="stylesheet" href="/control/css/site.css">

  <link rel="stylesheet"
        href="/control/css/plugins/datetimepicker/datetimepicker.min.css">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/control/dist/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/control/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/control/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/control/dist/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/control/dist/plugins/morris/morris.css">

  <!-- jvectormap -->
  <link rel="stylesheet"
        href="/control/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet"
        href="/control/dist/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet"
        href="/control/dist/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet"
        href="/control/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet"
        href="/control/js/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="/control/dist/plugins/pace/pace.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script
      src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <?=Html::csrfMetaTags()?>

  <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
      $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="/control/dist/bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="/control/dist/plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script
      src="/control/dist/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script
      src="/control/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script
      src="/control/dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="/control/dist/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script
      src="/control/dist/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script
      src="/control/dist/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script
      src="/control/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script
      src="/control/dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/control/dist/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/control/dist/js/app.min.js"></script>

  <!-- DATA TABLES -->
  <script
      src="/control/js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script
      src="/control/js/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script src="/control/js/plugins/edit_area/edit_area_full.js"></script>
  <script src="/control/js/plugins/tinymce/tinymce.min.js"></script>
  <script src="/control/js/plugins/moment/moment.js"></script>
  <script src="/control/dist/plugins/pace/pace.min.js"></script>
  <script
      src="/control/js/plugins/datetimepicker/datetimepicker.min.js"></script>
  <script src="/control/js/scripts.js"></script>
  <script src="/control/js/user.js"></script>
  <script src="/control/js/comments.js"></script>
  <script src="/control/js/angular.min.js"></script>
  <script src="/control/js/plugins/angular-ui-tinymce/src/tinymce.js"></script>

  <script src="/control/js/controllers.js"></script>
</head>

<body class="hold-transition skin-purple sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
  <header class="main-header">
    <a href="/control" class="logo">
      <span class="logo-mini"><img src="/img/lykke_white.svg"></span>
      <span class="logo-lg"><img src="/img/lykke_white.svg"> Back Office</span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="/"><i class="fa fa-sign-out"></i> Go back </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?=UrlHelper::isActive('page/list');?>">
          <a href="<?=UrlHelper::to(['/pages/'])?>">
            <i class="fa fa-files-o"></i> <span>Pages</span>
          </a>
        </li>
        <li role="presentation" class="<?=UrlHelper::isActive('user/index');?>">
          <a href="<?=UrlHelper::to(['/user'])?>">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <li class="header">Deprecated</li>
        <li class="<?=UrlHelper::isActive('blog/index');?>">
          <a href="<?=UrlHelper::to(['/blog/'])?>">
            <i class="fa fa-pencil-square"></i> <span>Blog</span>
          </a>
        </li>
        <li role="presentation" class="<?=UrlHelper::isActive('news/index');?>">
          <a href="<?=UrlHelper::to(['/news/'])?>">
            <i class="fa fa-newspaper-o"></i> <span>News</span>
          </a>
        </li>
        <li role="presentation"
            class="<?=UrlHelper::isActive('asset/index');?>">
          <a href="<?=UrlHelper::to(['/asset'])?>">
            <i class="fa fa-exchange"></i> <span>Assets</span>
          </a>
        </li>

        <li role="presentation"
            class="<?=UrlHelper::isActive('comments/index');?>">
          <a href="<?=UrlHelper::to(['/comments'])?>">
            <i class="fa fa-comment-o"></i> <span>Comments</span>
          </a>
        </li>
        <li role="presentation"
            class="<?=UrlHelper::isActive('redirects/index');?>">
          <a href="<?=UrlHelper::to(['/redirects'])?>">
            <i class="fa fa-arrows-v"></i> <span>Redirects</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="row">
          <?=Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs'])
                  ? $this->params['breadcrumbs'] : [],
              'homeLink' => [
                  'label' => 'Main',
                  'url' => UrlHelper::to(['/']),
              ],
          ])?>
          <?=Alert::widget()?>

        <div class="col-md-12">
            <?=$content?>
        </div>

      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version:</b> undefinded
    </div>
    <!-- TODO: paste year gen -->
    <strong> &copy; 2017 <a href="/">Lykke Corp.</a></strong> All rights
    reserved.
  </footer>


</div>

<!-- Modals -->
<div>
  <div id="successModal" class="modal modal-success">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Success!</h4>
        </div>
        <div class="modal-body">
          <p>Done.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left"
                  data-dismiss="modal">Close
          </button>
          <button onclick="window.location.reload();" class="btn btn-outline pull-right">
            Refresh page
          </button>
        </div>
      </div>
    </div>
  </div>

  <div id="errorModal" class="modal modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Error!</h4>
        </div>
        <div class="modal-body">
          <p>Any error is occurred</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left"
                  data-dismiss="modal">Close
          </button>
          <button onclick="window.location.reload();" class="btn btn-outline pull-right">
            Refresh page
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Modals -->

</body>
</html>
<?php $this->endPage() ?>
