<!-- Hairstyle -->

<input class="H00001" type="radio" name="H_ID" value="H00001">
<section id="hairstyle" class="main special">
  <header class="major">
    <div class="title">
      <div class="wrapper-txt calendar-txt">
        <ul class="dynamic-txts">
          <li><span>ทรงผมที่ร้านแนะนำ</span></li>
          <li><span>ทรงผมที่ร้านแนะนำ</span></li>
          <li><span>ทรงผมที่ร้านแนะนำ</span></li>
          <li><span>ทรงผมที่ร้านแนะนำ</span></li>
        </ul>
      </div>
      <div class="description">
        <p>ทรงผมชายสุดฮิตที่ลูกค้านิยมมาตัดที่ร้านของเรา Mom House Barber</p>
      </div>
    </div>
  </header>
  <ul class="statistics">
    <?php foreach ($HS as $row) { ?>
      <li>
        <figure class="img-container">
          <div class="image-box">
            <input id="hair-style" class="input<?php echo $row->H_ID; ?>" type="radio" name="H_ID" value="<?php echo $row->H_ID; ?>">
            <img class="img<?php echo $row->H_ID; ?> btn<?php echo $row->H_ID; ?>" src="<?php echo base_url(); ?>img/<?php echo $row->H_Img1; ?>" />
          </div>
          <figcaption class="img-content">
            <h2 class="title"><?php echo $row->H_Name; ?></h2>
            <h3 class="category"><?php echo $row->H_Detail; ?></h3>
          </figcaption>
          <span class="img-content-hover">
            <h2 class="title"><?php echo $row->H_Name; ?></h2>
          </span>
        </figure>
      </li>
    <?php } ?>
  </ul>
</section>
<!-- The Modal save_Image -->
<div class="popupHair">
  <div class="popup-content hairStyle">
    <div class="closeHair">
      <i class="fas fa-times"></i>
    </div>
    <!-- photo-content -->
    <div class="photo-content">
      <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext">1 / 4</div>
          <div class="image image-H_Img1">

          </div>
          <div class="text text1"></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 4</div>
          <div class="image image-H_Img2">
            <div class="text text2"></div>
          </div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 4</div>
          <div class="image image-H_Img3">
          </div>
          <div class="text text3"></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">4 / 4</div>
          <div class="image image-H_Img4">
          </div>
          <div class="text text4"></div>
        </div>

        <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-chevron-left"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fas fa-chevron-right"></i></a>

        <div class="dot-box" style="text-align: center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span>
        </div>

      </div>
    </div>
    <!-- detail-content -->
    <div class="detail-content">
      <div class="product-content">
        <h2 class="product-title"></h2>
        <a href="#header" id="product-link" class="product-link closePopHair">Mom House Barber</a>
        <div class="product-price">
          <p class="price">ราคา : </p>
        </div>
        <div class="product-detail">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal save_Image -->
<script src="<?php echo base_url(); ?>js/Galery.js"></script>
<!-- The Modal script-save_Image -->
<script>
  document.querySelector(".btnH00001").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "flex";
  })
  document.querySelector(".btnH00002").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "flex";
  })
  document.querySelector(".btnH00003").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "flex";
  })


  document.querySelector(".closeHair").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "none"
  })
  document.querySelector(".closePopHair").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "none"
  })
</script>
<script>
  // when click image = click input
  const input1 = document.querySelector(".inputH00001");
  const input2 = document.querySelector(".inputH00002");
  const input3 = document.querySelector(".inputH00003");
  const img1 = document.querySelector(".imgH00001");
  const img2 = document.querySelector(".imgH00002");
  const img3 = document.querySelector(".imgH00003");
  img1.onclick = () => {
    input1.click();
  }
  img2.onclick = () => {
    input2.click();
  }
  img3.onclick = () => {
    input3.click();
  }
  img4.onclick = () => {
    input4.click();
  }
</script>
<!-- End Modal script-UpImage -->
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
</script>

<script>
  $(document).ready(function() {
    $('input[id="hair-style"]').change(function() {
      var H_ID = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>index.php/Customer_Con/popupHair",
        method: "POST",
        dataType: 'json',
        data: {
          H_ID: H_ID
        },

        success: function(response) {
          $('.image-H_Img1').find('img').remove();
          $('.image-H_Img2').find('img').remove();
          $('.image-H_Img3').find('img').remove();
          $('.image-H_Img4').find('img').remove();
          $('.text1').find('span').remove();
          $('.text2').find('span').remove();
          $('.text3').find('span').remove();
          $('.text4').find('span').remove();
          $('.product-title').find('span').remove();
          $('.product-detail').find('.Hname').remove();
          $('.product-detail').find('.Hprice').remove();
          $('.price').find('span').remove();

          $.each(response, function(index, data) {
            $('.image-H_Img1').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/<?php echo $row->H_Img1; ?>" />');
            $('.image-H_Img2').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/<?php echo $row->H_Img2; ?>" />');
            $('.image-H_Img3').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/<?php echo $row->H_Img3; ?>" />');
            $('.image-H_Img4').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/<?php echo $row->H_Img4; ?>" />');
            $('.text1').append('<span>ด้านขวา ของทรงผม ' + data['H_Name'] + '</span>');
            $('.text2').append('<span>ด้านซ้าย ของทรงผม ' + data['H_Name'] + '</span>');
            $('.text3').append('<span>ด้านหน้า ของทรงผม ' + data['H_Name'] + '</span>');
            $('.text4').append('<span>ด้านบน ของทรงผม ' + data['H_Name'] + '</span>');
            $('.product-title').append('<span>' + data['H_Name'] + '</span>');
            $('.product-detail').append('<p class="Hname">ผมทรง' + data['H_Name'] + '</p>');
            $('.product-detail').append('<p class="Hprice"><span class="space"></span>' + data['H_Detail'] + '</p>');
            $('.price').append('<span>' + data['Price'] + '.00 ฿</span>');
          });

        }
      });
    });
  });
</script>