document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.getElementById('search-toggle');
    const searchField = document.getElementById('search-field');
    
    searchToggle.addEventListener('click', function(e) {
        e.preventDefault();
        searchField.classList.toggle('hidden');
        if (!searchField.classList.contains('hidden')) {
            searchField.querySelector('input').focus();
        }
    });

    document.addEventListener('click', function(event) {
        if (!searchToggle.contains(event.target) && !searchField.contains(event.target)) {
            searchField.classList.add('hidden');
        }
    });
});