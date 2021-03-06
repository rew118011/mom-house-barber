<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
foreach ($BARBER as $row) {
?>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom House Barber | Barber</title>
    <link rel="icon" href="<?php echo base_url(); ?>img/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styleBarberb20.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://wagtrung.github.io/store/themify-icons/themify-icons.css" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

  </head>

  <body>
    <!-- https://cdn.dribbble.com/users/226368/screenshots/10584599/media/8fc91e9919f9ccd5b96e16051a133cfa.png -->

    <div class="container all">
      <!-- #sideBar start -->

      <div class="sideBar">
        <!--     #logo start -->
        <a href="<?php echo site_url('Barber_Con'); ?>" id="logo">Mom_House_Barber</a>
        <!-- #logo finish -->

        <!-- #profile start -->
        <div class="profile">
          <div class="image">
            <a href="<?php echo site_url('Barber_Con/getBarberProfile'); ?>">
              <img src="<?php echo base_url(); ?>img/<?php echo  $row->B_Img; ?>" alt="" onerror="this.src='<?php echo base_url(); ?>img/user.png'" />
            </a>
          </div>
          <a href="<?php echo site_url('Barber_Con/getBarberProfile'); ?>" class="username">ช่าง <?php echo $row->B_Nickname; ?></a>
          <span class="name"><?php echo $row->B_Name; ?> &nbsp; <?php echo $row->B_Lname; ?></span>
          <ul class="info">
            <li>
              <span><?= $row->B_Percent; ?>%</span><span>เปอร์เซ็นต์ที่รับ</span>
            </li>
            <li>
              <span><?= $row->B_Salary; ?>฿</span> <span>เงินเดือนหลัก</span>
            </li>
            <li>
              <span><?php
                    foreach ($INCOME as $row) {
                      echo $row->B_Total;
                    }
                    ?>฿</span> <span>รายได้เดือนนี้</span>
            </li>
          </ul>
        </div>
        <!-- #profile finish -->
        <ul class="menu">
          <li>
            <a href="<?php echo site_url('Barber_Con'); ?>">
              <i class="fas fa-home"></i>
              <span>หน้าหลัก</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('Barber_Con/getHaircutHistory'); ?>">
              <i class="fas fa-history"></i>
              <span>ประวัติการตัด</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('Barber_Con/addPortfolio'); ?>">
              <i class="fas fa-plus-circle"></i>
              <span>เพิ่มผลงาน</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('Barber_Con/getAddminProfile/C00000'); ?>">
              <i class="fas fa-user-circle"></i>
              <span>โปรไฟล์แอดมิน</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('Login_Con/logout'); ?>">
              <i class="fas fa-power-off"></i>
              <span>ออกจากระบบ</span>
            </a>
          </li>
        </ul>
      </div>
      <!--   #sideBar finish -->
      <!--   #content start -->
      <div class="content">
      <?php
    }
      ?>