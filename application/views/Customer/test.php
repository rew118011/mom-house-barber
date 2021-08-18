<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mom House Barber | Customer</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styleCustomerN2.css">
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/noscript.css" />
    </noscript>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/progress-circle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />

    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

</head>

<body style="background-image: url(<?php echo base_url(); ?>img/bgBarber.jpeg)">

    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="<?php echo base_url(); ?>img/logo.png" alt="" /></span>
            <h1>Mom House Barber</h1>
        </header>
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
                <li>
                    <a href="#profile">
                        <div class="image">
                            <img src="<?php echo base_url(); ?>img/me.jpg" alt="" />
                        </div>TheNoch
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <?php
            $check = 1;
            if (count($CLOSEALL) == $check) {
                echo "วันนี้ร้านปิดค่ะ";
            ?>

            <?php
            } else {
            ?>
                <!-- Booking -->
                <section id="booking" class="main">
                    <div class="booking-form-inner">
                        <form name="form1" id="form1" method="POST" action="Booking_Con/ins_Booking">
                            <?php
                            foreach ($CUSTOMER as $row) {
                            ?>
                                <input type="hidden" name="C_ID" value="<?php echo $row->C_ID ?>">
                            <?php
                            }
                            ?>
                            <div class="select date">
                                <header class="major">
                                    <div class="title">
                                        <div class="wrapper-txt calendar-txt">
                                            <ul class="dynamic-txts">
                                                <li><span>จองคิวตัดผม</span></li>
                                                <li><span>จองคิวตัดผม</span></li>
                                                <li><span>จองคิวตัดผม</span></li>
                                                <li><span>จองคิวตัดผม</span></li>
                                            </ul>
                                        </div>
                                        <div class="description">
                                            <p>
                                                กรุณาเลือกวัน ช่างตัดผม และเวลาที่คุณต้องการหลังจากนั้นกด "ตกลก"
                                            </p>
                                        </div>
                                    </div>
                                </header>
                                <div class="in-select">
                                    <select class="dropdown-date" name="BK_Year" id="year">
                                        <option value="BK_Year" selected="selected">กรุณาเลือกปี...</option>
                                    </select>
                                    <select class="dropdown-date" name="BK_Month" id="month">
                                        <option value="BK_Month" selected="selected">กรุณาเลือกเดือน...</option>
                                    </select>
                                    <select class="dropdown-date" name="BK_Day" id="day">
                                        <option value="BK_Day" selected="selected">กรุณาเลือกวัน...
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- select barber start -->
                            <div class="select barber">
                                <div name="B_ID" id="barber" class="in-select">

                                </div>
                            </div>

                            <!-- select slottime start -->
                            <div class="select slottime">
                                <div class="in-select">
                                    <div id="Time_Slot" class="card-slottime">

                                    </div>
                                </div>
                            </div>
                            <!-- select barber finish -->
                            <input style="display: none;" type="text" name="H_ID" value="H00001" required>
                            <input style="display: none;" type="text" name="Q_ID" value="1" required>

                            <!-- select slot time start -->
                            <div class="field btn">
                                <input class="booking" type="submit" name="btnBooking" value="ตกลง">
                            </div>
                            <!-- select slot time finish -->
                        </form>
                    </div>
                </section>
            <?php
            }
            ?>

            <!-- My Booking -->
            <section id="my-booking" class="main special">
                <header class="major">
                    <div class="title">
                        <div class="wrapper-txt calendar-txt">
                            <ul class="dynamic-txts">
                                <li><span>คิวตัดผมที่คุณจอง</span></li>
                                <li><span>จองคิวตัดผม</span></li>
                                <li><span>จองคิวตัดผม</span></li>
                                <li><span>จองคิวตัดผม</span></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>
                                คิวที่คุณจองทั้งหมด หากคุณต้องการเปลี่ยนคิว กรุณากด "ยกเลิกคิว" แล้วกลับไปจองคิวใหม่ค่ะ
                            </p>
                        </div>
                    </div>
                </header>
                <div class="container yourQueue">
                    <?php
                    foreach ($BOOKING as $row) {
                    ?>
                        <section class="queue">
                            <div class="barber__photo">
                                <div class="photo-container">
                                    <div class="photo-main">
                                        <div class="controls">
                                            <a href="<?php echo site_url('Customer_Con/getBarberByCustomer/' . $row->B_ID); ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                                        </div>
                                        <div class="image-barber">
                                            <img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="Barber.BID">
                                        </div>
                                    </div>
                                    <div class="skill-album">
                                        <ul>
                                            <li>
                                                <div class="progress-circle progress-<?= $row->B_Skill_Score1; ?>"><span><?= $row->B_Skill_Score1; ?></span></div><span>ตัดซอย</span>
                                            </li>
                                            <li>
                                                <div class="progress-circle progress-<?= $row->B_Skill_Score2; ?>"><span><?= $row->B_Skill_Score2; ?></span></div><span>ตัดมือ</span>
                                            </li>
                                            <li>
                                                <div class="progress-circle progress-<?= $row->B_Skill_Score3; ?>"><span><?= $row->B_Skill_Score3; ?></span></div><span>แต่งลาย</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="queue__info">
                                <div class="titleQ">
                                    <p>คิวของคุณ</p>
                                </div>
                                <div class="price">
                                    <p><span>150 </span> ฿</p>
                                </div>
                                <div class="date-time">
                                    <p>วันเวลาที่คุณเลือก</p>
                                    <p><i class="far fa-clock"></i> <?php echo $row->ST_Time; ?> <span>น.</span></p>
                                    <p><?php echo $row->BK_Day ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></p>
                                </div>
                                <div class="description">
                                    <p>เปลี่ยนคิว</p>
                                    <ul>
                                        <li>หากต้องการเปลี่ยนวันเวลาหรือช่าง</li>
                                        <li>กรุณายกเลิกคิวและกลับมาจองอีกครั้ง</li>
                                        <li>ขอบคุณ.</li>
                                    </ul>
                                </div>
                                <a class="cancel--btn" href="<?php echo site_url('Booking_Con/del_booking/' . $row->BK_ID); ?>" onclick="return confirm('คุณต้องการยกเลิกคิวที่จองใช่หรือไม่ ?');">ยกเลิกคิวที่จอง</a>
                            </div>
                        </section>
                    <?php
                    }
                    ?>
                </div>
            </section>

            <section id="calendar" class="main">
                <header class="major">
                    <div class="title">
                        <div class="wrapper-txt calendar-txt">
                            <ul class="dynamic-txts">
                                <li><span>ปฏิทินคิวของร้าน</span></li>
                                <li><span>ปฏิทินคิวของร้าน</span></li>
                                <li><span>ปฏิทินคิวของร้าน</span></li>
                                <li><span>ปฏิทินคิวของร้าน</span></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>
                                ปฏิทินนี้ คือปฏิทินที่มีไว้สำหรับดูวันว่าวันไหนมีคิวเต็มแล้ว วันไหนมีคิวว่าง
                            </p>
                        </div>
                    </div>
                </header>
                <div class="contianer calendar-booking light">
                    <div class="calendar">
                        <div class="calendar-header">
                            <span class="month-picker" id="month-picker">February</span>
                            <div class="year-picker">
                                <span class="year-change" id="prev-year">
                                    <pre><</pre>
                                </span>
                                <span id="year">2021</span>
                                <span class="year-change" id="next-year">
                                    <pre>></pre>
                                </span>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-week-day">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days"></div>
                        </div>
                        <div class="calendar-footer">
                            <div class="toggle">
                                <span>Dark Mode</span>
                                <div class="dark-mode-switch">
                                    <div class="dark-mode-switch-ident"></div>
                                </div>
                            </div>
                        </div>
                        <div class="month-list"></div>
                    </div>
                </div>
            </section>

            <!-- All Barber -->
            <section id="barber-all" class="main special">
                <header class="major">
                    <div class="title">
                        <div class="wrapper-txt calendar-txt">
                            <ul class="dynamic-txts">
                                <li><span>ช่างฝีมือในร้านของเรา</span></li>
                                <li><span>ช่างฝีมือในร้านของเรา</span></li>
                                <li><span>ช่างฝีมือในร้านของเรา</span></li>
                                <li><span>ช่างฝีมือในร้านของเรา</span></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>
                                ในร้านของเรา มีช่างตัดผมฝีมือดีให้ท่านได้เลือกตัดมากมาย หากต้องการดูโปรไฟล์ของช่าง คลิก! ที่ชื่อช่างใต้รูปได้เลย
                            </p>
                        </div>
                    </div>
                </header>
                <ul class="features">
                    <?php
                    foreach ($Barber as $row) {
                    ?>
                        <li>
                            <span class="icon major"><img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" alt="" /></span>
                            <h3>ช่าง<?php echo $row->B_Nickname; ?></h3>
                            <p>
                                <a href="<?php echo site_url('Customer_Con/getBarberByCustomer/' . $row->B_ID); ?>">ดูโปรไฟล์</a>
                            </p>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </section>

            <!-- Hairstyle -->
            <section id="hairstyle" class="main special">
                <header class="major">
                    <div class="title">
                        <div class="wrapper-txt calendar-txt">
                            <ul class="dynamic-txts">
                                <li><span>ทรงผมที่ร้านแนะนำ</span></li>
                                <li><span>ทรงผมที่ร้านแนะนำ</span></li>
                                <li><span>ทรงผมที่ร้านแนะนำ</span></li>
                                <li><span>ทรงผมที่ร้านแนะนำ</span></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>ทรงผมชายสุดฮิตที่ลูกค้านิยมมาตัดที่ร้านของเรา Mom House Barber</p>
                        </div>
                    </div>
                </header>
                <ul class="statistics">
                    <li class="style1">
                        <span class="icon solid fa-code-branch"></span>
                        <strong>5,120</strong> Etiam
                    </li>
                    <li class="style2">
                        <span class="icon fa-folder-open"></span>
                        <strong>8,192</strong> Magna
                    </li>
                    <li class="style3">
                        <span class="icon solid fa-signal"></span>
                        <strong>2,048</strong> Tempus
                    </li>
                    <li class="style4">
                        <span class="icon solid fa-laptop"></span>
                        <strong>4,096</strong> Aliquam
                    </li>
                    <li class="style5">
                        <span class="icon fa-gem"></span>
                        <strong>1,024</strong> Nullam
                    </li>
                </ul>
                <p class="content">
                    Nam elementum nisl et mi a commodo porttitor. Morbi sit amet nisl eu arcu faucibus hendrerit vel a risus. Nam a orci mi, elementum ac arcu sit amet, fermentum pellentesque et purus. Integer maximus varius lorem, sed convallis diam accumsan sed. Etiam
                    porttitor placerat sapien, sed eleifend a enim pulvinar faucibus semper quis ut arcu. Ut non nisl a mollis est efficitur vestibulum. Integer eget purus nec nulla mattis et accumsan ut magna libero. Morbi auctor iaculis porttitor. Sed
                    ut magna ac risus et hendrerit scelerisque. Praesent eleifend lacus in lectus aliquam porta. Cras eu ornare dui curabitur lacinia.
                </p>
                <footer class="major">
                    <ul class="actions special">
                        <li><a href="generic.html" class="button">Learn More</a></li>
                    </ul>
                </footer>
            </section>

            <!-- main Finish -->
        </div>
        <!-- Footer -->
        <footer id="footer">
            <section>
                <h2>Aliquam sed mauris</h2>
                <p>
                    Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.
                </p>
                <ul class="actions">
                    <li><a href="generic.html" class="button">Learn More</a></li>
                </ul>
            </section>
            <section>
                <h2>Etiam feugiat</h2>
                <dl class="alt">
                    <dt>Address</dt>
                    <dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
                    <dt>Phone</dt>
                    <dd>(000) 000-0000 x 0000</dd>
                    <dt>Email</dt>
                    <dd><a href="#">information@untitled.tld</a></dd>
                </dl>
                <ul class="icons">
                    <li>
                        <a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a>
                    </li>
                    <li>
                        <a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a>
                    </li>
                    <li>
                        <a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a>
                    </li>
                    <li>
                        <a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a>
                    </li>
                    <li>
                        <a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a>
                    </li>
                </ul>
            </section>
            <p class="copyright">
                &copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.
            </p>
        </footer>
        <!-- Wrapper Finish -->
    </div>

    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.scrollex.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.scrolly.min.js"></script>
    <script src="<?php echo base_url(); ?>js/browser.min.js"></script>
    <script src="<?php echo base_url(); ?>js/breakpoints.min.js"></script>
    <script src="<?php echo base_url(); ?>js/util.js"></script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
    <script src="<?php echo base_url(); ?>js/calendar.js"></script>
    <script src="<?php echo base_url(); ?>js/NavbarActive.js"></script>

    <script>
        $(document).ready(function() {
            $('#year').change(function() {
                $('#month').change(function() {
                    $('#day').change(function() {
                        var BK_Year = $('#year').val();
                        var BK_Month = $('#month').val();
                        var BK_Day = $('#day').val();
                        var BK_Date = $('#year').val() + "-" + ('0' + $('#month').val()).slice(-2) + "-" + $('#day').val();
                        today = new Date().toISOString().split('T')[0];
                        if (BK_Date >= today) {
                            $.ajax({
                                url: "<?php echo base_url(); ?>index.php/Booking_Con/fetch_Barber",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    BK_Year: BK_Year,
                                    BK_Month: BK_Month,
                                    BK_Day: BK_Day
                                },

                                success: function(response) {
                                    $('#barber').find('input[type="radio"]').remove();
                                    $('#barber').find('.item.barber').remove();
                                    $('#Time_Slot').find('input[type="radio"]').remove();
                                    $('#Time_Slot').find('.input.slottime').remove();
                                    $('#Time_Slot').find('.option.slottime').remove();
                                    $('#Time_Slot').find('.option.slottime').remove();
                                    $.each(response, function(index, data) {
                                        $('#barber').append('<div class="item barber"><div class="content"><input class="bb" type="radio" name="B_ID" value="' + data['B_ID'] + '" id="' + data['B_ID'] + '" class"barber_slottime" /><label class="Nbarber" for="' + data['B_ID'] + '"><div class="image"><img src="http://localhost/Mom_House_Barber/img/' + data['B_Img'] + '"></div><div class="data-barber"><div class="name"><p>ช่าง' + data['B_Nickname'] + '</p></div></div><div class="skill"><p>ความชำนาญในแต่ละด้าน</p><div class="skillBox"><p>' + data['B_Skill1'] + '</p><p>' + data['B_Skill_Score1'] + '%</p><div class="skill"><div class="skill_level" style="width: ' + data['B_Skill_Score1'] + '%;"></div></div></div><div class="skillBox"><p>' + data['B_Skill2'] + '</p><p>' + data['B_Skill_Score2'] + '%</p><div class="skill"><div class="skill_level" style="width: ' + data['B_Skill_Score2'] + '%;"></div></div></div><div class="skillBox"><p>' + data['B_Skill3'] + '</p><p>' + data['B_Skill_Score3'] + '%</p><div class="skill"><div class="skill_level" style="width: ' + data['B_Skill_Score3'] + '%;"></div></div></div></div></label></div></div>');
                                    });

                                    $('input[type="radio"]').change(function() {
                                        var B_ID = $(this).val();
                                        $.ajax({
                                            url: "<?php echo base_url(); ?>index.php/Booking_Con/fetch_TimeSlot",
                                            method: "POST",
                                            dataType: 'json',
                                            data: {
                                                BK_Year: BK_Year,
                                                BK_Month: BK_Month,
                                                BK_Day: BK_Day,
                                                B_ID: B_ID
                                            },

                                            success: function(response) {
                                                $('#Time_Slot').find('.content').remove();
                                                $('#Time_Slot').find('input[type="radio"]').remove();
                                                $('#Time_Slot').find('.input.slottime').remove();
                                                $('#Time_Slot').find('.option.slottime').remove();
                                                $.each(response, function(index, data) {
                                                    $('#Time_Slot').append('<div class="content"><input class="input slottime" type="radio" name="ST_ID" id="option-' + data['ST_ID'] + '" value="' + data['ST_ID'] + '"><label for="option-' + data['ST_ID'] + '" class="option option-' + data['ST_ID'] + ' slottime"><div class="dot"></div><span>' + data['ST_Time'] + '</span></label></div> ');
                                                });

                                            }
                                        });
                                    });
                                }
                            });
                        } else {
                            alert("ขออภัยคุณไม่สามารถเลือกวันที่ผ่านมาแล้วได้ค่ะ !");
                            return;
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            const monthNames = ["", "มกราคม", "กุมพภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม",
                "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
            ];
            let allYears = 2;
            let BK_Year = $("#year");
            let BK_Month = $("#month");
            let BK_Day = $("#day");
            let currentYear = new Date().getFullYear();

            for (var y = 0; y < allYears; y++) {
                let date = new Date;
                let yearElem = document.createElement("option"); //ช่วยสร้าง element object ให้เราขึ้นมา แล้วเราค่อยเอาไปเพิ่มใน element ที่แสดงผลอยู่โดยใช้ function appendChild
                yearElem.value = currentYear //เปรียบเที่ยค่าให้ตรงกับปีปัจจุบัน
                yearElem.textContent = currentYear; //textContent คือ จะส่งคืนเนื้อหาข้อความขององค์ประกอบทั้งหมดรวมถึง <script> และ <style>
                BK_Year.append(yearElem); // .append คือ คือ คำสั่งของ jQuery ในหมวดของ DOM มีไว้สำหรับ การแทรก Elements ไว้ภายในด้านล่าง Elements ที่ต้องการ
                currentYear++; // ทำให้ปีปัจจุบันเพิ่มขึ้น
            }

            for (var m = 1; m < 13; m++) {
                let month = monthNames[m];
                let monthElem = document.createElement("option"); //ช่วยสร้าง element object ให้เราขึ้นมา แล้วเราค่อยเอาไปเพิ่มใน element ที่แสดงผลอยู่โดยใช้ function appendChild
                monthElem.value = m; //เปรียบเที่ยค่าให้ตรงกับปีปัจจุบัน
                monthElem.textContent = month; //textContent คือ จะส่งคืนเนื้อหาข้อความขององค์ประกอบทั้งหมดรวมถึง <script> และ <style>
                BK_Month.append(monthElem); // .append คือ คำสั่งของ jQuery ในหมวดของ DOM มีไว้สำหรับ การแทรก Elements ไว้ภายในด้านล่าง Elements ที่ต้องการ
            }

            var d = new Date(); //สร้างตัวแปร d เพื่อเก็บวันที่
            var month = d.getMonth() + 1; //สร้างตัวแปร mont เพื่อเก็บค่า d ไว้ใน ฟังชั่นรับค่าเดือน
            var year = d.getFullYear(); //สร้างตัวแปร year เพื่อเก็บค่า d ไว้ใน ฟังชั่นรับค่าปี
            var day = d.getDate(); //สร้างตัวแปร day เพื่อเก็บค่า d ไว้ใน ฟังชั่นรับค่าวัน


            BK_Year.on("change", AdjustDays);
            BK_Month.on("change", AdjustDays);

            AdjustDays(); //คำวั่งที่ใช้ในการปรังวันให้ตรงกับเดือนและปี
            BK_Day.val(day)

            function AdjustDays() {
                var year = BK_Year.val();
                var month = parseInt(BK_Month.val()); //parseInt แปลงตัวเลข
                BK_Day.empty();


                var days = new Date(year, month, 0).getDate(); //วันสุดท้ายของ ในเดือนและปีนั้น

                // สร้างวันในเดือนนั้นๆ
                for (var d = 1; d <= days; d++) {
                    var dayElem = document.createElement("option");
                    dayElem.value = d;
                    dayElem.textContent = d;
                    BK_Day.append(dayElem);
                }
            }
        });
    </script>
</body>

</html>