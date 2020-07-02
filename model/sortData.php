<?php

class SortData{
    protected $asc = " order by asc";
    protected $desc = " order by desc";
    protected $view = "selectd * from posts join categories on category_id = id Where category = :category";

    public function getSQL(){
        return $sql;
    }
}