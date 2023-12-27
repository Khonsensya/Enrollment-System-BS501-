var slidePosition = 1;
SlideShow(slidePosition);

function SlideShow(n) {
    var i;
    var slides = document.getElementsByClassName("banner-item");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slidePosition++;
    if (slidePosition > slides.length) {slidePosition = 1}
    slides[slidePosition-1].style.display = "block";
    setTimeout(SlideShow, 5000);
  } 

var slidePosition = 0;
SlideShow();

