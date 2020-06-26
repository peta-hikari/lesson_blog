<?php

class RegiConf {

    public $years = [];
    public $months = [];
    public $days=[];

    function __construct(){

        $year_end = date("Y");
        for($i = 1900; $i <= $year_end ; $i++){
            $this->years[] = $i;
        }

        for($i = 1; $i <= 12; $i++){
            $this->months[] = $i;
        }

        for($i = 1; $i <= 31; $i++){
            $this->days[] = $i;
        }
    }
    public function getYears(){
        return $this->years;
    }

    public function getMonths(){
        return $this->months;
    }

    public function getDays(){
        return $this->days;
    }

}

