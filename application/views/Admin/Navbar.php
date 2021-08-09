<div class="main-content">
  <header>
    <h2>
      <label for="nav-toggle">
        <span class="las la-bars"></span>
      </label>

      Menu
    </h2>

    <div class="search-wrapper">
      <span class="las la-search"></span>
      <input type="search" placeholder="Search here" />
    </div>

    <div class="user-wrapper">
      <img src="<?php echo base_url(); ?>/img/zbew.jpg" alt="">
      <div>
        <a href="<?php echo site_url('Admin_Con/getAdminProfile/C00000'); ?>">
          <h4><?php echo $this->session->userdata('Username'); ?></h4>
        </a>
        <a href="<?php echo site_url('Admin_Con/getAdminProfile/C00000'); ?>"><small>ADMIN</small></a>
      </div>
    </div>
  </header>