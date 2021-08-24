</div>
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
  document.getElementById("button-profile").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "flex";
    time = 0;
    interval = setInterval(function() {
      time--;
      document.getElementById('btn-slide-profile').innerHTML
      if (time == -1) {
        // stop timer
        clearInterval(interval);
        // click
        document.getElementById("btn-slide-profile").click();
      }
    }, 50)
  })

  document.getElementById("button-edit").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "flex";
    time = 0;
    interval = setInterval(function() {
      time--;
      document.getElementById('btn-slide').innerHTML
      if (time == -1) {
        // stop timer
        clearInterval(interval);
        // click
        document.getElementById("btn-slide").click();
      }
    }, 50)
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
    modal.style.display = "flex";
  }
  btn.onclick = function() {
    modal.style.display = "flex";
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

<script type="text/javascript">
  $(document).on('click', '.tabs .tab-item', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
</script>
<!-- End Modal script-UpImage -->
<!-- Main -->
<div id="main">