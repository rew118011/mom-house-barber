<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main>
    <div class="recent-grid add-hairstyle">
        <div class="projects">
            <div class="closeHair">
                <i class="fas fa-times"></i>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>เพิ่มทรงผม</h3>
                </div>

                <div class="card-body" id="card-AddHairStyle">
                    <form action="<?php echo site_url('Admin_Con/save_Image') ?>" method="POST" enctype="multipart/form-data">
                        <div class="cards">

                            <div class="box-img">
                                <div class="card-single">
                                    <div class="image">
                                        <input class="inputH_Img1 inputH_Img" onchange="previewFile1()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="addH_Img1 addH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img1">
                                    </div>
                                </div>
                                <input type="text" name="H_Shooting1" placeholder="มุมถ่าย" required>
                            </div>

                            <div class="box-img">
                                <div class="card-single">
                                    <div class="image">
                                        <input class="inputH_Img2 inputH_Img" onchange="previewFile2()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="addH_Img2 addH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img2">
                                    </div>
                                </div>
                                <input type="text" name="H_Shooting2" placeholder="มุมถ่าย" required>
                            </div>

                            <div class="box-img">
                                <div class="card-single">
                                    <div class="image">
                                        <input class="inputH_Img3 inputH_Img" onchange="previewFile3()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="addH_Img3 addH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img3">
                                    </div>
                                </div>
                                <input type="text" name="H_Shooting3" placeholder="มุมถ่าย" required>
                            </div>

                            <div class="box-img">
                                <div class="card-single">
                                    <div class="image">
                                        <input class="inputH_Img4 inputH_Img" onchange="previewFile4()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="addH_Img4 addH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img4">
                                    </div>
                                </div>
                                <input type="text" name="H_Shooting4" placeholder="มุมถ่าย" required>
                            </div>

                        </div>

                        <div class="content">
                            <div class="item">
                                <div class="field">
                                    <input type="text" name="H_Name" placeholder="ชื่อทรงผม" required>
                                </div>
                            </div>
                            <div class="item">
                                <div class="field">
                                    <textarea class="Detail" type="text" name="H_Detail" placeholder="รายละเอียดทรงผม" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit">
                            <input style="display: none;" type="text" name="Price" value="150" required>
                            <button type="submit" name="btnUpload" class="save">ยืนยัน</button>
                        </div>
                    </form>
                    <!-- The Modal Hairstyle -->

                    <!-- End Modal popup -->
                </div>
            </div>
        </div>
    </div>
    <div class="recent-grid edit-hairstyle">
        <div class="projects">
            <div class="closeEdit">
                <i class="fas fa-times"></i>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>แก้ไขทรงผม</h3>
                </div>

                <div class="card-body" id="card-SetHairStyle">
                    <form action="<?php echo site_url('Admin_Con/saveHairStyle') ?>" method="POST" enctype="multipart/form-data">
                        <div class="cards">
                        
                            <div class="box-img box-img1">
                                <div class="card-single">
                                    <div class="image image1">
                                        <input class="inputSetH_Img1 inputSetH_Img" onchange="previewFileSet1()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="SetH_Img1 SetH_Img" src="<?php echo base_url(); ?>img/upload1.png">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="box-img box-img2">
                                <div class="card-single">
                                    <div class="image image2">
                                        <input class="inputSetH_Img2 inputSetH_Img" onchange="previewFileSet2()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="SetH_Img2 SetH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img2">
                                    </div>
                                </div>
                                <input class="H_Shooting H_Shooting2" type="text" name="H_Shooting2" placeholder="มุมถ่าย" required>
                            </div>

                            <div class="box-img box-img3">
                                <div class="card-single">
                                    <div class="image image3">
                                        <input class="inputSetH_Img3 inputSetH_Img" onchange="previewFileSet3()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="SetH_Img3 SetH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img3">
                                    </div>
                                </div>
                                <input class="H_Shooting H_Shooting3" type="text" name="H_Shooting3" placeholder="มุมถ่าย" required>
                            </div>

                            <div class="box-img box-img4">
                                <div class="card-single">
                                    <div class="image image4">
                                        <input class="inpuSettH_Img4 inputSetH_Img" onchange="previewFileSet4()" type="file" name="userfile[]" multiple="multiple" style="display: none;">
                                        <img class="SetH_Img4 SetH_Img" src="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" alt="H_Img4">
                                    </div>
                                </div>
                                <input class="H_Shooting H_Shooting4" type="text" name="H_Shooting4" placeholder="มุมถ่าย" required>
                            </div>

                        </div>

                        <div class="content">
                            <div class="item">
                                <div class="field field_Hname">
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="field field_Hdetail">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="submit submit_edit">
                            <button type="submit" name="btnUpload" class="save">ยืนยัน</button>
                        </div>
                    </form>
                    <!-- The Modal Hairstyle -->

                    <!-- End Modal popup -->
                </div>
            </div>
        </div>
    </div>
    <div class="recent-grid manage-hairstyle">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>ทรงผมที่แนะนำในร้าน</h3>
                    <div>
                        <a href="#" class="popupBtn">
                            <button>
                                <i class="las la-plus-circle"></i> เพิ่มทรงผม
                                <span class="las la-arrow-right"></span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body" id="manage-Hairstyle">
                    <?php
                    foreach ($HS->result_array() as $row) {
                    ?>
                        <div class="gallery-box">
                            <div class="item">
                                <div class="grid-img">
                                    <img src="<?php echo base_url(); ?>img/<?= $row['H_Img1']; ?>" alt="H_Img1" />
                                </div>
                                <div class="grid-img">
                                    <img src="<?php echo base_url(); ?>img/<?= $row['H_Img2']; ?>" alt="H_Img2" />
                                </div>
                                <div class="grid-img">
                                    <img src="<?php echo base_url(); ?>img/<?= $row['H_Img3']; ?>" alt="H_Img3" />
                                </div>
                                <div class="grid-img">
                                    <img src="<?php echo base_url(); ?>img/<?= $row['H_Img4']; ?>" alt="H_Img4" />
                                </div>
                            </div>
                            <div class="comment">
                                <p><?= $row['H_Name'] ?> : <span><?= $row['H_Detail'] ?></span></p>
                                <div class="menu">
                                    <input id="edit-Hairstyle" class="input<?= $row['H_ID']; ?> inputH" type="radio" name="H_ID" value="<?= $row['H_ID']; ?>">
                                    <span class="queue-edit btnEdit<?= $row['H_ID'] ?>"><i class="fas fa-pen-square"></i></span>
                                    <a class="queue-cancel" href="<?php echo site_url('Admin_Con/delete_Hairstyle/' . $row['H_ID']); ?>" onclick="return confirm('คุณต้องการลบทรงผมทรงนี้ใช่หรือไม ?');"><i class="fas fa-window-close"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

</main>

</div>
<script>
    document.querySelector(".popupBtn").addEventListener("click", function() {
        document.querySelector(".recent-grid.add-hairstyle").style.display = "grid";
    })
    // close popup hairstyle
    document.querySelector(".closeHair").addEventListener("click", function() {
        document.querySelector(".recent-grid.add-hairstyle").style.display = "none";
    })

    // count element in html
    var cardAddHairStyle = document.getElementById("card-AddHairStyle");
    var btnAddH_Img = cardAddHairStyle.getElementsByClassName("addH_Img");
    const btnH = "addH_Img";
    const inputH_Img = "inputH_Img";
    // console.log(btnAddH_Img.length);

    // loop query.selectorClassList
    for (let i = 1; i <= btnAddH_Img.length; i++) {
        // build variable document.querySelector input radio and btn class imgID
        const btnAddH_Img = document.querySelector(".addH_Img" + i);
        const inputAddH_Img = document.querySelector(".inputH_Img" + i);
        const btnSetH_Img = document.querySelector(".SetH_Img" + i);
        const inputSetH_Img = document.querySelector(".inputSetH_Img" + i);

        btnAddH_Img.onclick = () => {
            inputAddH_Img.click();
        }
        btnSetH_Img.onclick = () => {
            inputSetH_Img.click();
        }
    }
</script>
<script>
    var menuEdit = document.getElementById("manage-Hairstyle");
    var btnEdit = menuEdit.getElementsByClassName("queue-edit");

    // loop query.selectorClassList
    for (let i = 1; i <= btnEdit.length; i++) {
        document.querySelector(".btnEditH0000" + i).addEventListener("click", function() {
            document.querySelector(".recent-grid.edit-hairstyle").style.display = "flex";
        })
        const btnSet = document.querySelector(".btnEditH0000" + i);
        const inputID = document.querySelector(".inputH0000" + i);
        btnSet.onclick = () => {
            inputID.click();
        }
    }
    document.querySelector(".closeEdit").addEventListener("click", function() {
        document.querySelector(".recent-grid.edit-hairstyle").style.display = "none";
    })
</script>
<script>
    var cardSetHairStyle = document.getElementById("card-SetHairStyle");
    var boxImg = cardSetHairStyle.getElementsByClassName("box-img");
    const btnSetH = "SetH_Img";
    const inputSetH_Img = "inputSetH_Img";
    // console.log(boxImg.length + "boxImg");

    // loop query.selectorClassList
    for (let i = 1; i <= boxImg.length; i++) {
        // build variable document.querySelector input radio and btn class imgID
        const btnSetH_Img = document.querySelector(".SetH_Img" + i);
        const inputSetH_Img = document.querySelector(".inputSetH_Img" + i);

        console.log(btnSetH_Img);
        btnSetH_Img.onclick = () => {
            inputSetH_Img.click();
        }
    }
</script>
<!-- //preview image hairstyle -->
<script>
    function previewFile1() {
        const preview = document.querySelector('.addH_Img1');
        const file = document.querySelector('.inputH_Img1').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFile2() {
        const preview = document.querySelector('.addH_Img2');
        const file = document.querySelector('.inputH_Img2').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFile3() {
        const preview = document.querySelector('.addH_Img3');
        const file = document.querySelector('.inputH_Img3').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFile4() {
        const preview = document.querySelector('.addH_Img4');
        const file = document.querySelector('.inputH_Img4').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFileSet1() {
        const preview = document.querySelector('.SetH_Img1');
        const file = document.querySelector('.inputSetH_Img1').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFileSet2() {
        const preview = document.querySelector('.SetH_Img2');
        const file = document.querySelector('.inputSetH_Img2').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFileSet3() {
        const preview = document.querySelector('.SetH_Img3');
        const file = document.querySelector('.inputSetH_Img3').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewFileSet4() {
        const preview = document.querySelector('.SetH_Img4');
        const file = document.querySelector('.inputSetH_Img4').files[0];
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
<!-- jquery ajax hair style -->
<script>
  $(document).ready(function() {
    $('input[id="edit-Hairstyle"]').change(function() {
      var H_ID = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>index.php/Customer_Con/popupHair",
        method: "POST",
        dataType: 'json',
        data: {
          H_ID: H_ID
        },

        success: function(response) {
          $('.box-img1').find('.H_Shooting1').remove();
          $('.box-img2').find('.H_Shooting2').remove();
          $('.box-img3').find('.H_Shooting3').remove();
          $('.box-img4').find('.H_Shooting4').remove();
          $('.field_Hname').find('.H_Name').remove();
          $('.field_Hdetail').find('.Detail').remove();
        //   $('.image1').find('.SetH_Img1').remove();

          $.each(response, function(index, data) {
            $('.box-img1').append('<input class="H_Shooting H_Shooting1" type="text" name="H_Shooting1" value="' + data['H_Shooting1'] + '">');
            $('.box-img2').append('<input class="H_Shooting H_Shooting2" type="text" name="H_Shooting2" value="' + data['H_Shooting2'] + '">');
            $('.box-img3').append('<input class="H_Shooting H_Shooting3" type="text" name="H_Shooting3" value="' + data['H_Shooting3'] + '">');
            $('.box-img4').append('<input class="H_Shooting H_Shooting4" type="text" name="H_Shooting4" value="' + data['H_Shooting4'] + '">');
            $('.field_Hname').append('<input class="H_Name" type="text" name="H_Name" value="' + data['H_Name'] + '">');
            $('.field_Hdetail').append('<textarea class="Detail" type="text" name="H_Detail">' + data['H_Detail'] + '</textarea>');
            $('.submit_edit').append('<input style="display: none;" class="H_ID" type="text" name="H_ID" value="' + data['H_ID'] + '">');
            // $('.image1').append('');
            
          });
        }
      });
    });
  });
</script>
<!-- jquery ajax hair style -->
