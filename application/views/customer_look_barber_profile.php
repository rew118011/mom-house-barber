<div class="B_container">
    <div class="B_profile">
        <div class="profile_B_image">
            <img class="B_profile_image_img" src="<?php echo base_url(); ?>img/<?= $ID->B_Img; ?>"> <br>
        </div>
        <div class="B_profile_info">
            <div class="B_profile_info_top">
                <h1 class="profile_c_info_top-h1">
                    <font size=3>ช่าง : </font>
                    <td><?php echo $ID->B_Nickname . br(0); ?></td>
                </h1>
            </div>
            <div class="B_profile_info_center">
                <div>
                    <font size=3>นาย </font><?php echo $ID->B_Name . br(0); ?> <?php echo $ID->B_Lname . br(1); ?>
                </div>
                <div>
                    <font size=3>เบอร์โทร : </font><?php echo $ID->B_Phone . br(1); ?>
                </div>
                <div>
                    <font size=3>ที่อยู่ : </font><?php echo $ID->B_Address . br(1); ?>
                </div>
                <div>
                    <font size=3>Skill : </font><?php echo $ID->B_Skill . br(1); ?>
                </div>
            </div>
        </div>
    </div>
</div>