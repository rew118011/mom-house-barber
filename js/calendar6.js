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