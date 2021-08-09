<main>
    <div class="recent-grid customer-profile">
        <div class="projects">
            <div class="card barberProfile">
                <section class="profile_area">
                    <div class="container">
                        <div class="profile">
                            <div class="profile_image">
                                <img src="<?php echo base_url(); ?>img/<?= $ID->C_Img; ?>" alt="" />
                            </div>
                            <div class="profile_info">
                                <div class="profile_info--top">
                                    <h1><?php echo $ID->Username; ?></h1>
                                </div>
                                <div class="profile_info--center">
                                    <p><i class="las la-signature"></i> <?php echo $ID->C_Nickname; ?> <span>&nbsp;|&nbsp;</span> <?php echo $ID->C_Name; ?> &nbsp; <?php echo $ID->C_Lname; ?></p><br>
                                </div>
                                <div class="profile_info--bottom">
                                    <p>
                                        <i class="las la-transgender"></i> : <?php echo $ID->C_Sex; ?> <br>
                                        <i class="las la-phone-volume"></i> : <?php echo $ID->C_Phone; ?> <br>
                                        <i class="lab la-facebook"></i> : <?php echo $ID->C_Facebook; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tabs_area">
                    <div class="container">
                        <div class="tabs">
                            <div class="tab-item active">
                                <a href="#history" class="history">
                                    <i class="las la-border-all"></i>
                                    <span> ประวัติการเพิ่มคิวย้อนหลังของ<?php echo $ID->C_Nickname; ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="slides">