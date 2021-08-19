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
          <a href="#popup-profile" id="button">
            <div class="icon">
              <i class="las la-user-circle"></i>
            </div>
            โปรไฟล์
          </a>
        </li>
        <li class="setting-item">
          <a href="#popup-editProfile">
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
<div class="popup">
  <div class="popup-content">
    <div class="close">
      <i class="fas fa-times"></i>
    </div>
    <?php
    foreach ($CUSTOMER as $row) {
    ?>
      <div class="content-slides">
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
                      <a href="#edit-profile" class="btn-slide"> แก้ไขโปรไฟล์ <i class="fas fa-cog"></i> </a>
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
        <div class="profile-content slide" id="edit-profile">
          <section class="profile_area">
            <form action="save_profile" method="POST" enctype="multipart/form-data">
              
            </form>
          </section>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>
<!-- Dropdown Profile -->
<script>
  const drop_btn = document.querySelector(".drop-btn span");
  const menu_profile = document.querySelector(".drop-profile");
  const btnProfile = document.querySelector("#btn-profile");
  btnProfile.onclick = () => {
    drop_btn.click();
  }
  drop_btn.onclick = (() => {
    menu_profile.classList.toggle("show");
  });
</script>
<!-- Profile popup -->
<script>
  document.getElementById("button").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "flex";
  })

  document.querySelector(".close").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none"
  })
</script>
<!-- edit-profile -->
<!-- The Modal script-save_Image -->
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn1 = document.getElementById("myBtn1");
  var btn = document.getElementById("myBtn");

  // Get the element that closes the modal
  var span = document.getElementsByClassName("closetimes")[0];

  // เมื่อคลิกที่ปุ่ม ให้เปิด modal
  btn1.onclick = function() {
    modal.style.display = "block";
  }
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // เมื่อคลิกที่ (x) ให้ปิด modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // เมื่อผู้ใช้คลิกที่ใดก็ได้นอก modal ให้ปิด
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  // <!------ End Modal script-save_Image ------->

  //The Modal script-UpImage 
  const dropArea = document.querySelector(".modal"),
    input = dropArea.querySelector(".inputImg"),
    img = dropArea.querySelector(".imgShow");
  img.onclick = () => {
    input.click();
  }

  function previewFile() {
    const preview = document.querySelector('.imgShow');
    const file = document.querySelector('.inputImg').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function() {
      // convert image file to base64 string
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }


  document.getElementById("btnSubmit").addEventListener("click", function() {
    document.querySelector(".popup2").style.display = "block";
  })

  $(document).ready(function() {
    $(".inputImg").click(function() {
      $(".img").addClass("noneBorder");
    });
  });
</script>
<!-- End Modal script-UpImage -->
<!-- Main -->
<div id="main">