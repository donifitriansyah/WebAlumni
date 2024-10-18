// JavaScript Slider Functionality

const slides = document.querySelector('.news-slides');
const slideItems = document.querySelectorAll('.news-slide'); // Ambil semua slide
const navButtons = document.querySelectorAll('.nav-btn');

let currentSlide = 0;
const slideInterval = 3000;

// Fungsi untuk menggeser ke slide tertentu
function goToSlide(slideIndex) {
    const slideWidth = document.querySelector('.news-slide').clientWidth; // Lebar tiap slide
    slides.style.transform = `translateX(-${slideWidth * slideIndex}px)`; // Menggeser ke slide yang dipilih

    // Perbarui status tombol navigasi
    navButtons.forEach((btn, index) => {
        if (index === slideIndex) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    currentSlide = slideIndex; // Update slide saat ini
}

// Event listener untuk tombol navigasi
navButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        goToSlide(index);
        clearInterval(autoSlideInterval); // Hentikan auto-slide saat tombol diklik
        autoSlideInterval = setInterval(autoSlide, slideInterval); // Restart auto-slide
    });
});

// Fungsi untuk auto slide
function autoSlide() {
    currentSlide = (currentSlide + 1) % slideItems.length; // Geser ke slide berikutnya
    goToSlide(currentSlide);
}

// Jalankan auto-slide setiap interval
let autoSlideInterval = setInterval(autoSlide, slideInterval);
