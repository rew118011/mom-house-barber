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
    <div class="container-hairstyle" id="card-HairStyle">
        <?php foreach ($HS as $row) { ?>
            <div class="card">
                <figure class="card__thumb">
                    <div class="image-box-hairstyle">
                        <input id="hair-style" class="input<?php echo $row->H_ID; ?> inputH" type="radio" name="H_ID" value="<?php echo $row->H_ID; ?>">
                        <img src="<?php echo base_url(); ?>img/HairStyle/<?php echo $row->H_Img1; ?>" />
                    </div>
                    <figcaption class="card__caption">
                        <h2 class="card__title"><?php echo $row->H_Name; ?></h2>
                        <p class="card__button img<?php echo $row->H_ID; ?> btn<?php echo $row->H_ID; ?> btnH">ดูข้อมูลเพิ่มเติม</p>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<!-- The Modal Hairstyle -->
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

<!-- main Finish -->
</div>