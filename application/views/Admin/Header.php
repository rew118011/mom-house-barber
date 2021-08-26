<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1" />
  <meta name="theme-color" content="#999999" />
  <title>Mom House Barber | Barber</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styleAdmin35.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
  <script src="https://kit.fontawesome.com/fc529a0756.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
  <input type="checkbox" id="nav-toggle">
  <div class="slidebar">
    <div class="slidebar-brand">
      <span>
        <a href="<?php echo site_url('Admin_Con'); ?>">
          <h2><span><i class="las la-cut"></i></span> <span>
              <p>Mom House Barber</p>
            </span></h2>
        </a>
      </span>
    </div>

    <div class="slidebar-menu">
      <ul>
        <li>
          <a href="<?php echo site_url('Admin_Con'); ?>">
            <span class="las la-home"></span>
            <span class="span-title">หน้าแรก</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('Admin_Con/manageBooking'); ?>">
            <span class="las la-calendar-alt"></span>
            <span class="span-title">จัดการปฏิทิน</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('Admin_Con/getBarberAll'); ?>">
            <span class="las la-cut"></span>
            <span class="span-title">จัดการช่าง</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('Admin_Con/ManageOffWork'); ?>">
            <span class="las la-calendar-times"></span>
            <span class="span-title">จัดการวันหยุดช่าง</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('Admin_Con/getCustomerAll'); ?>">
            <span class="las la-users"></span>
            <span class="span-title">จัดการลูกค้า</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('Admin_Con/manageHairstyle'); ?>">
            <span class="las la-h-square"></span>
            <span class="span-title">จัดการทรงผม</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('Login_Con/logout'); ?>">
            <span class="las la-sign-out-alt"></span>
            <span class="span-title">ออกจากระบบ</span>
          </a>
        </li>

      </ul>
    </div>
  </div>