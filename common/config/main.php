<?php
return [
  'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'components' => [
    'cache'  => [
      'class' => 'yii\caching\FileCache',
    ],
    'db'     => [
      'class'    => 'yii\db\Connection',
      'dsn'      => 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . '',
      'username' => getenv('DB_USER_NAME'),
      'password' => getenv('DB_PASSWORD'),
      'charset'  => 'utf8',
    ],
    'mailer' => [
      'class'            => 'yii\swiftmailer\Mailer',
      'viewPath'         => '@common/mail',
      'transport'        => [
        'class'      => 'Swift_SmtpTransport',
        'host'       => getenv('SMTP_HOST'),
        'username'   => getenv('SMTP_USER_NAME'),
        'password'   => getenv('SMTP_PASSWORD'),
        'port'       => getenv('SMTP_PORT'),
        'encryption' => getenv('SMTP_ENCRYPTION'),
      ],
      'useFileTransport' => FALSE,
    ],
  ],
];
