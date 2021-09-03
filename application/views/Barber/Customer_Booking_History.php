<div class="tabs_content history" id="history">
    <table class="barber-queue">
        <thead>
            <tr class="tr-barber-queue">
                <td class="th-barber-queue">วันที่</td>
                <td class="th-barber-queue">เวลา</td>
                <td class="th-barber-queue">จองกับ</td>
                <td class="th-barber-queue">สถานะ</td>
            </tr>
        </thead>
        <?php
        foreach ($CH as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
        ?>
            <tbody>
                <tr id="<?php echo $row->BK_ID; ?>" class="tr-barber-queue">
                    <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                    <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
                    <td class="td-barber-queue booking-with">
                        <a href="<?php echo site_url('Barber_Con/getBarberProfile/') . $row->B_ID; ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                    </td>
                    <td value="1" class="td-barber-queue status_all_orders">ชำระเงินแล้ว</td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
    </div>