<div class="tabs_content">
    <div id="tb_1" class="tabs_content--item">
        <div class="gallery_grid">
            <?php
            foreach ($HS->result_array() as $row) {
            ?>
                <div class="gallery-box">
                    <div class="item">
                        <div class="grid-img">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img1']; ?>" alt="H_Img1" />
                        </div>
                        <div class="grid-img">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img2']; ?>" alt="H_Img2" />
                        </div>
                        <div class="grid-img">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img3']; ?>" alt="H_Img3" />
                        </div>
                        <div class="grid-img">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img4']; ?>" alt="H_Img4" />
                        </div>
                    </div>
                    <div class="comment">
                        <p><?php echo $ID->Username; ?> : <span> <?= $row['H_Detail'] ?></span></p>
                        <!--
                        <div class="menu">
                            <a class="queue-edit" href="<?php echo site_url('UserManagement_Con/admin_editbarber/'); ?>"><i class="fas fa-pen-square"></i></a>
                            <a class="queue-cancel" href="<?php echo site_url('Hair_Con/del_hair_style/' . $row['H_ID']); ?>"><i class="fas fa-window-close"></i></a>
                        </div>
            -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>
</section>
</div>
</div>
</div>
</main>
</div>

