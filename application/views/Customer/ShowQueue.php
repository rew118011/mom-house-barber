<!-- My Booking -->
<section id="my-booking" class="main special">
    <header class="major">
        <div class="title">
            <div class="wrapper-txt calendar-txt">
                <ul class="dynamic-txts">
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                    <li><span>คิวตัดผมที่คุณจอง</span></li>
                </ul>
            </div>
            <div class="description">
                <p>
                    คิวที่คุณจองทั้งหมด หากคุณต้องการเปลี่ยนคิว กรุณากด "ยกเลิกคิว" แล้วกลับไปจองคิวใหม่ค่ะ
                </p>
            </div>
        </div>
    </header>
    <div class="container yourQueue">
        <?php
        foreach ($BOOKING as $row) {
        ?>
            <section class="queue">
                <div class="barber__photo">
                    <div class="photo-container">
                        <div class="photo-main">
                            <div class="controls">
                                <a href="<?php echo site_url('Customer_Con/getBarberByCustomer/' . $row->B_ID); ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                            </div>
                            <div class="image-barber">
                                <img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="Barber.BID">
                            </div>
                        </div>
                        <div class="skill-album">
                            <ul>
                                <li>
                                    <div class="progress-circle progress-<?= $row->B_Skill_Score1; ?>"><span><?= $row->B_Skill_Score1; ?></span></div><span>ตัดซอย</span>
                                </li>
                                <li>
                                    <div class="progress-circle progress-<?= $row->B_Skill_Score2; ?>"><span><?= $row->B_Skill_Score2; ?></span></div><span>ตัดมือ</span>
                                </li>
                                <li>
                                    <div class="progress-circle progress-<?= $row->B_Skill_Score3; ?>"><span><?= $row->B_Skill_Score3; ?></span></div><span>แต่งลาย</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="queue__info">
                    <div class="titleQ">
                        <p>คิวของคุณ</p>
                    </div>
                    <div class="price">
                        <p><span>150 </span> ฿</p>
                    </div>
                    <div class="date-time">
                        <p>วันเวลาที่คุณเลือก</p>
                        <p><i class="far fa-clock"></i> <?php echo $row->ST_Time; ?> <span>น.</span></p>
                        <p><?php echo $row->BK_Day ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></p>
                    </div>
                    <div class="description">
                        <p>เปลี่ยนคิว</p>
                        <ul>
                            <li>หากต้องการเปลี่ยนวันเวลาหรือช่าง</li>
                            <li>กรุณายกเลิกคิวและกลับมาจองอีกครั้ง</li>
                            <li>ขอบคุณ.</li>
                        </ul>
                    </div>
                    <a class="cancel--btn" href="<?php echo site_url('Booking_Con/del_booking/' . $row->BK_ID); ?>" onclick="return confirm('คุณต้องการยกเลิกคิวที่จองใช่หรือไม่ ?');">ยกเลิกคิวที่จอง</a>
                </div>
            </section>
        <?php
        }
        ?>
    </div>
</section>