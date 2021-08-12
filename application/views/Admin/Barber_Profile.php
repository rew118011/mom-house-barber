<main>
    <div class="recent-grid create-barber">
        <div class="projects">
            <div class="card barberProfile">
                <section class="profile_area">
                    <div class="container">
                        <div class="profile">
                            <div class="profile_image">
                                <img src="<?php echo base_url(); ?>img/<?= $ID->B_Img; ?>" alt="" />
                            </div>
                            <div class="profile_info">
                                <div class="profile_info--top">
                                    <h1><?php echo $ID->Username; ?></h1>
                                    <div class="profile-edit">
                                        <a href="<?php echo site_url('UserManagement_Con/setBarber/'  . $ID->B_ID); ?>"> แก้ไขโปรไฟล์ <i class="fas fa-cog"></i> </a>
                                    </div>
                                </div>
                                <div class="profile_info--center">
                                    <p><?php echo $ID->B_Nickname; ?> <span>&nbsp;|&nbsp;</span> <?php echo $ID->B_Name; ?> &nbsp; <?php echo $ID->B_Lname; ?></p><br>
                                </div>
                                <div class="profile_info--bottom">
                                    <p>
                                        <i class="las la-transgender"></i> : <?php echo $ID->B_Sex; ?> <br>
                                        <i class="las la-phone-volume"></i> : <?php echo $ID->B_Phone; ?> <br>
                                        <i class="las la-map-marked-alt"></i> : <?php echo $ID->B_Address; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="skill">
                            <p>ความชำนาญในแต่ละด้าน</p>
                            <div class="skillBox">
                                <p><?php echo $ID->B_Skill1; ?></p>
                                <p><?php echo $ID->B_Skill_Score1; ?>%</p>
                                <div class="skill">
                                    <div class="skill_level" style="width: <?php echo $ID->B_Skill_Score1; ?>%;"></div>
                                </div>
                            </div>
                            <div class="skillBox">
                                <p><?php echo $ID->B_Skill2; ?></p>
                                <p><?php echo $ID->B_Skill_Score2; ?>%</p>
                                <div class="skill">
                                    <div class="skill_level" style="width: <?php echo $ID->B_Skill_Score2; ?>%;"></div>
                                </div>
                            </div>
                            <div class="skillBox">
                                <p><?php echo $ID->B_Skill3; ?></p>
                                <p><?php echo $ID->B_Skill_Score3; ?>%</p>
                                <div class="skill">
                                    <div class="skill_level" style="width: <?php echo $ID->B_Skill_Score3; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="saraly">
                            <div class="cards">

                                <div class="card-single">
                                    <div class="skill-album">
                                        <ul>
                                            <li>
                                                <div class="item">
                                                    <span><?= $ID->B_Percent; ?>%</span>
                                                </div>
                                                <span>เปอร์เซ็นต์ที่รับ</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-single">
                                    <div class="skill-album">
                                        <ul>
                                            <li>
                                                <div class="item">
                                                    <span><?= $ID->B_Salary; ?>฿</span>
                                                </div>
                                                <span>เงินเดือนหลัก</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="card-single">
                                    <div class="skill-album">
                                        <ul>
                                            <li>
                                                <div class="item">
                                                    <span><?php echo $MONTH; ?>คิว</span>
                                                </div>
                                                <span>ตัดแล้วเดือนนี้</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-single">
                                    <div class="skill-album">
                                        <ul>
                                            <li>
                                                <div class="item">
                                                    <span><?php
                                                            foreach ($INCOME as $row) {
                                                                echo $row->B_Total;
                                                            }
                                                            ?>฿</span>
                                                </div>
                                                <span>รายได้เดือนนี้</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <section class="tabs_area">
                    <div class="container">
                        <div class="tabs">
                            <div class="tab-item active">
                                <a href="#booking" class="booking">
                                    <i class="las la-bookmark"></i>
                                    <span> คิวของช่าง<?php echo $ID->B_Nickname; ?></span>
                                </a>
                            </div>
                            <div class="tab-item">
                                <a href="#history" class="history">
                                    <i class="las la-border-all"></i>
                                    <span> ประวัติการตัดของช่าง<?php echo $ID->B_Nickname; ?></span>
                                </a>
                            </div>
                            <div class="tab-item">
                                <a href="#portfolio" class="booking">
                                    <i class="las la-border-all"></i>
                                    <span> ผลงานของช่าง<?php echo $ID->B_Nickname; ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="slides">