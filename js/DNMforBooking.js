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