<div class="all-braber">
    <div class="center-card">
        <?php
        foreach ($Barber as $row) {
        ?>


            <div class="card <?php echo $row->B_ID; ?>">
                <div class="additional">
                    <div class="user-card">

                        <img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>">
                        <br><br>
                        <div class="points center">
                            <a href="<?php echo site_url('Customer_Con/getBarberByCustomer/' . $row->B_ID); ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                        </div>
                    </div>

                    <div class="skill">
                        <p>ความชำนาญในแต่ละด้าน</p>
                        <div class="skillBox">
                            <p><?php echo $row->B_Skill1; ?></p>
                            <p><?php echo $row->B_Skill_Score1; ?>%</p>
                            <div class="skill">
                                <div class="skill_level" style="width: <?php echo $row->B_Skill_Score1; ?>%;"></div>
                            </div>
                        </div>
                        <div class="skillBox">
                            <p><?php echo $row->B_Skill2; ?></p>
                            <p><?php echo $row->B_Skill_Score2; ?>%</p>
                            <div class="skill">
                                <div class="skill_level" style="width: <?php echo $row->B_Skill_Score2; ?>%;"></div>
                            </div>
                        </div>
                        <div class="skillBox">
                            <p><?php echo $row->B_Skill3; ?></p>
                            <p><?php echo $row->B_Skill_Score3; ?>%</p>
                            <div class="skill">
                                <div class="skill_level" style="width: <?php echo $row->B_Skill_Score3; ?>%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="general">
                    <h1>ช่าง <?php echo $row->B_Nickname; ?></h1>
                    <div class="coords">
                        <span>ชื่อ: <?php echo $row->B_Name; ?> <?php echo $row->B_Lname; ?></span><br>
                        <span>เพศ: <?php echo $row->B_Sex; ?></span>
                    </div>
                    <div class="coords">
                        <span>ติดต่อ: <?php echo $row->B_Phone; ?></span>
                    </div>
                    <span class="more">Mom House Braber</span>
                </div>

            </div>

        <?php
        }
        ?>
    </div>
</div>