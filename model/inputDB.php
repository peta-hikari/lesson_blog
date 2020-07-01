<?php

class InputDB {
    public $pdo;

	/**
	 * コネクション確保
	 */
	public function __construct() {
		try {
			$this->pdo = new PDO(
                'mysql:dbname=blog_data;host=localhost;charset=utf8mb4',
                'root',
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
			);
		} catch (PDOException $e) {
			echo '送信に失敗しました。もう一度初めからやり直してください。';
			die();
		}
	}

	public function saveDbPostData($data){

		// データの保存
		$now = date('Y-m-d H:i:s');
        $smt = $this->pdo->prepare('insert into users(name, mail, birth, address, gender, pass, regi_at) 
                                   values(:name,:mail,:birth,:address,:gender,:pass, :regi_at)');
		$smt->bindValue(':name', $data['name'], PDO::PARAM_STR);
		$smt->bindValue(':mail', $data['mail'], PDO::PARAM_STR);
        $smt->bindValue(':birth', $data['birth'], PDO::PARAM_STR);
        $smt->bindValue(':address', $data['address'], PDO::PARAM_STR);
        $smt->bindValue(':gender', $data['gender'], PDO::PARAM_STR);
        $smt->bindValue(':pass', $data['pass'], PDO::PARAM_STR);
        $smt->bindValue(':regi_at', $now, PDO::PARAM_STR);
        $smt->execute();

	}

	public function getCategories(){
		$sql = "SELECT * FROM categories";
		$res = $this->pdo->query($sql);
		return $res;
    }

    public function getPosts(){
        $sql = "select title, body, category_id from posts";
        $res = $this->pdo->query($sql);
        return $res;
    }

    protected function getUserid($mail, $pass){
        $smt = $this->pdo->prepare("select id from users where mail = :mail and pass = :pass");
        $smt->bindValue(':mail', $mail);
        $smt->bindValue('pass', $pass);
        $smt->execute();
        $row = $smt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function searchUser($datas){
        $smt = $this->pdo->prepare('select * from users where mail = ?');
        $smt->execute([$datas['mail']]);
        $row = $smt->fetch(PDO::FETCH_ASSOC);

        if ($datas['mail'] != $row['mail']) {
            return false;
        }

        if ($datas['pass'] == $row['pass']) {
            $this->inputLogins($datas);
            return true;
        } else {
            return false;
        }

    }

    protected function inputLogins($datas){
        $now = date('Y-m-d H:i:s');
        $smt = $this->pdo->prepare('insert into logins(mail, pass, login_at) 
        values(:mail, :pass, :login_at)');
        $smt->bindValue(':mail', $datas['mail'], PDO::PARAM_STR);
        $smt->bindValue(':pass', $datas['pass'], PDO::PARAM_STR);
        $smt->bindValue(':login_at', $now, PDO::PARAM_STR);
        $smt->execute();
    }

    public function inputPosts($datas){
        $user_id = $this->getUserid($_SESSION['mail'], $_SESSION['pass']);
        $now = date('Y-m-d H:i:s');
        $smt = $this->pdo->prepare('insert into posts(title, body, user_id, category_id, post_at) 
        values(:title, :body, :user_id, :category_id, :post_at)');
        $smt->bindValue(':title', $datas['title'], PDO::PARAM_STR);
        $smt->bindValue(':body', $datas['body'], PDO::PARAM_STR);
        $smt->bindValue(':user_id', $user_id['id'], PDO::PARAM_INT);
        $smt->bindValue(':category_id', $datas['category_id'], PDO::PARAM_INT);
        $smt->bindValue(':post_at', $now, PDO::PARAM_STR);
        $smt->execute();
    }
}
