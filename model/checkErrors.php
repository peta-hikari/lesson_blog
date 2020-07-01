<?php

class CheckErrors {

    /*
     * @ver array
     */
    public $errors = [];

    protected $data_validation=[
                  'name'        => 'Length|Ban|Empty',
                  'mail'        => 'Length|Mail|Empty',
                  'birth'       => 'Ban|Empty',
                  'address'     => 'Length|Ban|Empty',
                  'gender'      => 'Gender|Empty',
                  'pass'        => 'Pass|Empty',
                  'check'       => 'Ban|Length|Empty',
                  'title'       => 'Ban|Length|Empty',
                  'category_id' => 'Category',
                  'body'        => 'Ban|Length|Empty'
              ];

    protected $errors_empty = [
                "name"        => '未入力です。名前を入力してください。',
                "mail"        => '未入力です。メールアドレスを入力してください。',
                "birth"       => '未入力です。生年月日を選択してください。',
                "address"     => '未入力です。住所を入力してください。',
                "gender"      => '性別を選択してください。',
                "pass"        => '未入力です。パスワードを入力してください。',
                "check"       => '会員登録をするには同意していただく必要があります。',
                "title"       => '未入力です。タイトルを入力してください。',
                "category_id" => 'カテゴリーを選択してください。',
                "body"    => '未入力です。本文を入力してください。'
              ];

    protected $errors_length = [
                "name"    => 20,
                "mail"    => 50,
                "birth"   => '',
                "address" => 100,
                "gender"  => 10,
                "pass"    => 10,
                "check"   => 10,
                "title"   => 100,
                "body"    => 10000,
              ];

    protected $gender_array = ['M', 'F'];
    protected $category_vali;

    /*
     * @ver string
     */
    protected $mail_pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
    protected $char_pattern  = '/[\*\+\?\{\}\(\)\[\]\^\$\|\/\"\']/';
    protected $pass_pattern = '/\A[a-z\d]{8,20}+\z/i';

    /*
     * @param array $input_info
     * @return bool
     */
    public function checkDataerrors($input_info){
        foreach($input_info as $key => $data){
            $validations = $this->getVali($key);
            foreach($validations as $vali){
                if($vali == 'Mail') $this->checkMail($data);
                if($vali == 'Pass') $this->checkPass($data);
                if($vali == 'Gender') $this->checkGender($data);
                if($vali == 'Empty') $this->checkEmpty($data, $key);
                if($vali == 'Length') $this->checkLength($data, $key);
                if($vali == 'Ban') $this->checkChar($data, $key);
                if($vali == 'Category') $this->checkCategory($data);
            }
        }
        //return var_dump($this->errors);
        return empty($this->errors);
    }

    public function getVali($key){
       $vali = explode('|', $this->data_validation[$key]);
        return $vali;
    }

    public function getErrors(){
        return $this->errors;
    }

    protected function checkEmpty($data, $key){
        if(empty($data)){
            $this->errors[$key] = $this->errors_empty[$key];
        }
    }

    /*
     * @param string $data
     * @param string $key
     */
    protected function checkChar($data ,$key){
        if(preg_match($this->char_pattern, $data)){
            $this->errors[$key] = '禁則文字が含まれています。*+?{}()[]^$|/\"\'は使えません。';
        }
    }

    /*
     * @param array $data
     * @return void
     */
    protected function checkMail($data){
        if(!preg_match($this->mail_pattern, $data)){
            $this->errors['mail'] = "メールアドレスではありません。入力し直してください。";
        }
    }

    protected function checkGender($data){
        if(!in_array($data, $this->gender_array)){
            $this->errors['gender'] = "不正な入力です。";
        }
    }

    protected function checkLength($data, $key){
        if(mb_strlen($data, 'UTF-8') > $this->errors_length[$key]){
            $this->errors[$key] = '文字数がオーバーしています。入力し直してください。';
        }
    }

    protected function checkPass($data){
        if(!preg_match($this->pass_pattern, $data)){
            $this->errors['pass'] = '半角英数字で8文字以上20文字以下入力してください。';
        }
    }

    public function setCategory($data){
        $this->category_vali = $data;
    }

    protected function checkCategory($data){
        if(0 < $data && $data < $this->category_vali){
            return ;
        }
        $this->errors['category_id'] = 'カテゴリ一覧からカテゴリーを選んでください。';
    }
}