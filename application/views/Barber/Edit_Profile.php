<?php
foreach ($BARBER as $row) {
?>
	<div class="main-content">
		<main>
			<div class="recent-grid create-barber">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>แก้ไขข้อมูลส่วนตัว</h3>
						</div>
							<div class="card-body-create-barber">
								<div class="card-header">
									<p>ข้อมูลการผู้ใช้</p>
								</div>
								<div class="flexbox">
									<div class="item">
										<form action="save_Image" method="POST" enctype="multipart/form-data">
											<div class="field flex">

												<input style="display: none;" type="text" name="B_ID" value="<?php echo $row->B_ID; ?>" />

												<img class="img-barber-queue" id="imgShow" src="" height="200" alt="Image preview..." onerror="this.src='<?php echo base_url(); ?>img/<?php echo  $row->B_Img; ?>'">

												<input class="Display-non" onchange="previewFile()" type="file" name="B_Img" value="<?php echo $row->B_Img ?>" accept="image/*" hidden>

													<button type="submit" name="btnUpload" class="btnUpload">อัปโหลดภาพ</button>
												
											</div>
										</form>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="Username" placeholder="ชื่อผู้ใช้" value="<?php echo $row->Username; ?>" readonly>
										</div>
										<div class="field">
											<input type="password" name="Password" placeholder="Password" required style="display: none;">
										</div>
									</div>
								</div>
							</div>
							<form action="save_profileBarber" method="POST" enctype="multipart/form-data">
							<div class="card-body-create-barber">
								<div class="card-header">
									<p>ข้อมูลส่วนตัว</ย>
								</div>
								<div class="flexbox">
									<div class="item">
										<div class="field">
											<input type="text" name="B_Name" placeholder="ชื่อ" value="<?php echo $row->B_Name; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Lname" placeholder="นามสกุล" value="<?php echo $row->B_Lname; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Nickname" placeholder="ชื่อเล่น" value="<?php echo $row->B_Nickname; ?>">
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
											<input type="text" name="B_Phone" placeholder="เบอร์โทรศัพท์" maxlength="10" pattern="[0]{1}[0-9]{9}" value="<?php echo $row->B_Phone; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Address" placeholder="ที่อยู่" value="<?php echo $row->B_Address; ?>">
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
											<input type="text" name="B_Skill1" placeholder="ทักษะที่ 1" value="<?php echo $row->B_Skill1; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Skill_Score1" placeholder="???" value="<?php echo $row->B_Skill_Score1; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Skill2" placeholder="ทักษะที่ 2" value="<?php echo $row->B_Skill2; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Skill_Score2" placeholder="???" value="<?php echo $row->B_Skill_Score2; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Skill3" placeholder="ทักษะที่ 3" value="<?php echo $row->B_Skill3; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Skill_Score3" placeholder="???" value="<?php echo $row->B_Skill_Score3; ?>">
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
											<input type="text" name="B_Percent" placeholder="เปอร์การตัดผม / หัว" value="<?php echo $row->B_Percent; ?>">
										</div>
									</div>
									<div class="item">
										<div class="field">
											<input type="text" name="B_Salary" placeholder="เงินเดือน" value="<?php echo $row->B_Salary; ?>">
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
<?php
}
?>

<script>
	const dropArea = document.querySelector(".field.flex"),
		input = dropArea.querySelector(".Display-non"),
		img = dropArea.querySelector(".img-barber-queue");
	img.onclick = () => {
		input.click();
	}

	function previewFile() {
		const preview = document.querySelector('.img-barber-queue');
		const file = document.querySelector('.Display-non').files[0];
		const reader = new FileReader();

		reader.addEventListener("load", function() {
			// convert image file to base64 string
			preview.src = reader.result;
		}, false);

		if (file) {
			reader.readAsDataURL(file);
		}
	}
</script>