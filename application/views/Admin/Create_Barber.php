<?php
/*if($this->session->flashdata('msg_error'))
	{
		echo '<p><font color=red>';
		echo $this->session->flashdata('msg_error');
		echo '</font></p>';
	}
	
	echo form_open('UserManagement_Con/insert_barber');

	echo form_label('ชื่อ','B_Name'). '<br />';
	echo form_error('B_Name', '<font color=red>','</font><br />');
	echo form_input('B_Name', set_value('B_Name')).'<br />';

	echo form_label('นามสกุล','B_Lname'). '<br />';
	echo form_error('B_Lname', '<font color=red>','</font><br />');
	echo form_input('B_Lname', set_value('B_Lname')).'<br />';

    echo form_label('ชื่อเล่น','B_Nickname'). '<br />';
	echo form_error('B_Nickname', '<font color=red>','</font><br />');
	echo form_input('B_Nickname', set_value('B_Nickname')).'<br />';

	echo form_label('เพศ','B_Sex'). '<br />';
	echo form_error('B_Sex', '<font color=red>','</font><br />');
	echo form_radio('B_Sex', 'ชาย').'ชาย';
	echo form_radio('B_Sex', 'หญิง').'หญิง'.'<br />';

	echo form_label('เบอร์โทร','B_Phone'). '<br />';
	echo form_error('B_Phone', '<font color=red>','</font><br />');
	echo form_input('B_Phone', set_value('B_Phone')).'<br />';

	echo form_label('ที่อยู่','B_Address'). '<br />';
	echo form_error('B_Address', '<font color=red>','</font><br />');
	echo form_textarea('B_Address', set_value('B_Address')).'<br />';

	echo form_label('รหัสผู้ใช้','Username'). '<br />';
	echo form_error('Username', '<font color=red>','</font><br />');
	echo form_input('Username', set_value('Username')).'<br />';

	echo form_label('รหัสผ่าน','Password'). '<br />';
	echo form_error('Password', '<font color=red>','</font><br />');
	echo form_password('Password', set_value('Password')).'<br />';
	
	echo form_hidden('S_ID',set_value('S_ID','2'));

	echo form_submit('btnRegister','เพิ่มช่าง');
	echo form_close();
	
	*/ ?>
<!--<a class="register" href="../Page_Con/index">ยกเลิก</a>-->

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

		<div class="recent-grid create-barber">
			<div class="projects">
				<div class="card">
					<div class="card-header">
						<h3>เพิ่มช่างตัดผม</h3>
					</div>
					<form action="http://localhost/Mom_House_Barber/index.php/UserManagement_Con/insert_barber" method="post">
						<div class="card-body-create-barber">
							<div class="card-header">
								<p>ข้อมูลการผู้ใช้</p>
							</div>
							<div class="flexbox">
								<div class="item">
									<div class="field flex">
										<img class="img-barber-queue" name="B_Img" src="<?php echo base_url(); ?>img/img_user_placeholder.jpg" />
										<input class="Display-non" type="text" name="B_Img" value="user.png" placeholder="BarberImg" required>
										<p>อัปโหลดภาพ</p>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="Username" placeholder="Username" required>
									</div>
									<div class="field">
										<input type="password" name="Password" placeholder="Password" required>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body-create-barber">
							<div class="card-header">
								<p>ข้อมูลส่วนตัว</ย>
							</div>
							<div class="flexbox">
								<div class="item">
									<div class="field">
										<input type="text" name="B_Name" placeholder="ชื่อ" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Lname" placeholder="นามสกุล" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Nickname" placeholder="ชื่อเล่น" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<div class="raido-sex-button B_Sex">
											<div class="sex-radio-container">
												<div class="sex-item">
													<input class="radio-sex" type="radio" name="B_Sex" value="ชาย" id="option-1" checked>
													<input class="radio-sex" type="radio" name="B_Sex" value="หญิง" id="option-2">
													<input class="radio-sex" type="radio" name="B_Sex" value="อื่นๆ" id="option-3">
													<label for="option-1" class="option option-1">
														<div class="sex-dot"></div>
														<span>ชาย</span>
													</label>
													<label for="option-2" class="option option-2">
														<div class="sex-dot"></div>
														<span>หญิง</span>
													</label>
													<label for="option-3" class="option option-3">
														<div class="sex-dot"></div>
														<span>อื่นๆ</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Phone" placeholder="เบอร์โทรศัพท์" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Address" placeholder="ที่อยู่" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="Tumbon" placeholder="ตำบล">
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="Aumpur" placeholder="อำเภอ">
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="City" placeholder="จังหวัด">
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="Post_address" placeholder="รหัสไปรษณีย์">
									</div>
								</div>
							</div>
						</div>

						<div class="card-body-create-barber">
							<div class="card-header">
								<p>ทักษะส่วนตัว</p>
							</div>
							<div class="flexbox">
								<div class="item">
									<div class="field">
										<input type="text" name="B_Skill1" placeholder="ทักษะที่ 1" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Skill_Score1" placeholder="???" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Skill2" placeholder="ทักษะที่ 2" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Skill_Score2" placeholder="???" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Skill3" placeholder="ทักษะที่ 3" required>
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Skill_Score3" placeholder="???" required>
									</div>
								</div>
							</div>
						</div>

						<div class="card-body-create-barber">
							<div class="card-header">
								<p>ข้อตกลงรายได้</p>
							</div>
							<div class="flexbox">
								<div class="item">
									<div class="field">
										<input type="text" name="B_Percent" placeholder="เปอร์การตัดผม / หัว">
									</div>
								</div>
								<div class="item">
									<div class="field">
										<input type="text" name="B_Salary" placeholder="เงินเดือน">
									</div>
								</div>
							</div>
							<div class="field s_id Display-non">
								<input type="text" name="S_ID" value="2" required>
							</div>
							<div class="field btn">
								<input class="submit" type="submit" name="btnRegister" value="ยืนยัน">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</div>

<script type="text/javascript">
	const currentLocation = location.href;
	const menuItem = document.querySelectorAll('a');
	const menuLength = menuItem.length
	for (let i = 0; i < menuLength; i++) {
		if (menuItem[i].href === currentLocation) {
			menuItem[i].className = "active"
		}
	}
</script>