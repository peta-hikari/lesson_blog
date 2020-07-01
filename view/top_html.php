<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TOP</title>
  </head>
  <body>
    <h1>Time Line</h1>

    <?php foreach($view_posts as $row){?>
      <div>
        <?php foreach($row as $data){ ?>
          <span><?php echo $data ?></span>
        <?php } ?>
      </div>
    <?php } ?>

    <form method='post'>
    <div>
      <input type="submit" value='投稿する' formaction="post.php">
      <input type="submit" value='My Page' formaction="user.php">
      <input type="submit" name="logout" value='ログアウト' formaction="index.php">
      </div>
    </form>
  </body>
</html>
