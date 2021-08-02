<?php
/*
foreach ($BARBER as $row) {
?>

<?php echo form_open('UserManagement_Con/save_barber');
    echo form_hidden('B_ID', set_value('B_ID', $row->B_ID));

    echo form_label('ชื่อ', 'B_Name') . br(1);
    echo form_input('B_Name', set_value('B_Lname', $row->B_Name)) . br(1);

    echo form_label('นามสกุล', 'B_Lname') . br(1);
    echo form_input('B_Lname', set_value('B_Lname', $row->B_Lname)) . br(1);

    echo form_label('เพศ', 'B_Sex') . br(1);
    echo form_input('B_Sex', set_value('B_Lname', $row->B_Sex)) . br(1);

    echo form_label('เบอร์โทร', 'B_Phone') . br(1);
    echo form_input('B_Phone', set_value('B_Phone', $row->B_Phone)) . br(1);

    echo form_label('ที่อยู่', 'B_Address') . br(1);
    echo form_input('B_Address', set_value('B_Address', $row->B_Address)) . br(1);

    echo form_submit('btnSave', 'บันทึก');
    echo form_close();
}
*/
?>


<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>

            Menu
        </h2>

        <div class="search-wrapper">
            <span class="las la-search"></span>
            <input type="search" placeholder="Search here" />
        </div>

        <div class="user-wrapper">
            <img src="<?php echo base_url(); ?>/img/zbew.jpg" alt="">
            <div>
                <h4><?php echo $this->session->userdata('Username'); ?></h4>
                <small>ADMIN</small>
            </div>
        </div>
    </header>

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
                                    </div>
                                    <div class="profile_info--center">
                                        <p><?php echo $ID->B_Nickname; ?> <span>&nbsp;|&nbsp;</span> <?php echo $ID->B_Name; ?> &nbsp; <?php echo $ID->B_Lname; ?></p><br>
                                    </div>
                                    <div class="profile_info--bottom">
                                        <p>
                                            เพศ : <?php echo $ID->B_Sex; ?> <br>
                                              เบอร์โทร : <?php echo $ID->B_Phone; ?> <br>
                                            ที่อยู่ : <?php echo $ID->B_Address; ?>
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
                                        <div>
                                            <p>292 <strong>คน</strong></p>
                                            <span>ลูกค้าทั้งหมด</span>
                                        </div>
                                    </div>

                                    <div class="card-single">
                                        <div>
                                            <p>256 <strong>คน</strong></p>
                                            <span>ลูกค้าเพศชาย</span>
                                        </div>
                                    </div>

                                    <div class="card-single">
                                        <div>
                                            <p>36 <strong>คน</strong></p>
                                            <span>ลูกค้าเพศหญิง</span>
                                        </div>
                                    </div>

                                    <div class="card-single">
                                        <div>
                                            <p>?????? <strong>?</strong></p>
                                            <span>????????????</span>
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
                                    <span></span>
                                </div>
                                <div class="tab-item">
                                    <span></span>
                                </div>
                                <div class="tab-item">
                                    <span></span>
                                </div>
                                <div class="tab-item">
                                    </i> <span></span>
                                </div>
                            </div>