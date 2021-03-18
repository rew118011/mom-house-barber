<?php
foreach ($CUSTOMER as $row) {
?>

  <div class="profile_c_container">
    <div class="profile_c">
      <div class="profile_c_image">
        <img class="profile_c_image_img" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
      </div>
      <div class="profile_c_info">
        <div class="profile_c_info_top">
          <h1 class="profile_c_info_top-h1"><?php echo $row->Username . br(1); ?></h1>
          <?php echo anchor('Customer_Con/setProfile', 'แก้ไขข่อมูลส่วนตัว', 'class="profile_c_edit"') . br(1); ?>
        </div>
        <div class="profile_c_info_center">
          <div>
            <font size=3>ชื่อเล่น : </font><?php echo $row->C_Nickname . br(1); ?>
          </div>
          <div>
            <font size=3>ชื่อ-นามสกุล : </font><?php echo $row->C_Name . br(0); ?> <?php echo $row->C_Lname . br(1); ?>
          </div>
          <div>
            <font size=3>เพศ : </font><?php echo $row->C_Sex . br(1); ?>
          </div>
          <div>
            <font size=3>เบอร์โทร : </font><?php echo $row->C_Phone . br(1); ?>
          </div>
          <div>
            <font size=3>Facebook : </font><?php echo $row->C_Facebook . br(1); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>
<div class="profile_c_container_bottom">
  <div class="profile_c_tabs">
    <div class="profile_c_icon active"><i class="fas fa-bookmark sam"></i><strong class="profile_c_strong">การจองของฉัน</strong></div>
    <div class="profile_c_icon"><i class="fas fa-th sam"></i><strong class="profile_c_strong">ประวัติการจองของฉัน</strong></div>
  </div>
</div>