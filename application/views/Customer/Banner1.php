<div class="banner_all" style="background: url(<?php echo base_url(); ?>img/bgBarberNav.png) ; background-size: cover; background-position: center; ">
    <div class="banner-container">
    </div>
</div>

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
    this.scrollY > 2 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
  }
</script>