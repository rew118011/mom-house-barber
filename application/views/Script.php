<!-- Scripts -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.scrollex.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.scrolly.min.js"></script>
<script src="<?php echo base_url(); ?>js/browser.min.js"></script>
<script src="<?php echo base_url(); ?>js/breakpoints.min.js"></script>
<script src="<?php echo base_url(); ?>js/util.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="<?php echo base_url(); ?>js/NavbarActive.js"></script>
<script>
  let calendar = document.querySelector('.calendar')

  const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

  isLeapYear = (year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
  }

  getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
  }

  generateCalendar = (month, year) => {

    let calendar_days = calendar.querySelector('.calendar-days')
    let calendar_header_year = calendar.querySelector('#year')

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    calendar_days.innerHTML = ''

    let currDate = new Date()
    if (!month) month = currDate.getMonth()
    if (!year) year = currDate.getFullYear()
    // console.log(year);
    let curr_month = `${month_names[month]}`
    month_picker.innerHTML = curr_month
    calendar_header_year.innerHTML = year

    // get first day of month

    let first_day = new Date(year, month, 1)



    let numFullQueue = <?php echo $NUMFUULQUEUE; ?>;
    console.log("numFullQueue " + numFullQueue);
    let numClose = <?php echo $NUMCLOSE; ?>;
    console.log("numClose " + numClose);

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {

      let day = document.createElement('div')
      if (i >= first_day.getDay()) {
        day.classList.add('calendar-day-hover')
        day.id = "day";
        day.innerHTML = i - first_day.getDay() + 1
        day.innerHTML += `<span class="line"></span>
                          <span class="line"></span>
                          <span class="line"></span>
                          <span class="line"></span>
                          <span class="tooltipFullQueue">คิวเต็มแล้ว</span>
                          <span class="tooltipClose">วันนี้ร้านปิด</span>
                        `
        if (i - first_day.getDay() + 1 === currDate.getDate() && month === currDate.getMonth() && year === currDate.getFullYear()) {
          day.classList.add('curr-date')
        }
        // else if (i - first_day.getDay() + 1 === BK_Day && month === BK_Month - 1 && year === BK_Year) {
        //     day.classList.add('FullQueue')
        // }

        for (let close = 0; close < numClose; close++) {
          var OB_Year = [<?php foreach ($CLOSEYEAR as $row) { ?>
              <?php echo $row->Year; ?>, <?php } ?>
          ];
          var OB_Month = [<?php foreach ($CLOSEMONTH as $row) { ?>
              <?php echo $row->Month; ?>, <?php } ?>
          ];
          var OB_Day = [<?php foreach ($CLOSEDAY as $row) { ?>
              <?php echo $row->Day; ?>, <?php } ?>
          ];
          // console.log(OB_Day[close] + " " + close);

          if (i - first_day.getDay() + 1 === OB_Day[close] && month === OB_Month[close] - 1 && year === OB_Year[close]) {
            day.classList.add('Close')
          }
        }

        for (let FullQueue = 0; FullQueue < numFullQueue; FullQueue++) {
          var BK_Year = [<?php foreach ($FULLQUEUE as $row) { ?>
              <?php echo $row->BK_Year; ?>, <?php } ?>
          ];
          var BK_Month = [<?php foreach ($FULLQUEUE as $row) { ?>
              <?php echo $row->BK_Month; ?>, <?php } ?>
          ];
          var BK_Day = [<?php foreach ($FULLQUEUE as $row) { ?>
              <?php echo $row->BK_Day; ?>, <?php } ?>
          ];
          console.log(BK_Year + " " + FullQueue)
          console.log(BK_Month + " " + FullQueue)
          console.log(BK_Day + " " + FullQueue)
          if (i - first_day.getDay() + 1 === BK_Day[FullQueue] && month === BK_Month[FullQueue] - 1 && year === BK_Year[FullQueue]) {
            day.classList.add('FullQueue')
          }
        }
      }
      calendar_days.appendChild(day)
    }
  }


  let month_list = calendar.querySelector('.month-list')

  month_names.forEach((e, index) => {
    let month = document.createElement('div')
    month.innerHTML = `<div data-month="${index}">${e}</div>`
    month.querySelector('div').onclick = () => {
      month_list.classList.remove('show')
      curr_month.value = index
      generateCalendar(index, curr_year.value)
    }
    month_list.appendChild(month)
  })

  let month_picker = calendar.querySelector('#month-picker')

  month_picker.onclick = () => {
    month_list.classList.add('show')
  }

  let currDate = new Date()

  let curr_month = {
    value: currDate.getMonth()
  }
  let curr_year = {
    value: currDate.getFullYear()
  }

  generateCalendar(curr_month.value, curr_year.value)

  document.querySelector('#prev-year').onclick = () => {
    --curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
  }

  document.querySelector('#next-year').onclick = () => {
    ++curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
  }

  let dark_mode_toggle = document.querySelector('.dark-mode-switch')

  dark_mode_toggle.onclick = () => {
    document.querySelector('.contianer.calendar-booking').classList.toggle('light')
    document.querySelector('.contianer.calendar-booking').classList.toggle('dark')
  }
</script>

<script>
  document.getElementById("button").addEventListener("click", function() {
    document.querySelector(".popupLoging").style.display = "flex";
    time = 0;
    interval = setInterval(function() {
      time--;
      document.getElementById('label-login').innerHTML = "" + "" + " Signup"
      if (time == -1) {
        // stop timer
        clearInterval(interval);
        // click
        document.getElementById("label-login").click();
      }
    }, 50)
  })

  document.getElementById("button-reg").addEventListener("click", function() {
    document.querySelector(".popupLoging").style.display = "flex";
    time = 0;
    interval = setInterval(function() {
      time--;
      document.getElementById('label-signup').innerHTML = "" + "" + " Signup"
      if (time == -1) {
        // stop timer
        clearInterval(interval);
        // click
        document.getElementById("label-signup").click();
      }
    }, 50)
  })

  document.querySelector(".closeLoging").addEventListener("click", function() {
    document.querySelector(".popupLoging").style.display = "none"
  })
</script>
<script>
  const loginText = document.querySelector(".title-text .login");
  const loginForm = document.querySelector("form.login");
  const loginBtn = document.querySelector("label.login");
  const signupBtn = document.querySelector("label.signup");
  const signupLink = document.querySelector("form .signup-link a");
  signupBtn.onclick = (() => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
  });
  loginBtn.onclick = (() => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
  });
  signupLink.onclick = (() => {
    signupBtn.click();
    return false;
  });
</script>

<script type="text/javascript">
  $(document).on('click', '.tabs .tab-item', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
</script>
<!-- End Modal script-UpImage -->
<script>
  // count element in html
  var cardBarber = document.getElementById("card-Barber");
  var btnBarber = cardBarber.getElementsByClassName("inputB");
  // var imgHairStyle = cardHairStyle.getElementsByClassName("imgH");
  // var inputHairStyle = cardHairStyle.getElementsByClassName("inputH");
  const btnB = "btnB0000";
  const inputB = "inputH0000";
  console.log("barber" + " " + btnBarber.length);

  // loop query.selectorClassList
  for (let i = 1; i <= btnBarber.length; i++) {
    document.querySelector(".btnB0000" + i).addEventListener("click", function() {
      document.querySelector(".popupBarber").style.display = "flex";
    })
    // close popup hairstyle
    document.querySelector(".closeBarber").addEventListener("click", function() {
      document.querySelector(".popupBarber").style.display = "none";
    })
    console.log(btnB + i);
    // build variable document.querySelector input radio and btn class imgID
    const inputBID = document.querySelector(".inputB0000" + i);
    const btnBarber = document.querySelector(".btnB0000" + i);
    // console.log(inputID);
    // console.log(img);

    // when click btn read more = click input radio
    btnBarber.onclick = () => {
      inputBID.click();
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('input[id="barberBtn"]').change(function() {
      var B_ID = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>index.php/Customer_Con/popupBarber",
        method: "POST",
        dataType: 'json',
        data: {
          B_ID: B_ID
        },

        success: function(response) {
          $('.profile_image-barber').find('img').remove();
          $('.profile_info--top-barber').find('.username-barber').remove();
          $('.profile_info--center-barber').find('p').remove();
          $('.profile_info--bottom-barber').find('.barber-sex').remove();
          $('.profile_info--bottom-barber').find('.barber-phone').remove();
          $('.profile_info--bottom-barber').find('.barber-address').remove();
          $('.tabs_area .barber-portfolio').find('.portfolio').remove();
          $.each(response, function(index, data) {
            $('.profile_image-barber').append('<img src="<?php echo base_url(); ?>img/' + data['B_Img'] + '">');
            $('.profile_info--top-barber h1').append('<span class="username-barber">' + data['Username'] + '</span>');
            $('.profile_info--center-barber').append('<p><i class="las la-signature"></i> <span>:</span> <span class="data">' + data['B_Nickname'] + ' <span>|</span> ' + data['B_Name'] + ' ' + data['B_Lname'] + '</span></p>');
            $('.profile_info--bottom-barber').append('<p class="barber-sex"><i class="las la-transgender"></i> <span>:</span> <span class="data">' + data['B_Sex'] + '</span></p>');
            $('.profile_info--bottom-barber').append('<p class="barber-phone"><i class="las la-phone-volume"></i> <span>:</span> <span class="data">' + data['B_Phone'] + '</span></p>');
            $('.profile_info--bottom-barber').append('<p class="barber-address"><i class="las la-map-marked-alt"></i> <span>:</span> <span class="data">' + data['B_Address'] + ' ต.' + data['B_Sub_district'] + ' อ.' + data['B_District'] + ' จ.' + data['B_Province'] + '  รหัสไปรษณีย์ : ' + data['B_Postal_Code'] + '</span></p>');
            $('.tabs_area .barber-portfolio').append('<a href="#barber-portfolio" class="portfolio"><i class="las la-bookmark"></i><span> ผลงานของช่าง' + data['B_Nickname'] + '</span></a>');
          });

        }
      });
    });
  });
</script>
<!-- popup -->
<script>
  // count element in html
  var cardHairStyle = document.getElementById("card-HairStyle");
  var btnHairStyle = cardHairStyle.getElementsByClassName("btnH");
  // var imgHairStyle = cardHairStyle.getElementsByClassName("imgH");
  // var inputHairStyle = cardHairStyle.getElementsByClassName("inputH");
  const btnH = "btnH0000";
  const imgH = "imgH0000";
  const inputH = "inputH0000";
  // console.log(btnHairStyle.length);
  // console.log(imgHairStyle.length);
  // console.log(inputHairStyle.length);

  // loop query.selectorClassList
  for (let i = 1; i <= btnHairStyle.length; i++) {
    document.querySelector(".btnH0000" + i).addEventListener("click", function() {
      document.querySelector(".popupHair").style.display = "flex";
    })
    // build variable document.querySelector input radio and btn class imgID
    const inputID = document.querySelector(".inputH0000" + i);
    const img = document.querySelector(".imgH0000" + i);
    // console.log(inputID);
    // console.log(img);

    // when click btn read more = click input radio
    img.onclick = () => {
      inputID.click();
    }
  }
  // close popup hairstyle
  document.querySelector(".closeHair").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "none";
  })
  document.querySelector(".closePopHair").addEventListener("click", function() {
    document.querySelector(".popupHair").style.display = "none"
  })
</script>

<!-- slide img -->
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
</script>
<!-- jquery ajax hair style -->
<script>
  $(document).ready(function() {
    $('input[id="hair-style"]').change(function() {
      var H_ID = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>index.php/Customer_Con/popupHair",
        method: "POST",
        dataType: 'json',
        data: {
          H_ID: H_ID
        },

        success: function(response) {
          $('.image-H_Img1').find('img').remove();
          $('.image-H_Img2').find('img').remove();
          $('.image-H_Img3').find('img').remove();
          $('.image-H_Img4').find('img').remove();
          $('.text1').find('span').remove();
          $('.text2').find('span').remove();
          $('.text3').find('span').remove();
          $('.text4').find('span').remove();
          $('.product-title').find('span').remove();
          $('.product-detail').find('.Hname').remove();
          $('.product-detail').find('.Hprice').remove();
          $('.price').find('span').remove();

          $.each(response, function(index, data) {
            $('.image-H_Img1').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/HairStyle/' + data['H_Img1'] + '" />');
            $('.image-H_Img2').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/HairStyle/' + data['H_Img2'] + '" />');
            $('.image-H_Img3').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/HairStyle/' + data['H_Img3'] + '" />');
            $('.image-H_Img4').append('<img class="' + data['H_ID'] + '" src="<?php echo base_url(); ?>img/HairStyle/' + data['H_Img4'] + '" />');
            $('.text1').append('<span>' + data['H_Shooting1'] + '</span>');
            $('.text2').append('<span>' + data['H_Shooting2'] + '</span>');
            $('.text3').append('<span>' + data['H_Shooting3'] + '</span>');
            $('.text4').append('<span>' + data['H_Shooting4'] + '</span>');
            $('.product-title').append('<span>' + data['H_Name'] + '</span>');
            $('.product-detail').append('<p class="Hname">ผมทรง' + data['H_Name'] + '</p>');
            $('.product-detail').append('<p class="Hprice"><span class="space"></span>' + data['H_Detail'] + '</p>');
            $('.price').append('<span>' + data['Price'] + '.00 ฿</span>');
          });
        }
      });
    });
  });
</script>

<script src="<?php echo base_url();?>js/Scrollbar.js">
</script>
</body>

</html>