<div class="booking-form-inner">
	<form name="form1" id="form1" action="<?php site_url('Booking_Con/ins_Booking'); ?>">

		<div class="select date">
			<p>เลือกวันที่คุณต้องการตัด</p>
		</div>

		<div class="select barber">
			<p>เลือกช่างตัดผมที่คุณต้องการตัด</p>
			<div class="in-select">
				<?php
				foreach ($BARBER as $row) {
				?>
					<div class="item">
						<div class="content	">

							<div class="image">
								<img src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>">
							</div>

							<div class="data-barber">
								<div class="name">
									<p>ช่าง : <?php echo $row->B_Nickname; ?></p>
									<?php echo $row->B_ID; ?>
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

							<div name="B_ID" id="barber" class="button-select">
								<?php
								echo '<input name="B_ID" id="barber" type="radio" value="' . $row->B_ID . '">';
								?>
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
					<div name="ST_ID" id="Time_Slot" class="content">
						<input type="radio" value="" />
					</div>
				</div>
			</div>
		</div>

		<div class="field btn">
			<input onclick="myFunction()" class="submitOffWork" type="submit" name="btnBooking" value="จองคิว">
		</div>

	</form>
</div>



<script>
	$(document).ready(function() {
		$('input[type="radio"]').change(function() {
			var B_ID = $(this).val();


			$.ajax({
				url: "<?php echo base_url(); ?>index.php/Booking_Con/fetch_Barber",
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
</script>