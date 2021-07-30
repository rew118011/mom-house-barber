
  <?php
foreach ($CUSTOMER as $row) {
?>
  <div class="edit_profile_container">
    <div class="edit_profile">
      <div class="edit_profile__image">
        <img class="edit_profile_image_img" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
      </div>

      <div class="edit_profile_info">
        <div class="edit_profile_info_top">
          <h1 class="edit_profile_info_top-h1"><?php echo $row->Username . br(1); ?></h1>
        </div>

        <div class="edit_profile_info_center">
          <form action="save_profile" method="POST" enctype="multipart/form-data">
            <input style="display: none;" type="text" name="C_ID" value="<?php echo $row->C_ID; ?>" />
            <p name="C_Nickname">ชื่อเล่น</p><br>
            <p name="C_Name">ชื่อจริง</p><br>
            <p name="C_Lname">นามสกุล</p><br>
            <p name="C_Sex">เพศ</p><br>
            <p name="C_Phone">เบอร์โทร</p><br>
            <p name="C_Facebook">Facebook</p><br>
            <a class="back" href="http://localhost/Mom_House_Barber/index.php/Customer_Con/show_profile">Back</a>
        </div>
      </div>

      <div class="edit_profile_infos">
        <input style="display: none;" type="text" name="B_Sex" value="<?php echo $row->C_ID; ?>" /><br><br>
        <input type="text" name="C_Nickname" class="form_label" value="<?php echo $row->C_Nickname; ?>" /><br><br>
        <input type="text" name="C_Name" class="form_label" value="<?php echo $row->C_Name; ?>" /><br><br>
        <input type="text" name="C_Lname" class="form_label" value="<?php echo $row->C_Lname; ?>" /><br><br>
        <input type="text" name="C_Sex" class="form_label" value="<?php echo $row->C_Sex; ?>" /><br><br>
        <input type="text" name="C_Phone" class="form_label" value="<?php echo $row->C_Phone; ?>" /><br><br>
        <input type="text" name="C_Facebook" class="form_label" value="<?php echo $row->C_Facebook; ?>" /><br><br>
        <button type="submit" class="save">บันทึก</button>
      <?php
    }
      ?>
      </form>
      </div>
    </div>
  </div>