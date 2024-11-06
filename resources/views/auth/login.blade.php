<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gambar Matahari</title>
  <link rel="stylesheet" href="../../css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Itim&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
  <canvas id="sunCanvas" width="680" height="680"></canvas>
  <div class="inputan">
      <div class="bulatan"id="bulatan-atas"></div>
      <div class="bulatan" id="bulatan-bawah"></div>
  </div>
  <div class="inputan">
    <div class="relative">
    <form action="{{route('login.auth')}}" method="post">
      @csrf
      <input type="text"  class="username hidden" id="username" name="email">
      <input type="password" class="password hidden" id="password" name="password">
    </form>
    </div>
  </div>


  <script>
    const canvas = document.getElementById('sunCanvas');
    const ctx = canvas.getContext('2d');

    // Set posisi dan ukuran matahari
    const centerX = canvas.width / 2
    const centerY = canvas.height / 2
    const sunRadius = 200;
    const gap = 10; // Jarak antara lingkaran matahari dan sinar

    // Gambar matahari sebagai lingkaran pusat
    ctx.beginPath();
    ctx.arc(centerX, centerY, sunRadius, 0, Math.PI * 2, false);
    ctx.fillStyle = '#FFD700';
    ctx.fill();
    ctx.closePath();

    // Gambar sinar matahari
    const rayCount = 16; // Jumlah sinar matahari
    const rayLength = 160; // Panjang sinar matahari
    const rayWidth = 20;  // Lebar sinar matahari

    for (let i = 0; i < rayCount; i++) {
      const angle = (Math.PI * 2 / rayCount) * i;

      // Tentukan posisi sinar dengan jarak
      const xStart = centerX + Math.cos(angle) * (sunRadius + gap);
      const yStart = centerY + Math.sin(angle) * (sunRadius + gap);
      const xEnd = centerX + Math.cos(angle) * (sunRadius + gap + rayLength);
      const yEnd = centerY + Math.sin(angle) * (sunRadius + gap + rayLength);

      // Gambar sinar
      ctx.beginPath();
      ctx.moveTo(xStart, yStart);
      ctx.lineTo(xEnd, yEnd);
      ctx.lineWidth = rayWidth;
      ctx.strokeStyle = '#FFA500';
      ctx.stroke();
      ctx.closePath();
    }

    canvas.classList.add('rotate-rays');
    // Tambahkan event listener untuk hover
  



     // Dapatkan elemen div dan input
    const bulatanAtas = document.getElementById('bulatan-atas');
    const usernameInput = document.querySelector('.username');
    const bulatanBawah = document.getElementById('bulatan-bawah');
    const passwordInput = document.querySelector('.password');

    // Tambahkan event listener untuk klik pada elemen bulatan
    bulatanAtas.addEventListener('click', function() {
      // Ubah kelas input menjadi "block" jika saat ini kelasnya "none"
      if (usernameInput.classList.contains('hidden')) {
        usernameInput.classList.remove('hidden');
      }

      if (passwordInput.classList.contains('hidden')) {
        passwordInput.style.transform = "translate(-57%, 28%)";
      }else{
        passwordInput.style.transform = "translate(-50%, 28%)";
      }


      bulatanAtas.classList.add('hidden')
    });


    // Tambahkan event listener untuk klik pada elemen bulatan
    bulatanBawah.addEventListener('click', function() {
      // Ubah kelas input menjadi "block" jika saat ini kelasnya "none"
      if (passwordInput.classList.contains('hidden')) {
        passwordInput.classList.remove('hidden');
      }

      if (usernameInput.classList.contains('hidden')) {
        passwordInput.style.transform = "translate(-57%, 28%)";
      }else{
        passwordInput.style.transform = "translate(-50%, 28%)";
      }

      bulatanBawah.classList.add('hidden')
    });


 

    // Tambahkan event listener untuk klik pada elemen bulatan
    bulatanAtas.addEventListener('click', function() {
      // Tambahkan kelas "active" ke input untuk memicu transisi
      usernameInput.classList.add('active');
    });

    bulatanBawah.addEventListener('click',function() {
      passwordInput.classList.add('active');
    })


      document.getElementById("username").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Mencegah submit otomatis
            document.getElementById("password").focus(); // Memindahkan fokus ke password
        }
    });

      document.getElementById("password").addEventListener("keypress", function(event) {
          if (event.key === "Enter") {
              event.preventDefault(); // Mencegah submit otomatis
              this.form.submit(); // Submit form secara manual
          }
      });



  </script>
</body>
</html>
