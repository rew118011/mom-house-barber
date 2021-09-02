<div class="tabs_content booking" id="booking">
    <table class="barber-queue table-sortable" id="employee_table">
        <thead>
            <tr class="tr-barber-queue">
                <td class="th-barber-queue">วันที่</td>
                <td class="th-barber-queue">เวลา</td>
                <td class="th-barber-queue">จองกับ</td>
                <td class="th-barber-queue">สถานะ</td>
                <td class="th-barber-queue">ชำระเงินแล้ว</td>
                <td class="th-barber-queue">ยกเลิก</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($BOOKING as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
            ?>
                <tr id="<?php echo $row->BK_ID; ?>" class="tr-barber-queue trbody">
                    <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> /
                        <?php echo $row->BK_Year; ?></td>
                    <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                    <td class="td-barber-queue booking-with">
                        <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                    </td>
                    <td value="1" class="td-barber-queue status">กำลังรอ...</td>
                    <td class="td-barber-queue">
                        <button id="btnPay" data-id="<?php echo $row->BK_ID; ?>" name="BK_ID" class="queue-complete" value="<?php echo $row->BK_ID; ?>"><i class="fas fa-check-square"></i></button>
                    </td>
                    <td class="td-barber-queue">
                        <a id="btnCancel" data-id="<?php echo $row->BK_ID; ?>" class="queue-cancel" value="<?php echo $row->BK_ID; ?>">
                            <i class="fas fa-window-close"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
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