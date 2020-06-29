<?php

class MemberData {

    public $input_items = ['name', 'mail', 'birth', 'address', 'gender', 'pass', 'check'];
    public $input_datas = [];

    function __construct(){
        foreach($this->input_items as $value){
            $this->input_datas[$value] = "";
        }

    }

    public function setData($data, $key){
        $this->input_datas[$key] = $data;
    }

    public function getData(){
        return $this->input_datas;
    }

    public function getItems(){
        return $this->input_items;
    }

    public function getBirth($year, $month, $day){
        $birth = $year.'-'.$month.'-'.$day;
        return  date('Y-m-d',strtotime($birth));
    }
}