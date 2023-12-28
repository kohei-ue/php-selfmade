const backgroundImages = [
    'url("/image/background.jpg")',
    'url("/image/background2.jpg")',
    'url("/image/background3.jpg")',
    'url("/image/background4.jpg")',
    'url("/image/background5.jpg")',
];

const randomIndex = Math.floor(Math.random() * backgroundImages.length);
const selectedImage = backgroundImages[randomIndex];

// document.body.style.backgroundImage = selectedImage;
// document.body.style.backgroundSize = 'cover';
// document.body.style.backgroundPosition = 'center center';
// document.body.style.backgroundRepeat = 'no-repeat';

document.getElementById('background-overlay').style.backgroundImage = selectedImage;