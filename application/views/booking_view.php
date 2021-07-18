<style>
	#more {
		display: none;
	}
</style>
<br><br><br><br><br>
<center>
	<h1>จองคิว</h1>
	<br><br><br>
	<?php
	if ($this->session->flashdata('msg_error')) {
		echo '<p><font color=red>';
		echo $this->session->flashdata('msg_error');
		echo '</font></p>';
	}
	echo form_open('Booking_Con/ins_Booking');
	foreach ($CUSTOMER as $row) {
		echo form_hidden('C_ID', set_value('C_ID', $row->C_ID));
	}
	echo form_label('ปี', 'BK_Year') . nbs(2);
	echo form_error('BK_Year', '<span style="color:red;float:none;">', '</span>');
	echo form_input('BK_Year', set_value('BK_Year'));

	echo form_label('เดือน', 'BK_Month') . nbs(2);
	echo form_input('BK_Month', set_value('BK_Month'));

	echo form_label('วัน', 'BK_Day') . nbs(2);
	echo form_input('BK_Day', set_value('BK_Day')) . br(2);

	//print_r($BARBER);
	/*foreach($BARBER as $row){
	echo form_radio(array('name' => 'B_ID', 'value' => $row->B_ID,'class' => 'BARBER', 'checked' => ($row->B_ID) ? TRUE : FALSE,'onclick' => 'OnChangeByBarberID(this)'));	
	echo form_label($row->B_Nickname) . nbs(2);
	}*/
	echo form_label('เลือกช่างตัดผม', 'B_ID') . nbs(2);
	echo form_dropdown('B_ID', $BARBER, set_value('B_ID'), array('onchange' => 'OnChangeByBarberID(this)')) . br(2);

	echo form_label('เลือกช่วงเวลา', 'ST_ID') . nbs(2);
	echo form_dropdown('ST_ID', $TIMESLOT, set_value('ST_ID')) . br(2);



	echo form_submit('btnBooking', 'จองคิว');
	echo form_close();

	?>

	<div class="booking-form-inner">
		<form name="form1" id="form1" action="<?php site_url('Booking_Con/ins_Booking'); ?>">

			<div class="select date">
				<p>เลือกวันที่คุณต้องการตัด</p>

				<div class="in-select">
					<select class="dropdown-barber" name="subject" id="subject">
						<option value="BK_Year" selected="selected"> กรุณาเลือกปี... </option>
						<?php echo form_error('BK_Year', '<span style="color:red;float:none;">', '</span>'); ?>
					</select>
					<select class="dropdown-barber" name="topic" id="topic">
						<option value="BK_Month" selected="selected"> กรุณาเลือกเดือน... </option>
					</select>
					<select class="dropdown-barber" name="chapter" id="chapter">
						<option value="BK_Day" selected="selected"> กรุณาเลือกวัน... </option>
					</select>
				</div>

			</div>

			<div class="select barber">
				<p>เลือกช่างตัดผมที่คุณต้องการตัด</p>
				<div class="in-select">
					<?php
					foreach ($Barber as $row) {
					?>
						<div class="item">
							<div class="content	">

								<div class="image">
									<img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>">
								</div>

								<div class="data-barber">
									<div class="name">
										<p>ช่าง : <?php echo $row->B_Nickname; ?></p>
									</div>
								</div>

								<div class="skill">
									<p>ความชำนาญในแต่ละด้าน</p>
									<div class="skillBox">
										<p>ตัดซอย</p>
										<p>80%</p>
										<div class="skill">
											<div class="skill_level" style="width: 80%;"></div>
										</div>
									</div>
									<div class="skillBox">
										<p>ตัดมือ</p>
										<p>85%</p>
										<div class="skill">
											<div class="skill_level" style="width: 85%;"></div>
										</div>
									</div>
									<div class="skillBox">
										<p>แต่งลาย</p>
										<p>50%</p>
										<div class="skill">
											<div class="skill_level" style="width: 50%;"></div>
										</div>
									</div>
								</div>

								<div class="button-select">
									<button>เลือก</button>
								</div>

							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>

			<div class="select slottime">
				<p>เลือกเวลาที่คุณต้องการตัด</p>
				<div class="in-select">
				<div class="card-slottime">
					<div class="item">
						<div class="content">
							<button>10:00 - 11:00</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>11:00 - 12:00</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>12:00 - 13:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>13:30 - 14:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>14:30 - 15:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>15:30 - 16:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>16:30 - 17:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>17:30 - 18:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>18:30 - 19:30</button>
						</div>
					</div>
					<div class="item">
						<div class="content">
							<button>19:30 - 20:30</button>
						</div>
					</div>
				</div>
				</div>
			</div>

			<div class="field btn">
				<input onclick="myFunction()" class="submitOffWork" type="submit" name="btnBooking" value="จองคิว">
			</div>

		</form>
	</div>

</center>
<br><br><br><br><br>
<script>
	var subjectObject = {
		"2564": {
			"7": ["17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"8": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"9": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			"10": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"11": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			"12": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"]
		},
		"2565": {
			"1": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"2": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"],
			"3": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"4": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			"5": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"6": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			"7": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"8": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"9": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			"10": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
			"11": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
			"12": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"]
		}
	}
	window.onload = function() {
		var subjectSel = document.getElementById("subject");
		var topicSel = document.getElementById("topic");
		var chapterSel = document.getElementById("chapter");
		for (var x in subjectObject) {
			subjectSel.options[subjectSel.options.length] = new Option(x, x);
		}
		subjectSel.onchange = function() {
			//empty Chapters- and Topics- dropdowns
			chapterSel.length = 1;
			topicSel.length = 1;
			//display correct values
			for (var y in subjectObject[this.value]) {
				topicSel.options[topicSel.options.length] = new Option(y, y);
			}
		}
		topicSel.onchange = function() {
			//empty Chapters dropdown
			chapterSel.length = 1;
			//display correct values
			var z = subjectObject[subjectSel.value][this.value];
			for (var i = 0; i < z.length; i++) {
				chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
			}
		}
	}
</script>