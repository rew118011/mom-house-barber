<form action="save_profile" method="POST" enctype="multipart/form-data">
    <div class="containers edit-profile">
        <?php
        foreach ($CUSTOMER as $row) {
        ?>
            <div class="content">
                <div class="image-data">
                    <div class="item">
                        <div class="item-image">
                            <div class="image">
                                <img src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
                            </div>
                        </div>
                        <div class="upload">
                            <a href="">เลือกรูปโปรไฟล์</a>
                        </div>
                        <div class="edit name">
                            <label for="inputusernames"><?php echo $row->Username; ?></label>
                        </div>
                        <div class="edit name">
                            <label for="inputName">นาย <?php echo $row->C_Name; ?></label> <label for="inputLname"><?php echo $row->C_Lname; ?></label>
                        </div>
                    </div>
                </div>
                <div class="edit-data">
                    <div class="content">
                        <input style="display: none;" type="text" name="C_ID" value="<?php echo $row->C_ID; ?>" />
                        <div class="edit name">
                            <label for="inputusernames">Username</label><input type="text" name="Username" value="<?php echo $row->Username; ?>" readonly>
                        </div>
                        <div class="edit name">
                            <label for="inputName">ชื่อ</label><input type="text" name="C_Name" value="<?php echo $row->C_Name; ?>">
                        </div>
                        <div class="edit name">
                            <label for="inputLname">นามสกุล</label><input type="text" name="C_Lname" value="<?php echo $row->C_Lname; ?>">
                        </div>
                        <div class="edit name">
                            <label for="inputNickname">ชื่อเล่น</label><input type="text" name="C_Nickname" value="<?php echo $row->C_Nickname; ?>">
                        </div>
                        <div class="edit name">
                            <label for="inputPhone">เบอร์โทรศัพท์</label><input type="text" name="C_Phone" maxlength="10" pattern="[0]{1}[0-9]{9}" value="<?php echo $row->C_Phone; ?>">
                        </div>
                        <div class="edit name">
                            <label for="inputFacebook">Facebook</label><input type="text" name="C_Facebook" value="<?php echo $row->C_Facebook; ?>">
                        </div>
                        <div class="edit sex">
                            <label for="inputSex">เพศ</label>
                            <div class="sex-radio-container">
                                <div class="sex-item">
                                    <input class="radio-sex" type="radio" name="C_Sex" value="ชาย" id="option-1" checked>
                                    <input class="radio-sex" type="radio" name="C_Sex" value="หญิง" id="option-2">
                                    <input class="radio-sex" type="radio" name="C_Sex" value="อื่นๆ" id="option-3">
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
                    <div class="button-submit">
                        <button type="submit">ยืนยัน</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</form>
