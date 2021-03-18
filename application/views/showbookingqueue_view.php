<?php
foreach ($BOOKING as $row) {

?>
    <div class="c-my-booking-container">
        <h1>คิวของคุณ</h1>
        <p>หากต้องการเปลี่ยนวันเวลาหรือช่าง<br>กรุณายกเลิกคิวและกลับมาจองอีกครั้ง<br>ขอบคุณ.</p>

        <div class="my-booking-date">
            <p>
                วันที่ : <?php echo $row->BK_Day ?> /
                <?php echo $row->BK_Month; ?> /
                <?php echo $row->BK_Year; ?>
            </p>
            <p>เวลา : <?php echo $row->ST_Time; ?> </p>
            <?php echo anchor('Customer_Con/del_booking/' . $row->BK_ID, 'ยกเลิกคิวที่จอง', array('onclick' => "return confirm('คุณต้องการยกเลิกคิวที่จองใช่หรือไม่ ?')")); ?>
        </div>
    </div>
<?php
}
?>