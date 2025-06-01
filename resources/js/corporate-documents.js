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
});