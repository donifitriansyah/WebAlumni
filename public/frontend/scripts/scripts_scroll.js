document.addEventListener('DOMContentLoaded', function () {
  // Menangani klik pada tautan yang mengarah ke elemen dengan ID di halaman yang sama
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      const targetId = this.getAttribute('href').substring(1); // Mengambil ID dari href
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });

  // Menangani klik pada tautan yang mengarah ke halaman lain dengan ID
  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      const url = new URL(href, window.location.href);

      // Jika URL mengarah ke halaman lain dengan fragment ID
      if (url.origin === window.location.origin && url.hash) {
        e.preventDefault();
        const targetId = url.hash.substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          // Scroll ke elemen jika ditemukan
          setTimeout(() => {
            targetElement.scrollIntoView({
              behavior: 'smooth'
            });
          }, 100); // Delay untuk memastikan halaman tujuan sudah sepenuhnya dimuat
        }
      }
    });
  });
});
