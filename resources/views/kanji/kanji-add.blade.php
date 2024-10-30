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
      <td><input type="text" class="katakana" name="katakana" placeholder="katakana" required></td>
      <td><input type="text" class="arti" name="arti" placeholder="arti" required></td>
      <td><input type="text" class="hiragana" name="hiragana" placeholder="hiragana" required></td>
    </tr>
    <tr>
      <td><input type="text" class="kunyomi" name="kunyomi" placeholder="kunyomi" required></td>
      <td>
      <select name="level" id="" class="level">
        <option value="">Pilih Level Kanji</option>
        <option value="n5">N5</option>
        <option value="n4">N4</option>
        <option value="n3">N3</option>
        <option value="n2">N2</option>
        <option value="n1">N1</option>
      </select>
    </td>
      <td><input type="text" class="onyomi" name="onyomi" placeholder="onyomi" required></td>
    </tr>
  </table>


</form>

<div class="center">
  <button type="submit">追加</button>
</div>
  
  
</div>
  
</body>
</html>