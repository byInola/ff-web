///menu
function toggleSubMenu() {
  var submenu = document.getElementById("p1");
  var angleUp = document.getElementById("angle-up");
  var angleDown = document.getElementById("angle-down");
  
  if (submenu.style.display === "none" || submenu.style.display === "") {
    submenu.style.display = "flex";
    angleUp.style.display = "inline";
    angleDown.style.display = "none";
  } else {
    submenu.style.display = "none";
    angleUp.style.display = "none";
    angleDown.style.display = "inline";
  }
}

document.getElementById("close-angle").addEventListener("click", function() {
  var openElement = document.querySelector(".open");
  openElement.style.display = "none";
});

document.getElementById("m_lines").addEventListener("click", function() {
  var openElement = document.querySelector(".open");
  openElement.style.display = "block";
});





//slider
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n)
    {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) 
    {
      var i;
      var slides = document.getElementsByClassName("slides");
      var dots = document.getElementsByClassName("dot");

      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}

      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
}


//galery
function LoadMore() {
    var loadMoreButton = document.getElementById("load"); 
    var loadMoreImages = document.querySelector(".row2"); 

    
    if (loadMoreImages.style.display === "none") {
        loadMoreImages.style.display = "block"; 
        loadMoreButton.textContent = "Show Less"; 
    } else {
        loadMoreImages.style.display = "none"; 
        loadMoreButton.textContent = "Load More"; 
    }
}
