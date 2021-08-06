<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
                <h4><?php echo $this->session->userdata('Username'); ?></h4>
                <small>ADMIN</small>
            </div>
        </div>
    </header>

    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <p>12</p>
                    <span>เดือน 8 ปี 2021</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-day"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>24</p>
                    <span>เดือน 9 ปี 2021</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-day"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>17</p>
                    <span>เดือน 11 ปี 2021</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-day"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>3 <strong>วัน</strong></p>
                    <span>วันปิดร้านทั้งหมด</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-times"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="recent-grid ">
            <div class="projects">
                <div class="card booking-form-inner">
                    <div class="card-header">
                        <h3>เพิ่มคิวที่มาหน้าร้าน</h3>
                    </div>

                    <div class="card-body">
                        <form name="form1" id="form1" method="POST" action="<?php echo site_url('Admin_Con/InsertQueue'); ?>">
                            <div class="select date">
                                <div class="in-select">
                                    <select class="dropdown-date" name="BK_Year" id="year">
                                        <option value="BK_Year" selected="selected"> กรุณาเลือกปี... </option>
                                    </select>
                                    <select class="dropdown-date" name="BK_Month" id="month">
                                        <option value="BK_Month" selected="selected"> กรุณาเลือกเดือน... </option>
                                    </select>
                                    <select class="dropdown-date" name="BK_Day" id="day">
                                        <option value="BK_Day" selected="selected"> กรุณาเลือกวัน... </option>
                                    </select>
                                </div>

                            </div>

                            <div class="select barber">
                                <div name="B_ID" id="barber" class="in-select">

                                </div>
                            </div>

                            <!-- select barber start -->
                            <div class="select slottime">
                                <div class="in-select">
                                    <div id="Time_Slot" class="card-slottime">

                                    </div>
                                </div>
                            </div>
                            <!-- select barber finish -->

                            <input style="display: none;" type="text" name="Q_ID" value="2" required>
                            <input style="display: none;" type="text" name="C_ID" value="C00000" required>

                            <!-- select slot time start -->
                            <div class="field btn">
                                <input class="booking" type="submit" name="btnBooking" value="ตกลง">
                            </div>
                            <!-- select slot time finish -->

                        </form>

                        <script src="<?php echo base_url(); ?>js/DNMforBooking.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#year').change(function() {
                                    $('#month').change(function() {
                                        $('#day').change(function() {
                                            var BK_Year = $('#year').val();
                                            var BK_Month = $('#month').val();
                                            var BK_Day = $('#day').val();
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
                                                        $('#barber').append('<div class="item barber"><div class="content"><input class="bb" type="radio" name="B_ID" value="' + data['B_ID'] + '" id="' + data['B_ID'] + '" class"barber_slottime" /><label class="Nbarber" for="' + data['B_ID'] + '"><div class="image"><img src="http://localhost/Mom_House_Barber/img/' + data['B_Img'] + '"></div><div class="name"><p>ช่าง' + data['B_Nickname'] + '</p></div></label></div></div>');
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
                                        });
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="customers">
                <div class="card">
                    <div class="card-header">
                        <h3 class="manage-booking"><i class="fas fa-calendar-times"></i> ปิดร้าน</h3>
                        <a href="<?php echo site_url('Admin_Con/getClosed'); ?>">
                            <button>
                                <i class="fas fa-calendar-times"></i> วันที่ปิดร้านทั้งหมด
                                <span class="las la-arrow-right"></span>
                            </button>
                        </a>
                    </div>

                    <div class="card-body manage-booking">
                        <div class="form-inner">
                            <form class="login" method="post">
                                <input class="dropdown-barber" type="date" id="selectDate" name="selectDate">
                                <div class="field btn">
                                    <input class="submitOffWork" type="submit" name="btnLogin" value="ยืนยัน">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
