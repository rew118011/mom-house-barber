<!-- All Barber -->
<section id="barber-all" class="main special">
    <header class="major">
        <div class="title">
            <div class="wrapper-txt calendar-txt">
                <ul class="dynamic-txts">
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                    <li><span>ช่างฝีมือในร้านของเรา</span></li>
                </ul>
            </div>
            <div class="description">
                <p>
                    ในร้านของเรา มีช่างตัดผมฝีมือดีให้ท่านได้เลือกตัดมากมาย หากต้องการดูโปรไฟล์ของช่าง คลิก! ที่ชื่อช่างใต้รูปได้เลย
                </p>
            </div>
        </div>
    </header>
    <ul class="features">
        <?php
        foreach ($Barber as $row) {
        ?>
            <li>
                <div class="image-barber">
                    <span class="icon major"><img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="" /></span>
                </div>
                <h3>ช่าง<?php echo $row->B_Nickname; ?></h3>
                <p>
                    <a href="<?php echo site_url('Customer_Con/getBarberByCustomer/' . $row->B_ID); ?>">ดูโปรไฟล์</a>
                </p>
            </li>
        <?php
        }
        ?>
    </ul>
</section>