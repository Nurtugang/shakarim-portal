// Slider functionality
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.slide-dot');
const totalSlides = slides.length;

function showSlide(n) {
    slides.forEach(slide => {
        slide.style.opacity = '0';
    });
    
    // Remove active class from all dots
    dots.forEach(dot => {
        dot.classList.remove('active');
        dot.classList.add('bg-opacity-50');
    });

    // Show current slide
    slides[n].style.opacity = '1';
    
    // Highlight current dot
    dots[n].classList.add('active');
    dots[n].classList.remove('bg-opacity-50');

    currentSlide = n;
}

function nextSlide() {
    const next = (currentSlide + 1) % totalSlides;
    showSlide(next);
}

function previousSlide() {
    const prev = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(prev);
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        showSlide(index);
    });
});

setInterval(nextSlide, 5000);

showSlide(0);

let touchStartX = 0;
let touchEndX = 0;

const sliderContainer = document.querySelector('.slider-container'); // Assuming .page-wrapper contains the slider

if (sliderContainer) {
    sliderContainer.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
    });

    sliderContainer.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].clientX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50; // Minimum distance for a swipe

        if (touchEndX < touchStartX - swipeThreshold) {
            // Swiped left
            nextSlide();
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swiped right
            previousSlide();
        }
    }
}