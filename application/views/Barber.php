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
                <input id="barberBtn" class="input<?php echo $row->B_ID; ?> inputB" type="radio" name="B_ID" value="<?php echo $row->B_ID; ?>">
                <p class="btn<?php echo $row->B_ID; ?> btnB">ดูโปรไฟล์</p>
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
        <div class="profile-content " id="profiles">
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