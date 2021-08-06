<div class="main-content barber-off-work">
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
      <?php
      foreach ($BARBER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
      ?>
        <div class="barber-profile">
          <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>" class="menu-btn">
            <div>
              <p><?php echo $row->B_Nickname; ?></p>
              <span class="count-off-work">หยุดไปแล้ว 3 ครั้ง</span>
              <br>
              <span class="date-off-work">04 / 09 / 2021</span>
            </div>
            <div class="img">
              <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
            </div>
          </a>
        </div>
      <?php
      }
      ?>
    </div>

    <div class="recent-grid barber-off-work">
      <div class="projects">
        <?php
        foreach ($BARBER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
        ?>
          <div class="card">
            <div class="card-header barber-income">
              <h3>วันลาหยุดของ<a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>"><span class="span">ช่าง<?php echo $row->B_Nickname; ?></span></a></h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="barber-queue">
                  <thead>
                    <tr class="tr-barber-queue">
                      <td></td>
                      <td class="th-barber-queue">รูป</td>
                      <td class="th-barber-queue">ชื่อเล่น</td>
                      <td class="th-barber-queue">ชื่อจริง</td>
                      <td class="th-barber-queue">นามสกุล</td>
                      <td class="th-barber-queue">เบอร์</td>
                      <td class="th-barber-queue"><span>เริ่มหยุด</span> - <span>สิ้นสุด</span></td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="tr-barber-queue">
                      <td></td>
                      <td class="td-barber-queue">
                        <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                      </td>
                      <td class="td-barber-queue"><a href="#"><?php echo $row->B_Nickname; ?></a></td>
                      <td class="td-barber-queue"><?php echo $row->B_Name; ?></td>
                      <td class="td-barber-queue"><?php echo $row->B_Lname; ?></td>
                      <td class="td-barber-queue"><?php echo $row->B_Phone; ?></td>
                      <td class="td-barber-queue">
                        <span class="off-work">
                          <span class=" start">09 / 08 / 2021</span>
                          <i class="las la-arrow-right"></i>
                          <span class=" end">10 / 08 / 2021</span>
                        </span>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card-header barber-income">
              <h3>ประวัติการลาของ<a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>"><span class="span">ช่าง<?php echo $row->B_Nickname; ?></span></a></h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="barber-queue">
                  <thead>
                    <tr class="tr-barber-queue">
                      <td></td>
                      <td class="th-barber-queue">รูป</td>
                      <td class="th-barber-queue">ชื่อเล่น</td>
                      <td class="th-barber-queue">ชื่อจริง</td>
                      <td class="th-barber-queue">นามสกุล</td>
                      <td class="th-barber-queue">เบอร์</td>
                      <td class="th-barber-queue"><span>เริ่มหยุด</span> - <span>สิ้นสุด</span></td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="tr-barber-queue">
                      <td></td>
                      <td class="td-barber-queue">
                        <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                      </td>
                      <td class="td-barber-queue"><a href="#"><?php echo $row->B_Nickname; ?></a></td>
                      <td class="td-barber-queue"><?php echo $row->B_Name; ?></td>
                      <td class="td-barber-queue"><?php echo $row->B_Lname; ?></td>
                      <td class="td-barber-queue"><?php echo $row->B_Phone; ?></td>
                      <td class="td-barber-queue">
                        <span class="off-work">
                          <span class=" start">09 / 08 / 2021</span>
                          <i class="las la-arrow-right"></i>
                          <span class=" end">10 / 08 / 2021</span>
                        </span>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>

    </div>
</div>
</main>
</div>

