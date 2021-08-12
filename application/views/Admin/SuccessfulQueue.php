<main>
    <div class="cards">
        <div class="card-single">
            <div>
                <p><?php echo $TOTALOFDAY; ?> <strong>คิว</strong></p>
                <span>ชำระเงินในวั้นนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-check"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $TOTALOFMONTH; ?> <strong>คิว</strong></p>
                <span>ชำระเงินในเดือนนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-check"></i>
                </span>
            </div>
        </div>
        
        <div class="card-single">
            <div>
                <p><?php echo $TOTALOFYEAR; ?> <strong>คิว</strong></p>
                <span>ชำระเงินในปีนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-check"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $TOTAL; ?> <strong>คิว</strong></p>
                <span>ชำระเงินทั้งหมด</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-check"></i>
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
                                        <td class="td-barber-queue img">
                                            <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" />
                                        </td>
                                        <td class="td-barber-queue"><a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>"><?php echo $row->C_Nickname; ?></a></td>
                                        <td class="td-barber-queue"><?php echo $row->C_Name; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->C_Lname; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                                        <td class="td-barber-queue booking-with"><a href="<?php echo site_url('Admin_Con/getBarberProfile/' . $row->B_ID); ?>">ช่างช่าง<?php echo $row->B_Nickname ;?></a></td>
                                        <td class="td-barber-queue status_all_orders"><?php echo $row->Q_Status; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->Price?> ฿</td>
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