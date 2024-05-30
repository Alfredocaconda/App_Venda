<?php 
    class Middleware{

        public static function auth(){
            session_start();
            if (!isset($_SESSION['nome']) && !isset($_SESSION['cargo'])) {
                header("Location: /login");
            }
        }


    }