let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slides");
    let textElements = document.getElementsByClassName("text");

    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('show');  // Hide all slides
        textElements[i].classList.remove('show-text');  // Hide text
    }

    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].classList.add('show');  // Show the current slide
    textElements[slideIndex - 1].classList.add('show-text');  // Show the text

    setTimeout(showSlides, 4000); // Change image every 4 seconds with delay for animation
}

function plusSlides(n) {
    slideIndex += n;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
    }
    showSlides();
}

showSlides(); // Initialize the slideshow
