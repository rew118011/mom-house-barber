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
          <p>256 <strong>คน</strong></p>
          <span>จำนวนการตัด</span>
        </div>
        <div>
          <span>
            <i class="las la-users"></i>
          </span>
        </div>
      </div>

      <div class="card-single">
        <div>
          <p>30 <strong>%</strong></p>
          <span>เปอร์เซ็นต์</span>
        </div>
        <div>
          <span>
            <i class="las la-percent"></i>
          </span>
        </div>
      </div>

      <div class="card-single">
        <div>
          <p>3000 <strong>฿</strong></p>
          <span>เงินเดือน</span>
        </div>
        <div>
          <span>
            <i class="las la-coins"></i>
          </span>
        </div>
      </div>

      <div class="card-single">
        <div>
          <p>14520 <strong>฿</strong></p>
          <span>รายได้รวม</span>
        </div>
        <div>
          <span>
            <i class="las la-receipt"></i>
          </span>
        </div>
      </div>
    </div>

    <div class="recent-grid barber-income">
      <div class="projects">
        <div class="card">
          <div class="card-header barber-income">
            <h3>รายละเอียดการตัดผมของ<span class="span">ช่างโนช</span>&nbsp;&nbsp;</h3>
            <img class="img-barber-profile-small" src="<?php echo base_url(); ?>img/baberNoch.jpg" alt="BarberProfile">
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
                    <td class="th-barber-queue">วันที่</td>
                    <td class="th-barber-queue">เวลา</td>
                    <td class="th-barber-queue">ราคา</td>
                    <td></td>
                  </tr>
                </thead>
                <?php
                foreach ($CUSTOMER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
                ?>
                  <tbody>
                    <tr class="tr-barber-queue">
                      <td></td>
                      <td class="td-barber-queue">
                        <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" />
                      </td>
                      <td class="td-barber-queue"><a href="#"><?php echo $row->C_Nickname; ?></a></td>
                      <td class="td-barber-queue"><?php echo $row->C_Name; ?></td>
                      <td class="td-barber-queue"><?php echo $row->C_Lname; ?></td>
                      <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                      <td class="td-barber-queue">09 / 06 / 2564</td>
                      <td class="td-barber-queue">12:00 - 13:00</td>
                      <td class="td-barber-queue">150 ฿</td>
                      <td></td>
                    </tr>
                  </tbody>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
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