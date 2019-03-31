<?php

    require_once('Word.php');
    require_once('WordDAO.php');
    
    $word = new Word();
    $wordDao = new WordDAO();

    $numberCorrect;
    $numberWrong;
    ob_start();

    function init() {
        $numberCorrect = 0;
    }


    if(isset($_GET)) {
        $numberWrong = 0;
        $word = $wordDao -> getWord();
        $en_word = $word -> getWord();
        $data = array('nbc' => $numberCorrect,'word' => $en_word);
        $dataJson = json_encode($data);
        ob_clean();
        echo $dataJson;
        
    } 

    

    

    if(isset($_POST['meaning']) && !empty($_POST['meaning'])) {
        $vn_meaning = $_POST['meaning'];
        if (strcasecmp($vn_meaning, $word -> getMeaning()) == 0) {
            $numberWrong = 0;
            $numberCorrect++;
            $co = $word -> getNumberCorrect();
            $co++;
            $word -> setNumberCorrect($co);
            $wordDao -> updateNumberCorrect($word);
            $data = array('code' => 1, 'nbc' => $numberCorrect);
            $dataJson = json_encode($data);
            ob_clean();
            echo $dataJson; 
        } else {
                $co = $word -> getNumberCorrect();
                $co++;
                $word -> setNumberCorrect($co);
                $wordDao -> updateNumberCorrect($word);
                $data = array('code' => 0,'nbw' => $numberWrong, 'answer' => $word -> getMeaning());
                $numberWrong = 0;
                $dataJson = json_encode($data);
                ob_clean();
                echo $dataJson; 
            }
        }
    

?>