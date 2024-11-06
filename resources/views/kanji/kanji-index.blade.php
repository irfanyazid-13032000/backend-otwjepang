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

<h1> <span>{{ $totalJumlahKanji }}</span>&nbsp;<div class="search" id="clear"></div>&nbsp;&nbsp;<a href="{{route('kanji.add')}}">Daftar Kanji</a>&nbsp;&nbsp;<div class="search" id="toggleSearch"></div>&nbsp;<span id="toggleLevel"></span></h1>

<div class="find none" id="find">
  <form action="" method="get">
    <div class="search"></div>
    &nbsp;&nbsp;
    <input type="text" id="teks_pencarian" name="cari_teks">
    <select name="cari_kategori" id="kategori">
      <option value="arti">arti</option>
      <option value="kunyomi">kunyomi</option>
      <option value="onyomi">onyomi</option>
    </select>
    <button type="submit" id="cari">cari</button>
    &nbsp;&nbsp;&nbsp;
    <a href="{{route('logout')}}" class="search"></a>
  </form>
</div>


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
       <a href="{{route('kanji.edit',['id'=>$jawaban->id])}}" class="edit">変わる</a>
      </div>
      @endforeach
    </div>
  </div>
  
  <div class="pagination">
    {{ $kunciJawaban->links('pagination::custom') }}
  </div>
</body>



<script>
    document.getElementById('toggleLevel').addEventListener('click', function () {
        // Ambil URL saat ini
        const url = new URL(window.location.href);
        const searchParams = url.searchParams;

        // Tentukan level saat ini dan level berikutnya
        const levels = ['n5', 'n4', 'n3', 'n2', 'n1'];
        let currentLevel = searchParams.get('level');
        let nextLevel;

        if (!currentLevel) {
            // Jika tidak ada parameter level, mulai dari 'n5'
            nextLevel = 'n5';
        } else {
            // Cari index level saat ini dan tentukan level berikutnya
            const currentIndex = levels.indexOf(currentLevel);
            nextLevel = currentIndex < levels.length - 1 ? levels[currentIndex + 1] : null;
        }

        // Update parameter level di URL dan ganti teks span
        if (nextLevel) {
            searchParams.set('level', nextLevel);
            document.getElementById('toggleLevel').textContent = nextLevel.toUpperCase(); // Set teks ke level berikutnya
        } else {
            searchParams.delete('level');
            document.getElementById('toggleLevel').textContent = '全部'; // Reset teks ke '全部' jika tidak ada level
        }

        // Set URL baru dan redirect
        url.search = searchParams.toString();
        window.location.href = url.toString();
    });


    function updateLevelDiSpan(){
      const url = new URL(window.location.href);
        const searchParams = url.searchParams;
        const level = searchParams.get('level');

        const levels = {
            'n5': 'N5',
            'n4': 'N4',
            'n3': 'N3',
            'n2': 'N2',
            'n1': 'N1'
        };

        // Jika level ada di URL, ganti teks span dengan level yang sesuai
        if (level && levels[level]) {
            document.getElementById('toggleLevel').textContent = levels[level];
        } else {
            document.getElementById('toggleLevel').textContent = '全部'; // Reset ke '全部' jika tidak ada level
        }
    
    }

    updateLevelDiSpan()



    document.getElementById('toggleSearch').addEventListener('click',function () {
      document.getElementById('find').classList.toggle('none');
    })

    document.getElementById('clear').addEventListener('click', function () {
    // Hapus semua query string dari URL
    const url = window.location.protocol + "//" + window.location.host + window.location.pathname;
    
    window.location.href = url
    
    });


    

</script>


</html>