<main>
    <div class="recent-grid edit-barber">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>แก้ไขช่างตัดผม</h3>
                </div>
                <?php
                foreach ($BARBER as $row) {
                ?>
                    <form action="<?php echo site_url('UserManagement_Con/save_barber'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body-create-barber">
                            <div class="card-header">
                                <p>ข้อมูลการผู้ใช้</p>
                            </div>
                            <div class="flexbox">
                                <div class="item">
                                    <div class="field flex">
                                        <div class="profile_image">
                                            <input class="inputEditB_Img" onchange="previewImgProfile()" type="file" name="B_Img" value="<?php echo $row->B_Img ?>" accept="image/*" hidden>
                                            <img class="EditB_Img" name="B_Img" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                                        </div>
                                        <p class="edit-img">อัปโหลดภาพ</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <input class="B_ID" type="text" name="B_ID" value="<?php echo $row->B_ID; ?>" readonly />
                                    </div>
                                    <div class="field">
                                        <p class="txt"><?php echo $row->Username; ?></p>
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
                                        <p>ชื่อจริง</p>
                                        <input type="text" name="B_Name" value="<?php echo $row->B_Name; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>นามสกุล</p>
                                        <input type="text" name="B_Lname" value="<?php echo $row->B_Lname; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>ชื่อเล่น</p>
                                        <input type="text" name="B_Nickname" value="<?php echo $row->B_Nickname; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>เพศ</p>
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
                                        <p>เบอร์มือถือ</p>
                                        <input type="text" name="B_Phone" value="<?php echo $row->B_Phone; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>ที่อยู่</p>
                                        <textarea type="text" name="B_Address"><?php echo $row->B_Address; ?></textarea>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>ตำบล</p>
                                        <input type="text" name="B_Sub_district" value="<?php echo $row->B_Sub_district; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>อำเภอ</p>
                                        <textarea type="text" name="B_District"><?php echo $row->B_District; ?></textarea>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>จังหวัด</p>
                                        <input type="text" name="B_Province" value="<?php echo $row->B_Province; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>รหัสไปรษณีย์</p>
                                        <textarea type="text" name="B_Postal_Code"><?php echo $row->B_Postal_Code; ?></textarea>
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
                                        <p>สกิลที่ 1</p>
                                        <input type="text" name="B_Skill1" value="<?php echo $row->B_Skill1; ?>">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>เลเวลสกิลที่ 1</p>
                                        <input type="text" name="B_Skill_Score1" value="<?php echo $row->B_Skill_Score1; ?>">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>สกิลที่ 2</p>
                                        <input type="text" name="B_Skill2" value="<?php echo $row->B_Skill2; ?>">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>เลเวลสกิลที่ 2</p>
                                        <input type="text" name="B_Skill_Score2" value="<?php echo $row->B_Skill_Score2; ?>">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>สกิลที่ 3</p>
                                        <input type="text" name="B_Skill3" value="<?php echo $row->B_Skill3; ?>">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>เลเวลสกิลที่ 3</p>
                                        <input type="text" name="B_Skill_Score3" value="<?php echo $row->B_Skill_Score3; ?>">
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
                                        <p>เปอร์เซ็นต์ที่รับต่อหัว</p>
                                        <input type="text" name="B_Percent" value="<?php echo $row->B_Percent; ?>">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="field">
                                        <p>เงินเดือนหลัก</p>
                                        <input class="salary" type="text" name="B_Salary" value="<?php echo $row->B_Salary; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field btn">
                            <input class="submit editBarber" type="submit" name="btnSave" value="ยืนยัน">
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</main>
</div>
<script>
	const EditImgProfile = document.querySelector(".EditB_Img");
	const btnEditImgProfile = document.querySelector(".edit-img");
	const inputEditB_Img = document.querySelector(".inputEditB_Img");
	EditImgProfile.onclick = () => {
		inputEditB_Img.click();
	}
	btnEditImgProfile.onclick = () => {
		inputEditB_Img.click();
	}

	function previewImgProfile() {
		const preview = document.querySelector('.EditB_Img');
		const file = document.querySelector('.inputEditB_Img').files[0];
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