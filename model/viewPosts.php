<?php

class ViewPosts {
    public $view_posts = [];
    public $category_items = ['選択してください', '日記', '趣味', '料理', 'ライフハック'];

    public function setCategoryitems($datas){
        $this->category_items = $datas;
    }

    public function setViewdatas($row){
        foreach($row as $data_key => $data){
            if($data_key == 'category_id'){
                foreach($this->category_items as $key =>$value){
                    if($data == $key){
                        $this->view_posts[$data_key] = $value;
                    }
                }
            } else {
                $this->view_posts[$data_key] = $data;
            }
        }
        return $this->view_posts;
    }
}