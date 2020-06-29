<?php

class LoginData {

    protected $login_items = ['mail', 'pass'];
    protected $login_datas = [];

    function __construct(){
        foreach($this->login_items as $key){
            $this->login_datas[$key] = "";
        }
    }

    public function setData($data, $key){
        $this->login_datas[$key] = $data;
    }

    public function getData(){
        return $this->login_datas;
    }

    public function getItems(){
        return $this->login_items;
    }

}