<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Page</title>
  </head>
  <body>
    <h1>My page</h1>

    <form method='post'>
    <div>
      <input type="submit" value='投稿する' formaction="post.php">
      <input type="submit" value='会員情報の変更' formaction="updata.php">
      <input type="submit" value='Top' formaction="top.php">
      <input type="submit" name="logout" value='ログアウト' formaction="index.php">
      </div>
    </form>
  </body>
</html>