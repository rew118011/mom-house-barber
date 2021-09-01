<!-- My Booking -->
<section id="my-booking" class="main special">
    <header class="major">
        <div class="title">
            <div class="wrapper-txt calendar-txt">
                <ul class="dynamic-txts">
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                </ul>
            </div>
            <div class="description">
                <p>
                    คิวที่คุณจองทั้งหมด หากคุณต้องการเปลี่ยนคิว กรุณากด "ยกเลิกคิว" แล้วกลับไปจองคิวใหม่ค่ะ
                </p>
            </div>
        </div>
    </header>
    <div class="container yourQueue" id="YouQueue">
        <?php
        foreach ($BOOKING as $row) {
        ?>
            <section class="queue">
                <div class="barber__photo">
                    <div class="photo-container">
                        <div class="photo-main">
                            <div class="controls">
                                <input id="ProfileBarberBtn" class="YouQueueInput" type="radio" name="B_ID" value="<?php echo $row->B_ID; ?>">
                                <p class="YouQueueBtn">ช่าง<?php echo $row->B_Nickname; ?></p>
                            </div>
                            <div class="image-barber">
                                <img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="Barber.BID">
                            </div>
                        </div>
                        <div class="skill-album">
                            <ul>
                                <li>
                                    <div class="progress-circle progress-<?= $row->B_Skill_Score1; ?>"><span><?= $row->B_Skill_Score1; ?></span></div><span>ตัดซอย</span>
                                </li>
                                <li>
                                    <div class="progress-circle progress-<?= $row->B_Skill_Score2; ?>"><span><?= $row->B_Skill_Score2; ?></span></div><span>ตัดมือ</span>
                                </li>
                                <li>
                                    <div class="progress-circle progress-<?= $row->B_Skill_Score3; ?>"><span><?= $row->B_Skill_Score3; ?></span></div><span>แต่งลาย</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="queue__info">
                    <div class="titleQ">
                        <p>คิวของคุณ</p>
                    </div>
                    <div class="price">
                        <p><span><?php echo $row->Price; ?> </span> ฿</p>
                    </div>
                    <div class="date-time">
                        <p>วันเวลาที่คุณเลือก</p>
                        <p><i class="far fa-clock"></i> <?php echo $row->ST_Time; ?> <span>น.</span></p>
                        <p><?php echo $row->BK_Day ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></p>
                    </div>
                    <div class="description">
                        <p>เปลี่ยนคิว</p>
                        <ul>
                            <li>หากต้องการเปลี่ยนวันเวลาหรือช่าง</li>
                            <li>กรุณายกเลิกคิวและกลับมาจองอีกครั้ง</li>
                            <li>ขอบคุณ.</li>
                        </ul>
                    </div>
                    <a class="cancel--btn" href="<?php echo site_url('Booking_Con/del_booking/' . $row->BK_ID); ?>" onclick="return confirm('คุณต้องการยกเลิกคิวที่จองใช่หรือไม่ ?');">ยกเลิกคิวที่จอง</a>
                </div>
            </section>
        <?php
        }
        ?>
    </div>
</section>
<!-- The Modal save_Image -->
<div class="popupBarber popupBarberProfie">
    <div class="popup-content barbar-all">
        <div class="closeBarberQueue">
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
    var inputQueue = document.getElementsByClassName("YouQueueInput");
    var btnQueue = document.getElementsByClassName("YouQueueBtn");
    for (var i = 0; i < inputQueue.length; i++) {
        // console.log(inputQueue[i]);
        inputQueue[i].classList.add('inputQueue' + i)
        btnQueue[i].classList.add('btnQueue' + i)
        // console.log(btnQueue[i]);
        document.querySelector(".inputQueue" + i).addEventListener("click", function() {
            document.querySelector(".popupBarberProfie").style.display = "flex";
        })
        document.querySelector(".closeBarberQueue").addEventListener("click", function() {
            document.querySelector(".popupBarberProfie").style.display = "none";
        })

        const inputQueueI = document.querySelector(".inputQueue" + i);
        const btnQueueI = document.querySelector(".btnQueue" + i);
        btnQueueI.onclick = () => {
            inputQueueI.click();
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('input[id="ProfileBarberBtn"]').change(function() {
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