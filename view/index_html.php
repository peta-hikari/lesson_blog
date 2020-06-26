<!doctype html>
<html>
  <hrad>
    <meta charset="UTF-8">
    <title>Blog-ログイン画面</title>
  </head>
  <body>
    <h1>ログイン</h1>
    <p>ログインしてください。</p>
    <p>会員でない方は新規登録を行ってください。</p>

    <form method='post'>
      <p>メールアドレス</p>
      <input type="email" name=mail value="">

      <p>パスワード</p>
      <input type="text" name=pass value="">

      <div>
        <input type="submit" value='ログイン' formaction="top.php">
        <input type="submit" value='新規登録' formaction="register.php">
      </div>
    </form>
  </body>
</html>