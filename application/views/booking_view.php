<div class="booking-form-inner">
	<form name="form1" id="form1" method="POST" action="ins_Booking">
		<?php
		foreach ($CUSTOMER as $row) {
		?>
			<input type="hidden" name="C_ID" value="<?php echo $row->C_ID ?>">
		<?php
		}
		?>

		<div class="select date">
			<p>จองคิวตัดผม</p>
			<p>กรุณาเลือกวัน ช่างตัดผม และเวลาที่คุณต้องการหลังจากนั้นกด "ตกลก"</p>

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

		<!-- select slot time start -->
		<div class="field btn">
			<input class="booking" type="submit" name="btnBooking" value="ตกลง">
		</div>
		<!-- select slot time finish -->

	</form>
</div>




<!--<script>
	$(document).ready(function() {
		$('input[type="radio"]').change(function() {
			var B_ID = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/Booking_Con/fetch_TimeSlot",
				method: "POST",
				data: {
					B_ID: B_ID
				},
				success: function(data) {
					$('#Time_Slot').html(data);
				}

			});
		});
	});
</script>-->

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