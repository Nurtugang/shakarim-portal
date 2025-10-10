if (!localStorage.getItem('cookiesAccepted')) {
    document.getElementById('cookieBanner').classList.remove('hidden');
}

function acceptCookies() {
    localStorage.setItem('cookiesAccepted', 'true');
    document.getElementById('cookieBanner').classList.add('hidden');
}