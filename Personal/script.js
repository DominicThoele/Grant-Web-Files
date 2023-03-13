

// JavaScript code to add the shadow when user scrolls from top of screen to the header using 
// .shadow-in and .shadow-out keyframes

var element = document.querySelector('header');

window.addEventListener('scroll', function() {
  if (window.scrollY > 0) {
    element.classList.add('shadow-in');
  } else{
    element.classList.remove('shadow-in');
    element.classList.add('shadow-out');
    
  }
});


// Slideshow Code
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";  
  dots[slideIndex-1].className += " active";
}