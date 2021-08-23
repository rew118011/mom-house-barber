<div class="tabs_content booking" id="booking">
    <table class="barber-queue">
        <thead>
            <tr class="tr-barber-queue">
                <td class="th-barber-queue">รูป</td>
                <td class="th-barber-queue">ชื่อเล่น</td>
                <td class="th-barber-queue">วันที่</td>
                <td class="th-barber-queue">เวลา</td>
                <td class="th-barber-queue">สถานะ</td>
            </tr>
        </thead>
        <?php
        foreach ($BOOKING as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
        ?>
            <tbody>
                <tr id="<?php echo $row->BK_ID; ?>" class="tr-barber-queue">
                    <td class="ownerImage">
                        <img src="<?php echo base_url(); ?>img/<?php echo $row->C_Img; ?>" />
                    </td>
                    <td class="td-barber-queue booking-with">
                        <a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>">คุณ<?php echo $row->C_Nickname; ?></a>
                    </td>
                    <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                    <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                    <td value="<?php echo $row->Q_ID; ?>" class="td-barber-queue status"><i class="far fa-clock"></i> <?php echo $row->Q_Status; ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
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