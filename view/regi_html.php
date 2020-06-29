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
        <input type="text" name="name" value="<?php echo $input_datas['name'] ?>">
        <?php if(!empty($errors['name'])){ ?>
          <div class="error">
            <?php echo $errors['name']; ?>
          </div>
        <?php } ?>
      </div>

      <div class="section">
        <p>メールアドレス</p>
        <input type="email" name="mail" value="<?php echo $input_datas['mail'] ?>">
        <?php if(!empty($errors['mail'])){ ?>
          <div class="error">
            <?php echo $errors['mail']; ?>
          </div>
        <?php } ?>
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
        <?php if(!empty($errors['birth'])){ ?>
          <div class="error">
            <?php echo $errors['birth']; ?>
          </div>
        <?php } ?>
      </div>

      <div class="section">
        <p>住所</p>
        <p class="condition">100文字以内</p>
        <input type="text" name="address" value="<?php echo $input_datas['address'] ?>">
        <?php if(!empty($errors['address'])){ ?>
          <div class="error">
            <?php echo $errors['address']; ?>
          </div>
        <?php } ?>
      </div>

      <div class="section">
        <p>性別</p>
        <input type="radio" name="gender" value="M" checked>男性
        <input type="radio" name="gender" value="F">女性
        <?php if(!empty($errors['gender'])){ ?>
          <div class="error">
            <?php echo $errors['gender']; ?>
          </div>
        <?php } ?>
      </div>

      <div class="section">
        <p>パスワード</p>
        <p class="condition">8文字以上</p>
        <input type="password" name="pass" value="<?php echo $input_datas['pass'] ?>">
        <?php if(!empty($errors['pass'])){ ?>
          <div class="error">
            <?php echo $errors['pass']; ?>
          </div>
        <?php } ?>
      </div>

        <p>
          <p>個人情報の取り扱いについて</P>
          <input type="hidden" name="check" value="">
          <input type="checkbox" name="check" value="on">同意しました
        </p>
        <?php if(!empty($errors['check'])){ ?>
          <div class="error">
            <?php echo $errors['check']; ?>
          </div>
        <?php } ?>

      <input type="submit" value='戻る' formaction="index.php">
      <input type="submit" value='確認' formaction="check.php">
    </form>
  </body>
  </html>