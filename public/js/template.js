document.addEventListener('DOMContentLoaded', function() {
    // SPOILER LOGIC FOR content
    document.querySelectorAll('.content .spoiler-title').forEach(function(title) {
        title.addEventListener('click', function() {
            var toggle = this.querySelector('.spoiler-toggle');
            if (toggle) {
                toggle.classList.toggle('show-icon');
                toggle.classList.toggle('hide-icon');
            }
            var content = this.parentElement.querySelector('.spoiler-content');
            if (content) {
                content.style.display = (content.style.display === 'none' || content.style.display === '') ? 'block' : 'none';
            }
        });
    });

    // TEST BUTTONS LOGIC
    const testButtons = document.querySelectorAll('.test-btn');
    const imageBlock = document.getElementById('test-image-block');
    let currentImg = '';
    testButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const img = this.getAttribute('data-img');
            if (imageBlock.style.display !== 'none' && currentImg === img) {
                imageBlock.style.display = 'none';
                imageBlock.innerHTML = '';
                currentImg = '';
            } else {
                imageBlock.innerHTML = `<img src="${img}" alt="${img}" style="max-width:100%;height:auto;display:block;margin:0 auto;box-shadow:0 2px 12px rgba(0,0,0,0.08);border-radius:8px;">`;
                imageBlock.style.display = 'block';
                currentImg = img;
            }
        });
    });
});