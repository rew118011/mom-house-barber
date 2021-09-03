<!-- All Barber -->
<section id="barber-all" class="main special">
    <header class="major">
        <div class="title">
            <div class="wrapper-txt calendar-txt">
                <ul class="dynamic-txts">
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                </ul>
            </div>
            <div class="description">
                <p>
                    ในร้านของเรา มีช่างตัดผมฝีมือดีให้ท่านได้เลือกตัดมากมาย หากต้องการดูโปรไฟล์ของช่าง คลิก! ที่ชื่อช่างใต้รูปได้เลย
                </p>
            </div>
        </div>
    </header>
    <ul class="features" id="card-Barber">
        <?php
        foreach ($Barber as $row) {
        ?>
            <li>
                <div class="image-barber">
                    <span class="icon major"><img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="" /></span>
                </div>
                <h3>ช่าง<?php echo $row->B_Nickname; ?></h3>
                <input id="barberBtn" class="inputAllBarber<?php echo $row->B_ID; ?> inputB" type="radio" name="B_ID" value="<?php echo $row->B_ID; ?>">
                <p class="btnAllBarber<?php echo $row->B_ID; ?> btnB">ดูโปรไฟล์</p>
            </li>
        <?php
        }
        ?>
    </ul>
</section>
<!-- The Modal save_Image -->
<div class="popupBarber">
    <div class="popup-content barbar-all">
        <div class="closeBarber">
            <i class="fas fa-times"></i>
        </div>
        <div class="profile-content slide" id="profiles">
            <section class="profile_area">
                <div class="container">
                    <div class="profile">
                        <div class="profile_image profile_image-barber">
                            <!-- img barber profile -->
                        </div>
                        <div class="profile_info">
                            <div class="profile_info--top profile_info--top-barber">
                                <h1>
                                    <!-- username barber profile -->
                                </h1>
                            </div>
                            <div class="profile_info--center profile_info--center-barber">
                                <!-- nickname and name and lastname barber profile -->
                            </div>
                            <div class="profile_info--bottom profile_info--bottom-barber">
                                <!-- sex barber profile -->
                                <!-- phone barber profile -->
                                <!-- facebook barber profile -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="tabs_area">
                <div class="container">
                    <div class="tabs">
                        <div class="tab-item active barber-portfolio">
                            <!-- portfolio barber profile -->
                        </div>
                    </div>
                    <div class="slides">
                        <!-- barber-booking -->
                        <div class="tabs_content" id="barber-portfolio">
                            <p>booking</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    // count element in html
    var cardBarber = document.getElementById("card-Barber");
    var btnBarber = cardBarber.getElementsByClassName("inputB");
    // var imgHairStyle = cardHairStyle.getElementsByClassName("imgH");
    // var inputHairStyle = cardHairStyle.getElementsByClassName("inputH");
    // console.log("barber" + " " + btnBarber.length);

    // loop query.selectorClassList
    for (let i = 1; i <= btnBarber.length; i++) {
        document.querySelector(".btnAllBarberB0000" + i).addEventListener("click", function() {
            document.querySelector(".popupBarber").style.display = "flex";
        })
        // close popup hairstyle
        document.querySelector(".closeBarber").addEventListener("click", function() {
            document.querySelector(".popupBarber").style.display = "none";
        })
        document.querySelector(".closeBarberQueue").addEventListener("click", function() {
            document.querySelector(".popupBarber").style.display = "none";
        })
        // console.log(btnB + i);
        // build variable document.querySelector input radio and btn class imgID
        const inputBID = document.querySelector(".inputAllBarberB0000" + i);
        const btnBarber = document.querySelector(".btnAllBarberB0000" + i);
        // console.log(inputBID);
        // console.log(btnBarber);

        // when click btn read more = click input radio
        btnBarber.onclick = () => {
            inputBID.click();
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('input[id="barberBtn"]').change(function() {
            var B_ID = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Customer_Con/popupBarber",
                method: "POST",
                dataType: 'json',
                data: {
                    B_ID: B_ID
                },

                success: function(response) {
                    $('.profile_image-barber').find('img').remove();
                    $('.profile_info--top-barber').find('.username-barber').remove();
                    $('.profile_info--center-barber').find('p').remove();
                    $('.profile_info--bottom-barber').find('.barber-sex').remove();
                    $('.profile_info--bottom-barber').find('.barber-phone').remove();
                    $('.profile_info--bottom-barber').find('.barber-address').remove();
                    $('.tabs_area .barber-portfolio').find('.portfolio').remove();
                    $.each(response, function(index, data) {
                        $('.profile_image-barber').append('<img src="<?php echo base_url(); ?>img/' + data['B_Img'] + '">');
                        $('.profile_info--top-barber h1').append('<span class="username-barber">' + data['Username'] + '</span>');
                        $('.profile_info--center-barber').append('<p><i class="las la-signature"></i> <span>:</span> <span class="data">' + data['B_Nickname'] + ' <span>|</span> ' + data['B_Name'] + ' ' + data['B_Lname'] + '</span></p>');
                        $('.profile_info--bottom-barber').append('<p class="barber-sex"><i class="las la-transgender"></i> <span>:</span> <span class="data">' + data['B_Sex'] + '</span></p>');
                        $('.profile_info--bottom-barber').append('<p class="barber-phone"><i class="las la-phone-volume"></i> <span>:</span> <span class="data">' + data['B_Phone'] + '</span></p>');
                        $('.profile_info--bottom-barber').append('<p class="barber-address"><i class="las la-map-marked-alt"></i> <span>:</span> <span class="data">' + data['B_Address'] + ' ต.' + data['B_Sub_district'] + ' อ.' + data['B_District'] + ' จ.' + data['B_Province'] + '  รหัสไปรษณีย์ : ' + data['B_Postal_Code'] + '</span></p>');
                        $('.tabs_area .barber-portfolio').append('<a href="#barber-portfolio" class="portfolio"><i class="las la-bookmark"></i><span> ผลงานของช่าง' + data['B_Nickname'] + '</span></a>');
                    });

                }
            });
        });
    });
</script>