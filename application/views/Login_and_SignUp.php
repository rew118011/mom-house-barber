<div class="popup popupLoging" style="display: flex;">
  <div class="popup-content">
    <div class="close closeLoging">
      <i class="fas fa-times"></i>
    </div>
    <div class="popup-left">
      <img class="popup-left-logo" src="<?php echo base_url(); ?>/img/Logo.png">
      <h1>Mom_House_Barber</h1>
    </div>
    <div class="wrapper">
      <div class="in-wrapper">
        <div class="title-text">
          <div class="title login">เข้าสู่ระบบ</div>
          <div class="title signup">ลงทะเบียน</div>
        </div>
        <div class="form-container">
          <div class="slide-controls">
            <input class="radio-slide" type="radio" name="slide" id="login" checked>
            <input class="radio-slide" type="radio" name="slide" id="signup">
            <label for="login" class="slide login" id="label-login">เข้าสู่ระบบ</label>
            <label for="signup" class="slide signup" id="label-signup">ลงทะเบียน</label>
            <div class="slider-tab"></div>
          </div>
          <?php
          if ($this->session->flashdata('msg_error')) {
            echo '<p style="font-size: 16px; color: #ff3f40; font-family: "Prompt", sans-serif;">';
            echo $this->session->flashdata('msg_error');
            echo '</p>';
          }
          ?>
          <div class="form-inner">
            <form action="<?php echo site_url('Login_Con/check_login'); ?>" class="login" method="post">
              <div class="field">
                <input type="text" name="Username" placeholder="ชื่อผู้ใช้" require>
              </div>
              <div class="field">
                <input type="password" name="Password" placeholder="รหัสผ่าน" require>
              </div>
              <div class="pass-link"><a href="#">
                  <!-- Forgot password? -->
                </a></div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="btnLogin" value="เข้าสู่ระบบ">
              </div>
              <div class="signup-link">ยังไม่ได้ลงทะเบียน? <a href="">ลงทะเบียน</a></div>
            </form>
            <form action="<?php echo site_url('Customer_Con/insert_regis'); ?>" class="signup" method="post">
              <div class="field">
                <input type="text" name="Username" placeholder="ชื่อผู้ใช้ (อย่างน้อย 6 ตัวอักษร)" maxlength="20" minlength="6" required>
              </div>
              <div class="field">
                <input type="password" name="Password" placeholder="รหัสผ่าน (อย่างน้อย 6 ตัวอักษร)" maxlength="20" minlength="6" required>
              </div>
              <div class="field C_Name Display-non">
                <input type="text" name="C_Name" value="ไม่มีข้อมูล" placeholder="ชื่อจริง" required>
              </div>
              <div class="field C_Lname Display-non">
                <input type="text" name="C_Lname" value="ไม่มีข้อมูล" placeholder="นามสกุล" required>
              </div>
              <div class="field C_Nickname">
                <input type="text" name="C_Nickname" placeholder="ชื่อเล่น (ไม่เกิน 20 ตัวอักษร)" maxlength="20" required>
              </div>
              <div class="raido-sex-button C_Sex Display-non">
                <div class="sex-radio-container">
                  <label class="input-sex" for="Sex">Sex :</label>
                  <input class="radio-sex" type="radio" name="C_Sex" value="ไม่มีข้อมูล" id="option-1" checked>
                  <input class="radio-sex" type="radio" name="C_Sex" value="ชาย" id="option-2">
                  <input class="radio-sex" type="radio" name="C_Sex" value="หญิง" id="option-3">
                  <input class="radio-sex" type="radio" name="C_Sex" value="ไม่ต้องการระบุ" id="option-4">
                  <label for="option-1" class="option option-1">
                    <div class="sex-dot"></div>
                    <span>No data</span>
                  </label>
                  <label for="option-2" class="option option-2">
                    <div class="sex-dot"></div>
                    <span>Male</span>
                  </label>
                  <label for="option-3" class="option option-3">
                    <div class="sex-dot"></div>
                    <span>Female</span>
                  </label>
                  <label for="option-4" class="option option-4">
                    <div class="sex-dot"></div>
                    <span>Don't want to specify</span>
                  </label>
                </div>
              </div>
              <div class="field C_Phone">
                <input type="tel" name="C_Phone" placeholder="เบอร์มือถือ (เช่น 0651459563)" maxlength="10" pattern="[0]{1}[0-9]{9}" required>
              </div>
              <div class="field C_Facebook Display-non">
                <input type="text" name="C_Facebook" value="ไม่มีข้อมูล" placeholder="Facebook" required>
              </div>
              <div class="field C_Img Display-non">
                <input type="text" name="C_Img" value="user.png" placeholder="CusImg" required>
              </div>
              <div class="field s_id Display-non">
                <input type="text" name="S_ID" value="3" required>
              </div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="btnRegister" value="ลงทะเบียน">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>