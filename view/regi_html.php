<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新規会員登録</title>
  </head>
  <body>
    <h1>新規会員登録</h1>
    <p> 下記の項目をご記入ください。</p>

    <form method='post'>
      <div class="section">
        <p>名前</p>
        <p class="condition">10文字以内</p>
        <input type="text" name="name" value="">
        </div>
      </div>

      <div class="section">
        <p>メールアドレス</p>
        <input type="email" name="mail" value="">
      </div>

      <div class="section">
        <p>生年月日</p>
        <select name="year">
          <option value="">----</option>
          <?php foreach($years as $data){ ?>
            <option value="<?php echo $data ?>"><?php echo $data ?></option>
          <?php } ?>
        </select>

        <select name="month">
          <option value="">--</option>
          <?php foreach($months as $data){ ?>
            <option value="<?php echo $data ?>"><?php echo $data ?></option>
          <?php } ?>
          </select>

        <select name="day">
          <option value="">--</option>
          <?php foreach($days as $data){ ?>
            <option value="<?php echo $data ?>"><?php echo $data?></option>
          <?php } ?>
        </select>
      </div>

      <div class="section">
        <p>住所</p>
        <p class="condition">400文字以内</p>
        <input type="text" name="main" value="">
      </div>

      <div class="section">
        <p>性別</p>
        <input type="radio" name="gender" value="M" checked>男性
        <input type="radio" name="gender" value="F">女性
      </div>

      <div class="section">
        <p>パスワード</p>
        <p class="condition">8文字以上</p>
        <input type="pasward" name="main" value="">
      </div>

        <p>
          <p>個人情報の取り扱いについて</P>
          <input type="hidden" name="check" value="">
          <input type="checkbox" name="check" value="on">同意しました
        </p>

      <input type="submit" value='戻る' formaction="index.php">
      <input type="submit" value='確認' formaction="check.php">
    </form>
  </body>
  </html>