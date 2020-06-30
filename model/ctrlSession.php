<?php

class CtrlSession {

    public function startSession($datas){
        foreach($datas as $key => $value){
            $_SESSION[$key] = $value;
        }
    }

    public function endSession(){
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-42000, '/');
        }
    }
}