<?php

foreach ($comments as $comment){
  echo $this->render('partialCommentItem', ['comment' => $comment, 'idAuthor' => $idAuthor, 'idPost' => $idPost]);
}
