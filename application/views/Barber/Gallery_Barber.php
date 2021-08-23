<div class="tabs_content portfolio" id="portfolio">
    <div class="gallery_grid">
        <!--   #posts start -->
       
        <div class="postss">
            <!-- .post start -->
            <?php
            foreach ($FO as $row) {
            ?>
                <div class="post">
                    <div class="image-item">
                    <img src="<?php echo base_url(); ?>img/<?= $row->PFLO_Img; ?>" class="post-image" alt="" />
                    </div>
                    <div class="owner">
                        <div class="ownerImage">
                        <img src="https://api.adorable.io/avatars/30/f" alt="">
                        </div>
                        <p href="" class="name">_nazifcan <span> <?php echo $row->Detail; ?></span></p>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- .post finish -->
            <!-- .post start -->
            <div class="post">
                <div class="image-item">
                    <img src="https://cdn.dribbble.com/users/63407/screenshots/7456840/media/d03ec38ac6cd166dc54811a69189e3ed.png" class="post-image" alt="">
                </div>
                <div class="owner">
                    <div class="ownerImage">
                        <img src="https://api.adorable.io/avatars/30/f" alt="">
                    </div>
                    <p href="" class="name">_nazifcan <span> I don't know who you are</span></p>
                </div>
            </div>
            <!-- .post finish -->
            <!-- .post start -->
            <div class="post">
                <div class="image-item">
                    <img src="https://cdn.dribbble.com/users/664063/screenshots/8682970/media/625ff9442c6d4e84dd214f10820197a0.gif" class="post-image" alt="">
                </div>
                <div class="owner">
                    <div class="ownerImage">
                        <img src="https://api.adorable.io/avatars/30/d" alt="">
                    </div>
                    <p href="" class="name">_nazifcan <span> I don't know who you are</span></p>
                </div>
            </div>
            <!-- .post finish -->
            <!-- .post start -->
            <div class="post">
                <div class="image-item">
                    <img src="https://cdn.dribbble.com/users/63407/screenshots/7898120/media/60e79e45abbf5088fdc617ee3bd2ba3e.png" class="post-image" alt="">
                </div>
                <div class="owner">
                    <div class="ownerImage">
                        <img src="https://api.adorable.io/avatars/30/e" alt="">
                    </div>
                    <p href="" class="name">_nazifcan <span> I don't know who you are</span></p>
                </div>
            </div>
            <!-- .post finish -->
        </div>
        <!--   #posts finish -->
    </div>
</div>
</div>