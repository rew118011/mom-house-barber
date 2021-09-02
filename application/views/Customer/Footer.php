<!-- main Finish -->
</div>
<!-- Footer -->
<footer id="footer">
    <section>
        <h2>Mom House Barber</h2>
        <p>
            ยินดีให้บริการอย่างมืออาชีพ โดยช่างที่ได้รับการฝึกฝนมาเป็นพิเศษ เข้าใจในการออกแบบทรงผมและเคราของผู้ชาย รวมถึงให้คำปรึกษา แนะนำทรงผมที่ตรงกับความต้องการและลักษณะเส้นผมของลูกค้าได้อย่างประทับใจ เก็บงานละเอียดมาก ๆ ด้วยอุปกรณ์คุณภาพอีกด้วยนะครับ
        </p>
    </section>
    <section>
        <h2>ช่องทางติดต่อ</h2>
        <dl class="alt">
            <dt>ที่อยู่</dt>
            <dd>110 หมู่ 7 หนองปากโลง อำเภอเมืองนครปฐม นครปฐม 73000</dd>
            <dt>เบอร์มือถือ</dt>
            <dd>089 153 6345</dd>
            <dt>Email</dt>
            <dd><a href="#">MomHouseBarber@gmail.com</a></dd>
        </dl>
        <ul class="icons">
            <li>
                <a href="http://line.me/ti/p/~1412z" target="_blank"><i class="fab fa-line"></i></a>
            </li>
            <li>
                <a href="https://www.facebook.com/profile.php?id=100070689433650" target="_blank"><i class="fab fa-facebook-square"></i></a>
            </li>
        </ul>
    </section>
    <p class="copyright">
        &copy; Untitled. Design: <a href="https://html5up.net" target="_blank">HTML5 UP</a>. and background image: <a href="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1053&q=80" target="_blank">Unspash</a>.
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
<script src="<?php echo base_url(); ?>js/NavbarActive.js"></script>
<script src="<?php echo base_url();?>js/Scrollbar.js"></script>
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
        // console.log("numFullQueue " + numFullQueue);
        let numClose = <?php echo $NUMCLOSE; ?>;
        // console.log("numClose " + numClose);

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
                    var OB_Year = [<?php foreach ($CLOSEYEAR as $row) { ?> <?php echo $row->Year; ?>, <?php } ?>];
                    var OB_Month = [<?php foreach ($CLOSEMONTH as $row) { ?> <?php echo $row->Month; ?>, <?php } ?>];
                    var OB_Day = [<?php foreach ($CLOSEDAY as $row) { ?> <?php echo $row->Day; ?>, <?php } ?>];
                    // console.log(OB_Day[close] + " " + close);

                    if (i - first_day.getDay() + 1 === OB_Day[close] && month === OB_Month[close] - 1 && year === OB_Year[close]) {
                        day.classList.add('Close')
                    }
                }

                for (let FullQueue = 0; FullQueue < numFullQueue; FullQueue++) {
                    var BK_Year = [<?php foreach ($FULLQUEUE as $row) { ?> <?php echo $row->BK_Year; ?>, <?php } ?>];
                    var BK_Month = [<?php foreach ($FULLQUEUE as $row) { ?> <?php echo $row->BK_Month; ?>, <?php } ?>];
                    var BK_Day = [<?php foreach ($FULLQUEUE as $row) { ?> <?php echo $row->BK_Day; ?>, <?php } ?>];
                    // console.log(BK_Year + " " + FullQueue)
                    // console.log(BK_Month + " " + FullQueue)
                    // console.log(BK_Day + " " + FullQueue)
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
</body>

</html>