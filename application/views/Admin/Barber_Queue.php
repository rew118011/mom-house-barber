<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main>
    <div class="cards">
        <div class="card-single">
            <div>
                <p><?php echo $SALL; ?> <strong>คิว</strong></p>
                <span>คิวที่ตัดไปแล้ว</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-check"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $QALL; ?> <strong>คิว</strong></p>
                <span>คิวที่ยังไม่ได้ตัด</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-times"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $QDAY; ?> <strong>คิว</strong></p>
                <span>คิวทั้งหมดในวันนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-calendar-alt"></i>
                </span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <p><?php echo $SDAY; ?> <strong>คิว</strong></p>
                <span>ตัดไปแล้วในวันนี้</span>
            </div>
            <div>
                <span>
                    <i class="las la-user-check"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header barber-queue">
                    <div class="title">
                        <h3>ตารางคิวที่รอตัดในวันนี้กับ
                            <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $ID->B_ID; ?>">
                                ช่าง<?php echo $ID->B_Nickname; ?></a>
                        </h3>
                        <div class="img-barber-profile-small">
                            <img src="<?php echo base_url(); ?>img/<?php echo $ID->B_Img; ?>" alt="BarberProfile">
                        </div>
                    </div>
                    <div>
                        <a href="<?php echo site_url('Admin_Con/getBarberAllQueue/') . $ID->B_ID; ?>">
                            <button>ตารางคิวทั้งหมด <span class="las la-arrow-right"></span></button>
                        </a>
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
                                    <td class="th-barber-queue">เบอร์โทร</td>
                                    <td class="th-barber-queue">วันที่</td>
                                    <td class="th-barber-queue">เวลา</td>
                                    <td class="th-barber-queue">ตัดให้กับ</td>
                                    <td class="th-barber-queue">สถานะ</td>
                                    <td class="th-barber-queue">ชำระเงินแล้ว</td>
                                    <td class="th-barber-queue">ยกเลิก</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php
                            foreach ($BOOKING as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
                            ?>
                                <tbody>
                                    <tr id="<?php echo $row->BK_ID; ?>" class="tr-barber-queue">
                                        <td></td>
                                        <td class="td-barber-queue img"><img class="img-barber-queue" src="<?php echo base_url(); ?>img/me.jpg" alt="" /></td>
                                        <td class="td-barber-queue customer-name"><a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>"><?php echo $row->C_Nickname; ?></a></td>
                                        <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                                        <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                                        <td class="td-barber-queue booking-with">
                                            <a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>">คุณ<?php echo $row->B_Nickname; ?></a>
                                        </td>
                                        <td value="<?php echo $row->Q_ID; ?>" class="td-barber-queue status"><?php echo $row->Q_Status; ?></td>
                                        <td class="td-barber-queue">
                                            <button id="btnPay" name="BK_ID" class="queue-complete" value="<?php echo $row->BK_ID; ?>"><i class="fas fa-check-square"></i></button>
                                        </td>
                                        <td class="td-barber-queue">
                                            <a class="queue-cancel" href="#"><i class="fas fa-window-close"></i></a>
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

        <div class="customers">
            <div class="card">
                <div class="card-header">
                    <h3>ชำระเงินแล้ว / วันนี้</h3>
                    <a href="<?php echo site_url('Admin_Con/getBarberIncome/' . $ID->B_ID); ?>">
                        <button>
                            รายการทั้งหมด <span class="las la-arrow-right"></span>
                        </button>
                    </a>
                </div>
                <div class="card-body success-queue">
                    <?php
                    foreach ($BH as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
                    ?>
                        <div class="customer">
                            <div class="info">
                                <div class="image-customer">
                                    <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?php echo $row->C_Img; ?>" alt="" />
                                </div>
                                <div>
                                    <h4>
                                        <a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>">คุณ<?php echo $row->C_Nickname; ?></a>
                                    </h4>
                                    <small><?php echo $row->C_Phone; ?></small>
                                </div>
                            </div>
                            <div class="contact">
                                <small>
                                    <?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?>
                                </small>
                                <br>
                                <small>
                                    <?php echo $row->ST_Time; ?>
                                </small>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
</div>


<script>
    $(document).ready(function() {
        $('#btnPay').click(function() {
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
                    location.reload();
                }
            });

        });
    });
</script>