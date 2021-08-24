<?php
foreach ($CUSTOMER as $row) {
?>
    <div class="profile-content slide" id="edit-profile">
        <section class="profile_area">
            <form action="<?php echo site_url('Customer_Con/save_profile'); ?>" method="POST" enctype="multipart/form-data">
                <div class="edit-profile">
                    <div class="screen">
                        <div class="screen-body">
                            <div class="screen-body-item left">
                                <a href="#profiles" class="btn-slide" id="btn-slide-profile"><i class="fas fa-arrow-circle-left"></i></a>
                                <div class="app-title">
                                    <a>
                                        <img src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" alt="img-profile" id="myBtn1">
                                    </a>
                                    <div class="imgEdit" id="myBtn">
                                        <i class="las la-camera"></i>
                                    </div>
                                    <span><input type="text" name="Username" value="<?php echo $row->Username; ?>" readonly></span>
                                </div>
                            </div>
                            <div class="screen-body-item">
                                <div class="app-form">
                                    <input type="text" class="app-form-control" name="C_ID" value="<?php echo $row->C_ID; ?>" style="display: none;" />
                                    <div class="app-form-group">
                                        <span>ชื่อเล่น <i class="las la-signature"></i></span>
                                        <input type="text" class="app-form-control" name="C_Nickname" value="<?php echo $row->C_Nickname; ?>" />
                                    </div>
                                    <div class="app-form-group">
                                        <span>ชื่อ <i class="las la-file-signature"></i></span>
                                        <input type="text" class="app-form-control" name="C_Name" value="<?php echo $row->C_Name; ?>" />
                                    </div>
                                    <div class="app-form-group">
                                        <span></i>นามสกุล <i class="las la-file-signature"></i></i></span>
                                        <input type="text" class="app-form-control" name="C_Lname" value="<?php echo $row->C_Lname; ?>" />
                                    </div>
                                    <div class="app-form-group">
                                        <span>เบอร์โทรศัพท์ <i class="las la-phone-volume"></i></span>
                                        <input type="text" class="app-form-control" name="C_Phone" maxlength="10" pattern="[0]{1}[0-9]{9}" value="<?php echo $row->C_Phone; ?>" />
                                    </div>
                                    <div class="app-form-group">
                                        <span></i>Facebook <i class="lab la-facebook"></i></span>
                                        <input type="text" class="app-form-control" name="C_Facebook" value="<?php echo $row->C_Facebook; ?>" />
                                    </div>
                                    <div class="app-form-group sex">
                                        <span>เพศ <i class="las la-transgender"></i></span>
                                        <div class="sex-radio-container app-form-control">
                                            <div class="sex-item">
                                                <input class="radio-sex" type="radio" name="C_Sex" value="ชาย" id="option-male" checked>
                                                <input class="radio-sex" type="radio" name="C_Sex" value="หญิง" id="option-female">
                                                <input class="radio-sex" type="radio" name="C_Sex" value="อื่นๆ" id="option-other">
                                                <label for="option-male" class="option option-male">
                                                    <div class="sex-dot"></div>
                                                    <span>ชาย</span>
                                                </label>
                                                <label for="option-female" class="option option-female">
                                                    <div class="sex-dot"></div>
                                                    <span>หญิง</span>
                                                </label>
                                                <label for="option-other" class="option option-other">
                                                    <div class="sex-dot"></div>
                                                    <span>อื่นๆ</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-form-group buttons">
                                        <button type="submit" id="btnSubmit" class="app-form-button">ยืนยัน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
<?php
}
?>
<!-- The Modal save_Image -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="closetimes">
            <i class="fas fa-times"></i>
        </div>
        <div class="box">
            <form action="<?php echo site_url('Customer_Con/save_Image'); ?>" method="POST" enctype="multipart/form-data">
                <div class="img">
                    <div class="in-img">
                        <img class="imgShow" id="imgShow" src="" height="200" alt="Image preview..." onerror="this.src='<?php echo base_url(); ?>img/upload1.png'">
                    </div>
                </div>
                <div class="input">
                    <input style="display: none;" type="text" name="C_ID" value="<?php echo $row->C_ID; ?>" />
                    <input class="inputImg" onchange="previewFile()" type="file" name="C_Img" value="<?php echo $row->C_Img ?>" accept="image/*" hidden>
                </div>
                <div class="submit">
                    <button type="submit" name="btnUpload" class="save">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal save_Image -->