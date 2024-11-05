<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gambar Matahari</title>
  <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
  <canvas id="sunCanvas" width="680" height="680"></canvas>
  <div class="inputan">
    <div class="bulatan"id="bulatan-atas"></div>
    <div class="bulatan" id="bulatan-bawah"></div>
  </div>
  <div class="inputan">
    <div class="relative">
      <input type="text"  class="username hidden">
      <input type="password" class="password hidden">
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


  </script>
</body>
</html>
