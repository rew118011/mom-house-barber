<div class="container_Add_portfolio">
    <div class="teat_Add_portfolio">เพิ่มผลงาน</div>
    <div class="Add_portfolio">
        <div class="Add_icon">
            <div class="add_img">
                <div class="add_imge">
                    <img class="add_imge1" src="" alt="" onerror="this.src='<?php echo base_url(); ?>img/addPhoto2.png'" />
                    <input class="inputImg1" onchange="previewFile()" type="file" name="C_Img" value="" accept="image/*" hidden>
                </div>
                <div class="add_imge">
                    <img class="add_imge" src="" alt="Image preview..." onerror="this.src='<?php echo base_url(); ?>img/addPhoto2.png'">
                    <input class="inputImg" onchange="previewFile()" type="file" name="C_Img" value="" accept="image/*" hidden>
                   
                </div>
                <div class="add_imge">
                <img class="add_imge2" src="" alt="Image preview..." onerror="this.src='<?php echo base_url(); ?>img/addPhoto2.png'">
                    
                </div>
                <div class="add_imge">
                <img class="add_imge2" src="" alt="Image preview..." onerror="this.src='<?php echo base_url(); ?>img/addPhoto2.png'">
                    
                </div>
            </div>

            <div class="form-group">
                <label class="textAreaRemark" for="textAreaRemark">Caption</label><br>
                <textarea class="form-control" name="remark" id="textAreaRemark" rows="2" placeholder="Detail..."></textarea>
                <br><br>
                <button class="add_btn" type="submit">Save</button>
            </div>

        </div>
    </div>
</div>

<script>
    const dropArea = document.querySelector(".Add_icon"),
        input = dropArea.querySelector(".inputImg1"),
        img = dropArea.querySelector(".add_imge1");
    img.onclick = () => {
        input.click();
    }

    function previewFile() {
        const preview = document.querySelector('.add_imge1');
        const file = document.querySelector('.inputImg1').files[0];
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