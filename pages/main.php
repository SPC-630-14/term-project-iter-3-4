<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <title>Logo</title>
  </head>

  <body>
    <main>
      <div class="slideshow-container">
        <h1 class="s-header" style="text-align: center">
          OUR BRAND NEW SPRING ITEMS
        </h1>

        <div class="mySlides fade">
          <img
            class="img-1"
            src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/amazon-rivet-furniture-1533048038.jpg?crop=1.00xw:0.502xh;0,0.423xh&resize=1200:*"
          />
          <div class="text">Sofa</div>
        </div>

        <div class="mySlides fade">
          <img
            class="img-2"
            src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/online-furniture-stores-1610037638.jpg?crop=1.00xw:1.00xh;0,0&resize=640:*"
          />
          <div class="text">Chair</div>
        </div>

        <div class="mySlides fade">
          <img
            class="img-3"
            src="https://www.bedroomfurniturediscounts.com/media/catalog/product/b/4/b4056_brookfield_drawer_closed_1_3.jpg"
          />
          <div class="text">Bed</div>
        </div>
      </div>
      <br />

      <div style="position: relative; left: 50%">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </main>

    <footer>
      <div class="f-headers">
        <a href="aboutUs.php"><p class="about">About Us</p></a>
        <a href="review.php"><p class="reviews">Reviews</p></a>
        <a href="aboutUs.php"><p class="products">Our Products</p></a>
        <a href="login.php"><p class="account">My Account</p></a>
      </div>

      <!-- ABOUT US -->
      <div class="details-AU">
        <p class="about-logo">About Our Logo</p>
        <p class="jobs-logo">Logo Jobs</p>
        <p class="d-logo">Logo Development</p>
      </div>

      <!-- REVIEWS -->
      <div class="details-Review">
        <p class="review-logo">Our Reviews</p>
        <p class="makeR-logo">Make a Review</p>
        <p class="comments-logo">Comments</p>
      </div>

      <!-- OUR PRODUCTS -->
      <div class="details-Products">
        <p class="fur-logo">Furniture</p>
        <p class="office-logo">Home Office</p>
        <p class="beds-logo">Beds</p>
        <p class="br-logo">Bathroom</p>
      </div>

      <!-- MY ACCOUNT -->
      <div class="details-ACC">
        <p class="acc-logo">My Account</p>
        <p class="priv-logo">Privacy</p>
        <p class="gen-logo">General Settings</p>
      </div>

      <div class="line"></div>
    </footer>
    <script>
      var slideIndex = 0;
      showSlides();

      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
          slideIndex = 1;
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
      }
    </script>
  </body>
</html>
