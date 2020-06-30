<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>投稿フォーム</title>
  </head>
  <body>
  <form method='post'>
      <h1>投稿フォーム</h1>

      <div>
        <p>タイトル</p>
        <p><input type='text' name=title value=""></p>
        <?php if(!empty($errors['title'])){ ?>
          <div class="error">
            <?php echo $errors['title']; ?>
          </div>
        <?php } ?>

        <div>
          <p>カテゴリー</p>
          <select name="category_id">
            <?php foreach($category_items as $key => $value){ ?>
              <option value="<?php echo $key ?>"><?php echo $value ?></option>
            <?php } ?>
          </select>
          <?php if(!empty($errors['category_id'])){ ?>
            <div class="error">
              <?php echo $errors['category_id']; ?>
            </div>
          <?php } ?>
        </div>

        <p>本文</p>
        <input type='text' name=body value="">
        <?php if(!empty($errors['body'])){ ?>
          <div class="error">
            <?php echo $errors['body']; ?>
          </div>
        <?php } ?>
      </div>
      <div>
        <input type="submit" value='投稿する' formaction="postcomp.php">
        <input type="submit" value='戻る' formaction="top.php">
      </div>
    </form>
</body>
</html>