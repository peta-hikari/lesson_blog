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
      </div>

      <div class="section">
        <p>メールアドレス</p>
      </div>

      <div class="section">
        <p>生年月日</p>
      </div>

      <div class="section">
        <p>住所</p>
      </div>

      <div class="section">
        <p>性別</p>
      </div>

    <form method='post'>
    <div>
      <input type="submit" value='戻る' formaction="register.php">
      <input type="submit" value='送信' formaction="complete.php">
      </div>
    </form>
  </body>
</html>