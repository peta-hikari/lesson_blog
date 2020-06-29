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

	/**
	 * 記事データをDBに保存
	 */
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

	public function getDbData(){
		$sql = "SELECT * FROM contact_info";
		$res = $this->pdo->query($sql);
		return $res;
	}
}
