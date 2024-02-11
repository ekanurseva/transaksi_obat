function updateClock() {
  // Buat objek tanggal dan waktu sekarang
  var now = new Date();

  // Ambil komponen jam, menit, dan detik
  var hours = now.getHours();
  var minutes = now.getMinutes();
  var seconds = now.getSeconds();

  // Tambahkan nol di depan jika jam, menit, atau detik kurang dari 10
  hours = hours < 10 ? "0" + hours : hours;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  // Format tampilan jam (misal: "12:34:56")
  var timeString = "Waktu saat ini: " + hours + ":" + minutes + ":" + seconds;

  // Perbarui teks pada elemen jam
  document.getElementById("clock").textContent = timeString;
}

// Panggil fungsi updateClock setiap detik (1000 milidetik)
setInterval(updateClock, 1000);

// Panggil updateClock untuk pertama kali saat halaman dimuat
updateClock();
