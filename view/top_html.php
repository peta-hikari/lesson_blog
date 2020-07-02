<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TOP</title>
  </head>
  <body>
    <h1>Time Line</h1>

    <select name="sort">
      <option value="asc">昇順</option>
      <option value="desc">降順</option>
    </select>

    <select name="category">
      <option value="all">全て</option>
      <option value="diary">日記</option>
      <option value="hobby">趣味</option>
      <option value="cooking">料理</option>
      <option value="lifehack">ライフハック</option>
    </select>

    <div>
      <?php foreach($view_posts as $row){?>
        <div>
          <?php foreach($row as $data){ ?>
            <span><?php echo $data ?></span>
          <?php } ?>
        </div>
      <?php } ?>
    </div>

    <form method='post'>
    <div>
      <input type="submit" value='投稿する' formaction="post.php">
      <input type="submit" value='My Page' formaction="user.php">
      <input type="submit" name="logout" value='ログアウト' formaction="index.php">
      </div>
    </form>
  </body>
</html>
