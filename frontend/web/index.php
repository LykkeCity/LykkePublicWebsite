<?php

if((isset($_GET['disable_ga']))and($_GET['disable_ga']=='true')){
    setcookie("disabled_ga_to_own_user", 'true', time()+(3600*24*31));
}

if (
    (isset($_COOKIE['disabled_ga_to_own_user'])) and
    ($_COOKIE['disabled_ga_to_own_user'] == 'true') and
    !(isset($_GET['enable_ga'])) and
    !($_GET['enable_ga']=='true')
)
{
    setcookie("disabled_ga_to_own_user", 'true', time()+(3600*24*31));
}

if((isset($_GET['enable_ga']))and($_GET['enable_ga']=='true')){
    setcookie("disabled_ga_to_own_user", 'false', time()-3600);
    header("Location: /");
    unset($_COOKIE['disabled_ga_to_own_user']);
}


require(__DIR__ . '/../../autoload.php');

defined('YII_DEBUG') or define('YII_DEBUG', filter_var(getenv('YII_DEBUG'), FILTER_VALIDATE_BOOLEAN));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));

require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../config/main.php')
);

(new yii\web\Application($config))->run();
