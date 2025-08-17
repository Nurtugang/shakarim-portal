document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('partnersContainer');
    const prevBtn = document.getElementById('partnersPrev');
    const nextBtn = document.getElementById('partnersNext');
    const partnersWrapper = document.getElementById('partnersWrapper');
    const scrollAmount = 200;

    function checkScrollability() {
        const containerWidth = container.clientWidth;
        const contentWidth = partnersWrapper.scrollWidth;

        if (contentWidth > containerWidth) {
            prevBtn.classList.remove('hidden');
            nextBtn.classList.remove('hidden');
            partnersWrapper.classList.remove('justify-center');
        } else {
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
            partnersWrapper.classList.add('justify-center');
        }
    }

    nextBtn.addEventListener('click', () => {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    checkScrollability();
    window.addEventListener('resize', checkScrollability);
});