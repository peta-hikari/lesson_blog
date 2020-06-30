<?php

class PostData {

    protected $post_items = ['title', 'category_id', 'body'];
    protected $input_posts = [];

    function __construct(){
        foreach($this->post_items as $value){
          $this->input_posts[$value] = "";
        }
    }

    public function setPost($data, $key){
        $this->input_posts[$key] = $data;
    }

    public function getPost(){
        return $this->input_posts;
    }

    public function getItems(){
        return $this->post_items;
    }
}