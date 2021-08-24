<!-- Hairstyle -->

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
  <div class="container-hairstyle">
    <?php foreach ($HS as $row) { ?>
      <div class="card">
        <figure class="card__thumb">
          <div class="image-box-hairstyle">
            <input id="hair-style" class="input<?php echo $row->H_ID; ?>" type="radio" name="H_ID" value="<?php echo $row->H_ID; ?>">
            <img src="<?php echo base_url(); ?>img/<?php echo $row->H_Img1; ?>" />
          </div>
          <figcaption class="card__caption">
            <h2 class="card__title"><?php echo $row->H_Name; ?></h2>
            <p class="card__button img<?php echo $row->H_ID; ?> btn<?php echo $row->H_ID; ?>">ดูข้อมูลเพิ่มเติม</p>
          </figcaption>
        </figure>
      </div>
    <?php } ?>
  </div>
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
          </div>
          <div class="text text2"></div>
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
<!-- popup -->
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
  document.querySelector(".btnH00004").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "flex";
  })
  document.querySelector(".btnH00005").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "flex";
  })
  document.querySelector(".btnH00006").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "flex";
  })



  document.querySelector(".closeHair").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "none";
  })
  document.querySelector(".closePopHair").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "none"
  })

  // count element in html
  // var parent = document.getElementById("parentId");
  // var nodesSameClass = parent.getElementsByClassName("test");
  // console.log(nodesSameClass.length);
</script>

<script>
  // when click image = click input
  const input1 = document.querySelector(".inputH00001");
  const input2 = document.querySelector(".inputH00002");
  const input3 = document.querySelector(".inputH00003");
  const input4 = document.querySelector(".inputH00004");
  const input5 = document.querySelector(".inputH00005");
  const input6 = document.querySelector(".inputH00006");
  const input7 = document.querySelector(".inputH00007");
  const input8 = document.querySelector(".inputH00008");
  const input9 = document.querySelector(".inputH00009");
  const img1 = document.querySelector(".imgH00001");
  const img2 = document.querySelector(".imgH00002");
  const img3 = document.querySelector(".imgH00003");
  const img4 = document.querySelector(".imgH00004");
  const img5 = document.querySelector(".imgH00005");
  const img6 = document.querySelector(".imgH00006");
  const img7 = document.querySelector(".imgH00007");
  const img8 = document.querySelector(".imgH00008");
  const img9 = document.querySelector(".imgH00009");

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
  img5.onclick = () => {
    input5.click();
  }
  img6.onclick = () => {
    input6.click();
  }
  img7.onclick = () => {
    input7.click();
  }
  img8.onclick = () => {
    input8.click();
  }
  img9.onclick = () => {
    input9.click();
  }
</script>
<!-- slide img -->
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
<!-- jquery ajax hair style -->
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