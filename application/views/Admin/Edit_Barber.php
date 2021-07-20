<?php
/*
foreach ($BARBER as $row) {
?>

<?php echo form_open('UserManagement_Con/save_barber');
    echo form_hidden('B_ID', set_value('B_ID', $row->B_ID));

    echo form_label('ชื่อ', 'B_Name') . br(1);
    echo form_input('B_Name', set_value('B_Lname', $row->B_Name)) . br(1);

    echo form_label('นามสกุล', 'B_Lname') . br(1);
    echo form_input('B_Lname', set_value('B_Lname', $row->B_Lname)) . br(1);

    echo form_label('เพศ', 'B_Sex') . br(1);
    echo form_input('B_Sex', set_value('B_Lname', $row->B_Sex)) . br(1);

    echo form_label('เบอร์โทร', 'B_Phone') . br(1);
    echo form_input('B_Phone', set_value('B_Phone', $row->B_Phone)) . br(1);

    echo form_label('ที่อยู่', 'B_Address') . br(1);
    echo form_input('B_Address', set_value('B_Address', $row->B_Address)) . br(1);

    echo form_submit('btnSave', 'บันทึก');
    echo form_close();
}
*/
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

        <div class="recent-grid create-barber">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3>เพิ่มช่างตัดผม</h3>
                    </div>
                    <?php
                    foreach ($BARBER as $row) {
                    ?>
                        <form action="http://localhost/Mom_House_Barber/index.php/UserManagement_Con/save_barber" method="post">
                            <div class="card-body-create-barber">
                                <div class="card-header">
                                    <p>ข้อมูลการผู้ใช้</p>
                                </div>
                                <div class="flexbox">
                                    <div class="item">
                                        <div class="field flex">
                                            <img class="img-barber-queue" name="B_Img" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                                            <p>อัปโหลดภาพ</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="field">
                                            <input type="text" name="B_ID" value="<?php echo $row->B_ID; ?>" readonly />
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
                                            <input type="text" name="B_Name" value="<?php echo $row->B_Name; ?>" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="field">
                                            <input type="text" name="B_Lname" value="<?php echo $row->B_Lname; ?>" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="field">
                                            <input type="text" name="B_Nickname" value="<?php echo $row->B_Nickname; ?>" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="field">
                                            <input type="text" name="B_Sex" value="<?php echo $row->B_Sex; ?>" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="field">
                                            <input type="text" name="B_Phone" value="<?php echo $row->B_Phone; ?>" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="field">
                                            <textarea type="text" name="B_Address"><?php echo $row->B_Address; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field btn">
                                <input class="submit" type="submit" name="btnSave" value="ยืนยัน">
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

<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active"
        }
    }
</script>