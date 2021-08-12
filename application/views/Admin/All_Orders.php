<main>
    <div class="cards">
        <div class="card-single">
            <div>
                <p><?php echo $TOTALOFDAY; ?> <strong>คิว</strong></p>
                <span>คิวในวั้นนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-users"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $TOTALOFMONTH; ?> <strong>คิว</strong></p>
                <span>คิวในเดือนนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-users"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $TOTALOFYEAR; ?> <strong>คิว</strong></p>
                <span>คิวในปีนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-users"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $TOTAL; ?> <strong>คิว</strong></p>
                <span>คิวทั้งหมด</span>
            </div>
            <div>
                <span>
                    <i class="las la-users"></i>
                </span>
            </div>
        </div>

    </div>

    <div class="recent-grid barber-income">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>รายการการจองทั้งหมด</h3>
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
                                    <td class="th-barber-queue">ชำระเงินแล้ว</td>
                                    <td class="th-barber-queue">ยกเลิก</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php
                            foreach ($BOOKING as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
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
                                        <td class="td-barber-queue booking-with"><a href="<?php echo site_url('Admin_Con/getBarberProfile/' . $row->B_ID); ?>">ช่าง<?php echo $row->B_Nickname ;?></a></td>
                                        <td class="td-barber-queue status"><?php echo $row->Q_Status; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->Price?> ฿</td>
                                        <td class="td-barber-queue">
                                            <button id="btnPay" data-id="<?php echo $row->BK_ID; ?>" name="BK_ID" class="queue-complete" value="<?php echo $row->BK_ID; ?>"><i class="fas fa-check-square"></i></button>
                                        </td>
                                        <td class="td-barber-queue">
                                            <a id="btnCancel" data-id="<?php echo $row->BK_ID; ?>" class="queue-cancel" value="<?php echo $row->BK_ID; ?>">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        </td>
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
<script>
    $(document).ready(function() {
        $('button[data-id]').click(function(event) {
            var BK_ID = $(this).val();

            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Booking_Con/dynamically_KeepQueue",
                method: "POST",
                dataType: 'json',
                data: {
                    BK_ID: BK_ID,

                },
                success: function(response) {
                    $("#<?php echo $row->BK_ID; ?>").html(response);
                    $('#<?php echo $row->BK_ID; ?> tr').remove();
                    if (response == true) {
                        location.reload();
                    } else {
                        alert("Error");
                    }
                }
            });

        });
    });
</script>
<script>
    $(document).ready(function() {
        $('a[data-id]').click(function() {
            var BK_ID = $(this).attr("data-id")
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Booking_Con/dynamically_DeleteQueue",
                method: "POST",
                dataType: 'json',
                data: {
                    BK_ID: BK_ID,

                },
                success: function(response) {
                    $("#<?php echo $row->BK_ID; ?>").html(response);
                    $('#<?php echo $row->BK_ID; ?> tr').remove();
                    if (response == true) {
                        location.reload();
                    } else {
                        alert("Error");
                    }
                }
            });
        });
    });
</script>