<div class="c_profilebraber_container">
    <h1 class="c_profilebraber_h1">All Braber</h1>
    <div class="flexbox_">
        <?php
        foreach ($Barber as $row) {
        ?>
            <div class="item_">
                <div class="content_">

                    <div class="c_profilebraber_info_top">
                        <img class="c_profilebraber_image" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>">
                    </div>
                    <div class="c_profilebraber_info_center">
                        <div class="c_profilebraber_font">
                            <font size=4>นาย </font><?php echo $row->B_Name; ?> <?php echo $row->B_Lname; ?>
                            <font size=4>ช่าง : <?php echo $row->B_Nickname; ?> </font>
                        </div>
                        <div>
                            <font size=4>เบอร์โทร : </font><?php echo $row->B_Phone; ?>
                        </div>
                    </div>
                    <div class="c_profilebraber_info_bottom">
                        <?php echo anchor('Customer_Con/getBarberByCustomer/' . $row->B_ID, 'Profile', 'class="c_lookprofilebraber botton_p"'); ?>
                        <a class="c_profilebraber_a botton_p" href="http://localhost/Mom_House_Barber/index.php/Login_Con/customer_page">Booking</a>
                    </div>

                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>