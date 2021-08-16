<div class="banner" style="background: url(<?php echo base_url(); ?>img/bgBarber.jpeg) ; background-size: cover; background-position: center; ">
    <div class="banner-container">
        <img class="banner-container-logo" src="<?php echo base_url(); ?>/img/Logo.png">
        <div class="banner-left">
            <p class="banner-text">เห้ยย! อยากตัดผมว่ะ!</p>
            <a class="banner-link" href="#" id="banner-link">ก็จองดิวะ!</a>
        </div>
        <div class="banner-right">
            <div class="image-logo">
                <img class="banner-logo" src="<?php echo base_url(); ?>/img/Logo.png">
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("banner-link").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";
    })
</script>

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
    this.scrollY > 75 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
  }
</script>