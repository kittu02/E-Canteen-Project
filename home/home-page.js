let slideIndex = 1;
showSlides(1); // Ensure at least one slide is initially shown

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
  if (n > slides.length) {
    slideIndex = 1;
  } else if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  if (dots) { 
    dots[slideIndex - 1].className += " active";
  }
}

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
