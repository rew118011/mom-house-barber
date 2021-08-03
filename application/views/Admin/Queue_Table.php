<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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

        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3>ตารางคิวที่รอตัด</h3>
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
                                        <td class="th-barber-queue">จองกับ</td>
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
                                            <td class="td-barber-queue"><img class="img-barber-queue" src="<?php echo base_url(); ?>img/me.jpg" alt="" /></td>
                                            <td class="td-barber-queue customer-name"><a href="#"><?php echo $row->C_Nickname; ?></a></td>
                                            <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                                            <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                                            <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                                            <td class="td-barber-queue booking-with"><a href="#"><?php echo $row->B_Nickname; ?></a></td>
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
                        <a href="<?php echo site_url('Admin_Con/getSuccessfulQueue'); ?>">
                            <button>
                                รายการทั้งหมด <span class="las la-arrow-right"></span>
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($BOOKING_SUCCESS as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
                        ?>
                            <div class="customer">
                                <div class="info">
                                    <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?php echo $row->C_Img; ?>" alt="" />
                                    <div>
                                        <h4><?php echo $row->C_Nickname; ?></h4>
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
