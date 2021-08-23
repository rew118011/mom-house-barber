<div class="add-photo all-story queue">
    <!--   #stories start -->
    <div class="teats">ชำระเงินแล้ว</div>
    <div class="stories">
        <!--     .story start -->
        <?php
        foreach ($BHC as $row) {
        ?>
            <div class="box-story">
                <div class="story">
                    <a href="<?php echo site_url('Barber_Con/getCustomerProfile/') . $row->C_ID; ?>">
                        <img src="<?php echo base_url(); ?>img/<?php echo $row->C_Img; ?>" />
                    </a>
                </div>
                <a href="<?php echo site_url('Barber_Con/getCustomerProfile/') . $row->C_ID; ?>">คุณ<?php echo $row->C_Nickname; ?></a>
            </div>
        <?php
        }
        ?>
        <!--     .story start -->
    </div>
    <!--   #stories finish -->

    <!--     .add photo start -->

    <div class="button">
        <div class="buttons">
            
        </div>
    </div>
    <!--     .add photo finish -->
</div>