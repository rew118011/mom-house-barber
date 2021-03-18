<br><br><br><br><br>
<center><h1>จองคิว</h1></center>
<br><br><br>
<center>
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
	<a class="register" href="../Page_Con/index">ยกเลิก</a>
</center>
<br><br><br><br><br>