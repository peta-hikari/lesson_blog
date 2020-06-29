<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>確認画面</title>
  </head>
  <body>
    <h1>確認画面</h1>
    <p>入力内容にお間違いがないかご確認ください。</p>

    <div class="display">
      <div class="section">
        <p>名前</p>
        <?php echo $input_datas['name']; ?>
      </div>

      <div class="section">
        <p>メールアドレス</p>
        <?php echo $input_datas['mail']; ?>
      </div>

      <div class="section">
        <p>生年月日</p>
        <?php echo $input_datas['birth']; ?>
      </div>

      <div class="section">
        <p>住所</p>
        <?php echo $input_datas['address']; ?>
      </div>

      <div class="section">
        <p>性別</p>
        <?php echo $input_datas['gender']; ?>
      </div>

      <div class="section">
        <p>パスワード</p>
        <?php echo $input_datas['pass']; ?>
      </div>
    </div>
    <form method='post'>
      <?php foreach($input_datas as $key => $data){ ?>
          <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $data; ?>">
      <?php } ?>
      <div>
        <input type="submit" value='戻る' formaction="register.php">
        <input type="submit" value='送信' formaction="complete.php">
      </div>
    </form>
  </body>
</html>