<?php
foreach ($CUSTOMER as $row) {
?>

<section class="profile_area">
      <div class="container">
        <div class="profile">
          <div class="profile_image">
          <img src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" >
          </div>
          <div class="profile_info">
            <div class="profile_info--top">
              <h1><?php echo $row->Username; ?></h1>
              <div class="profile-edit">
              <a href="<?php echo site_url('Customer_Con/setProfile'); ?>"> แก้ไขโปรไฟล์ <i class="fas fa-cog"></i> </a>
              </div>
            </div>
            <div class="profile_info--center">
              <span>นาย <?php echo $row->C_Name ;?> <?php echo $row->C_Lname ;?></span>
              <span>เพศ <?php echo $row->C_Sex ;?></span>
            </div>
            <div class="profile_info--bottom">
              <strong>☼" <?php echo $row->C_Nickname ;?> "●</strong>
              <br />
              <p>
                [ "ธนายุทธ" ชื่อที่เเม่กูตั้ง มันคู่มากับ "สามสังข์" ที่พ่อกูให้
                ]<br />
                ◐" 𝙸 𝚑𝚊𝚟𝚎 𝚊 𝚍𝚛𝚎𝚊𝚖. 𝙰𝚗𝚍 𝚒 𝚠𝚒𝚕𝚕 𝚍𝚘 𝚒𝚝 " ◑<br />
              </p>
              <p>
                <a href="https://www.facebook.com/search/top/?q=<?php echo $row->C_Facebook  ;?>"><i class="fab fa-facebook"></i><?php echo $row->C_Facebook  ;?></a>😍
                <a><i class="fas fa-mobile-alt"></i><?php echo $row->C_Phone ;?></a>
              </p>
            </div>
          </div>
        </div>
     </div>
  </section>


<?php
}
?>
<div class="profile_c_container_bottom">
  <div class="profile_c_tabs">
    <div class="profile_c_icon active"><i class="fas fa-bookmark sam"></i><strong class="profile_c_strong">การจองของฉัน</strong></div>
    <div class="profile_c_icon"><i class="fas fa-th sam"></i><strong class="profile_c_strong">ประวัติการจองของฉัน</strong></div>
  </div>
</div>
