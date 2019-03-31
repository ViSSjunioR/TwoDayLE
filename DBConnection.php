<?php


class DBConnection {
    
    private static $instance;

    private function __construct() {

    }

    public static function getInstance() {

        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost;port=3306;dbname=fifty_correct_answer_per_day", "root", "viet123");
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }
        return self::$instance;

    }



}

?>