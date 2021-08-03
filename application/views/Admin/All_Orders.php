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
        <div class="cards">
            <div class="card-single">
                <div>
                    <p>1278 <strong>คิว</strong></p>
                    <span>ชำระเงินแล้วทั้งหมด</span>
                </div>
                <div>
                    <span>
                        <i class="las la-users"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>198 <strong>คิว</strong></p>
                    <span>ชำระเงินแล้วเดือนนี้</span>
                </div>
                <div>
                    <span>
                        <i class="las la-user-check"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>29700 <strong>฿</strong></p>
                    <span>รายได้เดือนนี้</span>
                </div>
                <div>
                    <span>
                        <i class="las la-money-bill-wave-alt"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>191700 <strong>฿</strong></p>
                    <span>รายได้ทั้งหมด</span>
                </div>
                <div>
                    <span>
                        <i class="las la-coins"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="recent-grid barber-income">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3>รายการที่ชำระเงินแล้วทั้งหมด</h3>
                        <div class="search-wrapper">
                            <span class="las la-search"></span>
                            <input type="search" placeholder="ค้นหาที่นี่" />
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="barber-queue">
                                <thead>
                                    <tr class="tr-barber-queue">
                                        <td></td>
                                        <td class="th-barber-queue">รูป</td>
                                        <td class="th-barber-queue">ชื่อเล่น</td>
                                        <td class="th-barber-queue">ชื่อจริง</td>
                                        <td class="th-barber-queue">นามสกุล</td>
                                        <td class="th-barber-queue">เบอร์</td>
                                        <td class="th-barber-queue">วันที่</td>
                                        <td class="th-barber-queue">เวลา</td>
                                        <td class="th-barber-queue">ตัดกับ</td>
                                        <td class="th-barber-queue">สถานะ</td>
                                        <td class="th-barber-queue">ราคา</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($BOOK_HISTRORY as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
                                ?>
                                    <tbody>
                                        <tr class="tr-barber-queue">
                                            <td></td>
                                            <td class="td-barber-queue">
                                                <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" />
                                            </td>
                                            <td class="td-barber-queue"><a href="#"><?php echo $row->C_Nickname; ?></a></td>
                                            <td class="td-barber-queue"><?php echo $row->C_Name; ?></td>
                                            <td class="td-barber-queue"><?php echo $row->C_Lname; ?></td>
                                            <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                                            <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                                            <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                                            <td class="td-barber-queue booking-with"><a href="<?php echo site_url('Admin_Con/admin_see_barber_profile/' . $row->B_ID); ?>">ช่างเอิร์ธ</a></td>
                                            <td class="td-barber-queue status_all_orders"><?php echo $row->Q_Status ; ?></td>
                                            <td class="td-barber-queue">150 ฿</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
</main>
</div>

<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active"
        }
    }
</script>