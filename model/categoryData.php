<?php

class CategoryData {

    protected $category_names = ['選択してください', '日記', '趣味', '料理', 'ライフハック'];
    protected $category_items = [];
    protected $categories = [];

    public function setItems($datas){
        foreach($datas as $key => $value){
            $this->category_items[$value] = $this->category_names[$key];
        }
    }

    public function setCategories($res){
        $this->categories[0] = '';
        foreach($res as $row ) {
            $this->categories[$row['id']] = $row['category'];
        }
        $this->setItems($this->categories);
    }

    public function getItems(){
        return $this->category_names;
    }

    public function getCategories(){
        return $this->categories;
    }

}