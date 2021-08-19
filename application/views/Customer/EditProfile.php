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
                                <img class="img_profile" id="myBtn1" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>">
                                <img class="imgEdit" id="myBtn" src="<?php echo base_url(); ?>img/up2.png">
                            </div>
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
                        <button type="submit" id="btnSubmit" onclick="pop()">ยืนยัน</button>
                    </div>
                </div>
            </div>
    </div>
<?php
        }
?>
</div>
</form>

<!-- The Modal save_Image -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="closetimes">&times;</span>
        <div class="box">
            <form action="save_Image" method="POST" enctype="multipart/form-data">
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

<!-- The Modal button-submit -->
<div id="box" class="popup2">
    <i class="fas fa-check-circle"></i>
    <h1>แก้ไขสำเร็จ</h1>
    <a class="close-box" onclick="pop()">Close</a>
</div>
<!-- End Modal button-submit -->

<!-- The Modal script-save_Image -->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn1 = document.getElementById("myBtn1");
    var btn = document.getElementById("myBtn");

    // Get the element that closes the modal
    var span = document.getElementsByClassName("closetimes")[0];

    // เมื่อคลิกที่ปุ่ม ให้เปิด modal
    btn1.onclick = function() {
        modal.style.display = "block";
    }
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // เมื่อคลิกที่ (x) ให้ปิด modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // เมื่อผู้ใช้คลิกที่ใดก็ได้นอก modal ให้ปิด
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // <!------ End Modal script-save_Image ------->

    //The Modal script-UpImage 
    const dropArea = document.querySelector(".modal"),
        input = dropArea.querySelector(".inputImg"),
        img = dropArea.querySelector(".imgShow");
    img.onclick = () => {
        input.click();
    }

    function previewFile() {
        const preview = document.querySelector('.imgShow');
        const file = document.querySelector('.inputImg').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }


    document.getElementById("btnSubmit").addEventListener("click", function() {
        document.querySelector(".popup2").style.display = "block";
    })

    $(document).ready(function() {
        $(".inputImg").click(function() {
            $(".img").addClass("noneBorder");
        });
    });
</script>
<!-- End Modal script-UpImage -->