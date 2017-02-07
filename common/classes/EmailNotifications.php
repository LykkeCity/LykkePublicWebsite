<?php
namespace common\classes;

use WindowsAzure\Common\ServicesBuilder;
use yii\base\Exception;


class EmailNotifications {


  function GetBodyEmailByLink($link, $HtmlEntities = TRUE) {
    try {

      $body = @file_get_contents($link);

      if ($body === FALSE)
        throw new Exception();

      return $HtmlEntities ? htmlentities($body) : $body;

    } catch (\Exception $e) {
      return FALSE;
    }

  }

  function AddToEnqueues($content) {

    try {

      $blobRestProxy = ServicesBuilder::getInstance()
        ->createBlobService(getenv("AZURE_CONNECTION_STRING"));

      $queueRestProxy = ServicesBuilder::getInstance()
        ->createQueueService(getenv("AZURE_CONNECTION_STRING"));

      $blobName = Guid::NewGuid();

      $blobRestProxy->createBlockBlob(getenv("AZURE_CONTAINER_BLOB"), $blobName, $content);
      $queueRestProxy->createMessage(getenv("AZURE_NAME_QUEUE"), $blobName);

      return TRUE;

    } catch (\Exception $e) {
      return FALSE;
    }


  }


  function PrepareEmail($to, $subject, $replace = [], $isHtml = TRUE, $toJson = TRUE) {

    $body = $this->GetBodyEmailByLink(getenv("LINK_TEMPLATE_EMAIL"));

    if ($body != FALSE) {
      $body = strtr($body, $replace);

      $email = [
        'Email'       => $to,
        'Subject'     => $subject,
        'Body'        => $body,
        'IsHtml'      => $isHtml,
        'Attachments' => []
      ];

      return $toJson ? json_encode($email) : $email;
    }

    return FALSE;


  }

}