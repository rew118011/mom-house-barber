<div class="tabs_content portfolio" id="portfolio">
    <div class="gallery_grid">
        <!--   #posts start -->

        <div class="postss">
            <!-- .post start -->
            <?php
            foreach ($PFO as $row) {
            ?>
                <div class="post">
                    <div class="image-item">
                        <img src="<?php echo base_url(); ?>img/<?= $row->PFLO_Img; ?>" class="post-image" alt="" />
                    </div>
                    <div class="owner">
                        <div class="ownerImage">
                            <img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="">
                        </div>
                        <p href="<?php echo site_url('Barber_Con/getBarberProfile/') . $row->B_ID; ?>" class="name"><?php echo $row->B_Nickname; ?><span> <?php echo $row->Detail; ?></span></p>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- .post finish -->

        </div>
    </div>
</div>