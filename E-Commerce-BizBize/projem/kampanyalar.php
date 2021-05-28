   <?php 
                if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {

                    exit("Bu sayfaya erişim yasak");

                }
                ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="bugra.css">

	<title>KAMPANYALARIM</title>
</head>
<body>
<div class="container">
    <h2 class="title-default">Kampanyalar</h2>  
</div>
<div class="swiper-container" style="height:500px;">
    <div class="swiper-wrapper">

      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/2.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/3.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/4.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/5.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/6.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/7.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/8.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/9.jpg"></div>
      <div class="swiper-slide"><img width="300" height="300" src="dimg/banner/cenk.jpg"></div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
 <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 20,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slideShadows: true,
      },
      loop:true, 
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    });
  </script>
</body>
</html>