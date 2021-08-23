<?php
foreach ($BARBER as $row) {
?>
    <div class="container_add_portfolio">
        <div class="add_portfolio">
            <div class="text-title">
                เพิ่มผลงาน
            </div>
            <form action="save_Image" method="POST" enctype="multipart/form-data">
            <div class="add_file">
                    <div class="add_img">
                        <div class="add_imges">
                            <input style="display: none;" type="text" name="B_ID" value="<?php echo $row->B_ID; ?>" />
                            <img class="add_imge" src="" alt="" onerror="this.src='<?php echo base_url(); ?>img/upload1.png'" />
                            <input class="inputImg" onchange="previewFile()" type="file" name="C_Img" value="" accept="image/*" hidden>
                        </div>
                    </div>


                    <div class="buttons">
                        <button class="addPhotos" type="submit">โพสต์</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
<script>
    const dropArea = document.querySelector(".add_file"),
        input = dropArea.querySelector(".inputImg"),
        img = dropArea.querySelector(".add_imge");
    img.onclick = () => {
        input.click();
    }

    function previewFile() {
        const preview = document.querySelector('.add_imge');
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
</script>