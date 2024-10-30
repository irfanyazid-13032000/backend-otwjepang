<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>insert kanji</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<h1>Insert Sebuah Kanji</h1>

<div class="input">
  
<form method="post" action="/kanji/store">
  <input type="text" class="kanji" name="kanji">
  @csrf

  <table>
    <tr>
      <td><input type="text" class="katakana" name="katakana" placeholder="katakana"></td>
      <td><input type="text" class="hiragana" name="hiragana" placeholder="hiragana"></td>
    </tr>
    <tr>
      <td><input type="text" class="kunyomi" name="kunyomi" placeholder="kunyomi"></td>
      <td><input type="text" class="onyomi" name="onyomi" placeholder="onyomi"></td>
    </tr>
  </table>


  <div class="center">
    <button type="submit">追加</button>
  </div>

</form>

  
  
  
</div>
  
</body>
</html>