<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Kanji</title>
  <link rel="stylesheet" href="../../css/edit.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<h1><a href="{{route('kanji.index')}}">Ubah Sebuah Kanji</a></h1>

<div class="input">
  
<form method="post" action="{{route('kanji.update',['id'=>$kunciJawaban->id])}}">
  <input type="text" class="kanji" name="kanji" value="{{$kunciJawaban->kanji->teks_kanji}}">
  @csrf

  <table>
    <tr>
      <td><input type="text" class="katakana" name="katakana" placeholder="katakana" value="{{$kunciJawaban->katakana->teks_katakana}}" required></td>
      <td><input type="text" class="arti" name="arti" placeholder="arti" value="{{$kunciJawaban->arti->teks_arti}}" required></td>
      <td><input type="text" class="hiragana" name="hiragana" placeholder="hiragana" value="{{$kunciJawaban->hiragana->teks_hiragana}}" required></td>
    </tr>
    <tr>
      <td><input type="text" class="kunyomi" name="kunyomi" placeholder="kunyomi" value="{{$kunciJawaban->kunyomi->teks_kunyomi}}" required></td>
      <td>
      <select name="level" id="" class="level">
        <option value="">Pilih Level Kanji</option>
        <option @if ($kunciJawaban->kanji->level == 'n5') selected @endif value="n5">N5</option>
        <option @if ($kunciJawaban->kanji->level == 'n4') selected @endif value="n4">N4</option>
        <option @if ($kunciJawaban->kanji->level == 'n3') selected @endif value="n3">N3</option>
        <option @if ($kunciJawaban->kanji->level == 'n2') selected @endif value="n2">N2</option>
        <option @if ($kunciJawaban->kanji->level == 'n1') selected @endif value="n1">N1</option>
      </select>
    </td>
      <td><input type="text" class="onyomi" name="onyomi" placeholder="onyomi" value="{{$kunciJawaban->onyomi->teks_onyomi}}" required oninput="this.value = this.value.toUpperCase();"></td>
    </tr>
  </table>

  <div class="center">
    <button type="submit">追加</button>
  </div>

</form>

  
  
</div>
  
</body>

<script>
</script>
</html>