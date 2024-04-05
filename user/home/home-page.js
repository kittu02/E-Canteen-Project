const slideContainer = document.getElementById("container2");
const slides = slideContainer.querySelectorAll("img");

let currentSlideIndex = 0;
function changeSlide() {
  slides[currentSlideIndex].style.opacity = 0; // Fade out current slide
  currentSlideIndex = (currentSlideIndex + 1) % slides.length; // Cycle through slides
  slides[currentSlideIndex].style.opacity = 1; // Fade in next slide
}
setInterval(changeSlide, 2000);

function searchdata(){
    var searchName = document.getElementById("searchTab")

    // from the daat base of the food/canteen it will search 
}

function opensideMenu(){
    // here we have to show the detail of person and log out/feedback

}

function slideshow(){

    document.getElementById("container2").innerHTML = list;

}
