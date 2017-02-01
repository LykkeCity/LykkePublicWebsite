<?php

foreach ($comments as $comment){
  echo $this->render('partial_comment_item', ['comment' => $comment, 'idAuthor' => $idAuthor, 'idPost' => $idPost]);
}
