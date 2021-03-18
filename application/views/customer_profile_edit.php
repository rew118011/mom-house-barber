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

            <?php echo form_open('Customer_Con/save_profile');
            echo form_hidden('C_ID', set_value('C_ID', $row->C_ID));
            echo form_label('ชื่อเล่น :', 'C_Nickname') . br(2);
            echo form_label('ชื่อจริง :', 'C_Name') . br(2);
            echo form_label('นามสกุล :', 'C_Lname') . br(2);
            echo form_label('เพศ :', 'C_Sex') . br(2);
            echo form_label('เบอร์โทร :', 'C_Phone') . br(2);
            echo form_label('Facebook :', 'C_Facebook') . br(2);
            ?>
            <a class="back" href="http://localhost/Mom_House_Barber/index.php/Customer_Con/show_profile">Back</a>
          </div>
         </div>

          <div class="edit_profile_infos">
          <?php echo form_hidden('C_ID', set_value('C_ID', $row->C_ID));
          echo form_input('C_Nickname', set_value('C_Nickname', $row->C_Nickname), 'class="form_label"') . br(2);
          echo form_input('C_Name', set_value('C_Name', $row->C_Name), 'class="form_label"') . br(2);
          echo form_input('C_Lname', set_value('C_Lname', $row->C_Lname), 'class="form_label"') . br(2);
          echo form_input('C_Sex', set_value('C_Sex', $row->C_Sex), 'class="form_label"') . br(2);
          echo form_input('C_Phone', set_value('C_Phone', $row->C_Phone), 'class="form_label"') . br(2);
          echo form_input('C_Facebook', set_value('C_Facebook', $row->C_Facebook), 'class="form_label"') . br(2);
          echo form_submit('btnSave', 'Save', 'class="save"');
          echo form_close();
         }
          ?>
          </div>
      </div>
    </div>