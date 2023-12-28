document.addEventListener('scroll', function() {
    const button = document.querySelector('.to_pageTop');
    if (window.scrollY > 500) {
        button.style.display = 'flex';
    } else {
        button.style.display = 'none';
    }
});

document.querySelector('.to_pageTop').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
