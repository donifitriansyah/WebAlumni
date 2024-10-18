document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelector('.news-slides');
    const navButtons = document.querySelectorAll('.slider-nav button');
    let currentSlide = 0;

    function goToSlide(n) {
        slides.style.transform = `translateX(-${n * 100}%)`;
        navButtons.forEach((btn, i) => {
            btn.classList.toggle('active', i === n);
        });
        currentSlide = n;
    }

    navButtons.forEach((button, index) => {
        button.addEventListener('click', () => goToSlide(index));
    });

    // Optional: Auto-slide every 5 seconds
    setInterval(() => {
        currentSlide = (currentSlide + 1) % navButtons.length;
        goToSlide(currentSlide);
    }, 8000);
});