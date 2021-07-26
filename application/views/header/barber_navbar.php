<nav class="navbar">
  <div class="content">
    <div class="logo">
      <img class="header-logo" src="<?php echo base_url(); ?>/img/Logo.png">
      <a href="<?php echo site_url('Barber_Con/index'); ?>">Mom House Barber</a>
    </div>
    <ul class="menu-list">
      <div class="icon cancel-btn">
        <i class="fas fa-times"></i>
      </div>
      <li><a class="item" href="<?php echo site_url('Barber_Con/barber_haircut_history'); ?>">Haircut history</a></li>
      <li><a class="item" href="<?php echo site_url('Barber_Con/barber_add_portfolio'); ?>">Add portfolio</a></li>
      <li><a class="item" href="<?php echo site_url('Barber_Con/barber_view_admin'); ?>">Admin Profile</a></li>
      <li>
        <p>|</p>
      </li>
      <li>
        <a class="item button username" href="<?php echo site_url('Barber_Con/barber_profile'); ?>">Hi ' <?php echo $this->session->userdata('Username'); ?></a>
      </li>
      <li><a class="item button logout" herf="#"><?php echo anchor('Login_Con/logout', 'Log out'); ?></a></li>
    </ul>
    <div class="icon menu-btn">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</nav>


<script>
  const body = document.querySelector("body");
  const navbar = document.querySelector(".navbar");
  const menu = document.querySelector(".menu-list");
  const menuBtn = document.querySelector(".menu-btn");
  const cancelBtn = document.querySelector(".cancel-btn");
  menuBtn.onclick = () => {
    menu.classList.add("active");
    menuBtn.classList.add("hide");
    cancelBtn.classList.add("show");
    body.classList.add("disabledScroll");
  }
  cancelBtn.onclick = () => {
    menu.classList.remove("active");
    menuBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    body.classList.remove("disabledScroll");
  }

  window.onscroll = () => {
    this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
  }
</script>