// Открываем первый details элемент при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    const firstDetails = document.querySelector('.tiptap-content details:first-of-type');
    if (firstDetails) {
        firstDetails.setAttribute('open', '');
    }
});
