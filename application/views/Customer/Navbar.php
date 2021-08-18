<!-- Nav -->
<nav id="nav" class="nav">
  <ul>
    <li><a href="#header" class="active">Mom House Barber</a></li>
  </ul>
  <ul>
    <li><a href="#booking">จองคิว</a></li>
    <li><a href="#my-booking">การจองของฉัน</a></li>
    <li><a href="#calendar">ปฏิทินร้าน</a></li>
    <li><a href="#barber-all">ช่างตัดผม</a></li>
    <li><a href="#hairstyle">ทรงผม</a></li>
    <?php foreach ($CUSTOMER as $row) { ?>
      <li>
        <a href="#profile" class="drop-btn" id="btn-profile">
          <div class="image">
            <img src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" alt="" />
          </div><?php echo $this->session->userdata('Username'); ?> <span class="fas fa-caret-down"></span>
        </a>
      </li>
    <?php } ?>
    <div class="drop-profile">
      <ul class="menu-bar">
        <li>
          <a href="#">
            <div class="icon">
              <i class="las la-user-circle"></i>
            </div>
            โปรไฟล์
          </a>
        </li>
        <li class="setting-item">
          <a href="#">
            <div class="icon">
              <i class="las la-user-cog"></i>
            </div>
            แก้ไขโปรไฟล์
          </a>
        </li>
        <li class="help-item">
          <a href="<?php echo site_url('Login_Con/logout'); ?>">
            <div class="icon">
              <i class="las la-sign-out-alt"></i>
            </div>
            ออกจากระบบ
          </a>
        </li>
      </ul>
    </div>
  </ul>
</nav>
<script>
  const drop_btn = document.querySelector(".drop-btn span");
  const tooltip = document.querySelector(".tooltip");
  const menu_profile = document.querySelector(".drop-profile");
  const menu_bar = document.querySelector(".menu-bar");

  drop_btn.onclick = (() => {
    menu_profile.classList.toggle("show");
    tooltip.classList.toggle("show");
  });
</script>
<!-- Main -->
<div id="main">