<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>

            Menu
        </h2>

        <div class="search-wrapper">
            <span class="las la-search"></span>
            <input type="search" placeholder="Search here" />
        </div>

        <div class="user-wrapper">
            <img src="<?php echo base_url(); ?>/img/zbew.jpg" alt="">
            <div>
                <h4><?php echo $this->session->userdata('Username'); ?></h4>
                <small>ADMIN</small>
            </div>
        </div>
    </header>

    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <p>12 - 13</p>
                    <span>เดือน 8 ปี 2021</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-day"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>24 - 25</p>
                    <span>เดือน 9 ปี 2021</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-day"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>17</p>
                    <span>เดือน 11 ปี 2021</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-day"></i>
                    </span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <p>3 <strong>วัน</strong></p>
                    <span>วันปิดร้านทั้งหมด</span>
                </div>
                <div>
                    <span>
                        <i class="las la-calendar-times"></i>
                    </span>
                </div>
            </div>
        </div>

        

            <div class="recent-grid manage-hairstyle">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>ทรงผมที่แนะนำในร้าน</h3>
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