<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ini adalah kanji loh</title>
  <link rel="stylesheet" href="../../css/kanji.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<h1><a href="{{route('kanji.add')}}">Daftar Kanji</a></h1>

<div class="center">
  <div class="huruf">
      @foreach ($kunciJawaban as $jawaban)
      <div class="card">
        <p class="kanji">{{$jawaban->kanji->teks_kanji}}</p>
        <div class="keterangan">
          <p class="arti">arti : {{$jawaban->arti->teks_arti}}</p>
          <p class="hiragana">hiragana : {{$jawaban->hiragana->teks_hiragana}}</p>
          <p class="katakana">katakana : {{$jawaban->katakana->teks_katakana}}</p>
          <p class="onyomi">onyomi : {{$jawaban->onyomi->teks_onyomi}}</p>
          <p class="kunyomi">kunyomi : {{$jawaban->kunyomi->teks_kunyomi}}</p>
        </div>
       <button class="edit">edit</button>
      </div>
      @endforeach
    </div>
  </div>
  
  <div class="pagination">
    {{ $kunciJawaban->links('pagination::custom') }}
  </div>
</body>
</html>