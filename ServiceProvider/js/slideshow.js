$(document).ready(function() {
    var images = [
        'image1.jpg',
        'image2.jpg',
        'image3.jpg',
        'image4.jpg'
    ];

    var currentIndex = 0;
//id sel
    function nextImage() {
        $('#slideshow').css('background-image', 'url(../image/' + images[currentIndex] + ')');
        currentIndex = (currentIndex + 1) % images.length;
    }

    nextImage();

    setInterval(nextImage, 3000); 
});
