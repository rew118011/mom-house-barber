<?php
foreach ($CUSTOMER as $row) {
?>
  <div class="profile-content slide" id="profiles">
    <section class="profile_area">
      <div class="container">
        <div class="profile">
          <div class="profile_image">
            <img src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
          </div>
          <div class="profile_info">
            <div class="profile_info--top">
              <h1><?php echo $row->Username; ?></h1>
              <div class="profile-edit">
                <a href="#edit-profile" class="btn-slide" id="btn-slide"> แก้ไขโปรไฟล์ <i class="fas fa-cog"></i> </a>
              </div>
            </div>
            <div class="profile_info--center">
              <p><i class="las la-signature"></i> <span>:</span> <?php echo $row->C_Nickname; ?> <span>|</span> <?php echo $row->C_Name; ?> <?php echo $row->C_Lname; ?></p>
            </div>
            <div class="profile_info--bottom">
              <p><i class="las la-transgender"></i> <span>:</span> <?php echo $row->C_Sex; ?></p>
              <p><i class="las la-phone-volume"></i> <span>:</span> <?php echo $row->C_Phone; ?></p>
              <p><i class="lab la-facebook"></i> <span>:</span>
                <a href="https://www.facebook.com/search/top/?q=<?php echo $row->C_Facebook; ?>"><?php echo $row->C_Facebook; ?></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="tabs_area">
      <div class="container">
        <div class="tabs">
          <div class="tab-item active">
            <a href="#booking" class="booking">
              <i class="las la-bookmark"></i>
              <span> การจองของคุณ<?php echo $row->C_Nickname; ?></span>
            </a>
          </div>
          <div class="tab-item">
            <a href="#history" class="history">
              <i class="las la-border-all"></i>
              <span> ประวัติการจองของคุณ<?php echo $row->C_Nickname; ?></span>
            </a>
          </div>
        </div>
        <div class="slides">
          <!-- booking -->
          <!-- booking history -->
          <div class="tabs_content booking" id="booking">
            <p>booking</p>
          </div>
          <div class="tabs_content history" id="history">
            <p>history</p>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
}
?>