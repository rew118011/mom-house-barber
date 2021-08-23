<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main>
    <div class="recent-grid add-hairstyle">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>เพิ่มทรงผม</h3>
                </div>

                <div class="card-body">
                    <form action="<?php echo site_url('Admin_Con/save_Image') ?>" method="POST" enctype="multipart/form-data">
                        <div class="cards">
                            <div class="card-single">
                                <div class="image">
                                    <input type="file" name="userfile[]" multiple="multiple">
                                    <img src="<?php echo base_url(); ?>img/upload1.png" alt="H_Img1">
                                </div>
                            </div>

                            <div class="card-single">
                                <div class="image">
                                    <input type="file" name="userfile[]" multiple="multiple">
                                    <img src="<?php echo base_url(); ?>img/upload1.png" alt="H_Img2">
                                </div>
                            </div>

                            <div class="card-single">
                                <div class="image">
                                    <input type="file" name="userfile[]" multiple="multiple">
                                    <img src="<?php echo base_url(); ?>img/upload1.png" alt="H_Img3">
                                </div>
                            </div>

                            <div class="card-single">
                                <div class="image">
                                    <input type="file" name="userfile[]" multiple="multiple">
                                    <img src="<?php echo base_url(); ?>img/upload1.png" alt="H_Img4">
                                </div>
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
                                    <input type="text" name="H_Detail" placeholder="รายละเอียดทรงผม" required>
                                </div>
                            </div>
                        </div>
                        <div class="submit">
                            <input style="display: none;" type="text" name="Price" value="150" required>
                            <button type="submit" name="btnUpload" class="save">ยืนยัน</button>
                        </div>
                    </form>
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
                        <a href="#">
                            <button>
                                <i class="las la-plus-circle"></i> เพิ่มทรงผม
                                <span class="las la-arrow-right"></span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
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
                                    <a class="queue-edit" href="<?php echo site_url('UserManagement_Con/admin_editbarber/'); ?>"><i class="fas fa-pen-square"></i></a>
                                    <a class="queue-cancel" href="<?php echo site_url('Hair_Con/del_hair_style/' . $row['H_ID']); ?>"><i class="fas fa-window-close"></i></a>
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