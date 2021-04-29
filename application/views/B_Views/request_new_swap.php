        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <!-- <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Profile</h2>
                    </div>
                    <div class="mdl-card__media">
                        <img class="article-image" src="<?php echo base_url('images/about-header.jpg');?>" border="0" alt="">
                    </div> -->

                    <div class="mdl-grid portfolio-copy">
                       
                    <!-- button used to open the lightbox -->
                        <div class="row">
                            <div class="column">
                            <button id="swap" class="hover-shadow mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent card-link alignright" type="button" onclick="openModal();currentSlide(1)">
                                Request Swap
                            </button>
                            </div>
                        </div>

                        <!-- The Modal/Lightbox -->
                        <div id="myModal" class="modal">
                        <span class="close cursor" onclick="closeModal()">&times;</span>
                        <div class="modal-content">

                            <div class="mySlides">
                            <div class="numbertext">1 / 4</div>
                            <img src='../../images/about_us_images/1.png' style="width:100%; max-height:250px;">
                            </div>

                            <!-- Caption text -->
                                <div class="caption-container">
                                    <p id="caption"></p>
                                </div>

                               
                        </div>
                    </div>
                        
                    </div>
                </div>


            </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script>
    // window.onload = function(){
    //     var active = document.getElementById("abt");
    //     active.classList.add("is-active");
    //     }
    
    document.getElementById("bsp").onclick=function()
    {
        document.getElementById("bspe").style.display = ""; 
        document.getElementById('bsp').style.display = "none";
    };

    document.getElementById("cancel").onclick=function()
    {
        document.getElementById("bsp").style.display = ""; 
        document.getElementById('bspe').style.display = "none";
    };

    document.getElementById("avatar").onclick=function()
    {
        window.location.href="<?php echo site_url('Users/show_avatars');?>";
    };
    </script>

<script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
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
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
