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