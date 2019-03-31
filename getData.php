<?php

require_once 'Word.php';
require_once 'WordDAO.php';

if(isset($_POST)){
    echo 'hello';
    $en_word = $_POST['word'];

    $vn_meaning = $_POST['meaning'];
    $word = new Word();
    $word->setWord($en_word);
    $word->setMeaning($vn_meaning);
    $word->setNumberCorrect(0);
    $wordDAO = new WordDAO();
    $inserted = $wordDAO -> insertWord($word);
    echo 'success';
} else {

    echo 'fucking';
}

?>