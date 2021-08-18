<?php
foreach ($BARBERINCOME as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
?>
  <div class="barber-profile">
    <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>" class="menu-btn">
      <div>
        <p><?php echo $row->B_Nickname; ?></p>
        <span><?php echo $row->B_Total; ?> ฿</span>
      </div>
      <div class="image-card">
        <span>
          <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
        </span>
      </div>
    </a>
  </div>
<?php
}
?>