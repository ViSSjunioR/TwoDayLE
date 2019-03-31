<?php

require_once 'DBConnection.php';
require_once 'Word.php';

class WordDAO
{

    public function insertWord(Word $word)
    {
        $en_word = $word->getWord();
        $mean = $word->getMeaning();
        $ncb = $word->getNumberCorrect();
        $conn = DBConnection::getInstance();
        $stmt = $conn->prepare("INSERT INTO word(english_word, vn_meaning, number_of_correct_answer) VALUE(:word,:meaning,:nbc)");
        $stmt->bindParam(':word', $en_word);
        $stmt->bindParam(':meaning', $mean);
        $stmt->bindParam(':nbc', $ncb);
        $stmt->execute();
    }

    /**
     * function get word with priority:
     * - at least answer correct
     * - oldest created time
     */
    public function getWord()
    {
        $word = new Word();
        $conn = DBConnection::getInstance();
        $stmt = $conn->prepare("SELECT id,english_word,vn_meaning,number_of_correct_answer FROM word ORDER BY number_of_correct_answer ASC, created_time ASC LIMIT 1");
        $stmt -> execute();
        $data = $stmt -> fetch();
        $word -> setId($data['id']);
        $word -> setWord($data['english_word']);
        $word -> setMeaning($data['vn_meaning']);
        $word -> setNumberCorrect($data['number_of_correct_answer']);
        return $word;
    }

    public function updateNumberCorrect(Word $word) {
        $id = $word ->getId();
        $numberCorrect = $word -> getNumberCorrect();
        $conn = DBConnection::getInstance();
        $stmt = $conn -> prepare("UPDATE word SET number_of_correct_answer =:nca WHERE id = :id");
        $stmt->bindParam(':nca', $numberCorrect);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
