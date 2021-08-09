<main>
  <div class="cards">
    <div class="card-single">
      <div>
        <p>292 <strong>คน</strong></p>
        <span>ลูกค้าทั้งหมด</span>
      </div>
      <div>
        <span>
          <i class="las la-users"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p>256 <strong>คน</strong></p>
        <span>ลูกค้าเพศชาย</span>
      </div>
      <div>
        <span>
          <i class="las la-male"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p>36 <strong>คน</strong></p>
        <span>ลูกค้าเพศหญิง</span>
      </div>
      <div>
        <span>
          <i class="las la-female"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p>?????? <strong>?</strong></p>
        <span>????????????</span>
      </div>
      <div>
        <span>
          <i class="las la-coins"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="recent-grid barber-income">
    <div class="projects">
      <div class="card">
        <div class="card-header">
          <h3>ลูกค้าทั้งหมดที่เป็นสมาชิกทั้งหมด</h3>
          <div class="search-wrapper">
            <span class="las la-search"></span>
            <input type="search" placeholder="ค้นหาที่นี่" />
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="barber-queue">
              <thead>
                <tr class="tr-barber-queue">
                  <td></td>
                  <td class="th-barber-queue">รูป</td>
                  <td class="th-barber-queue">Username</td>
                  <td class="th-barber-queue">ชื่อเล่น</td>
                  <td class="th-barber-queue">ชื่อจริง</td>
                  <td class="th-barber-queue">นามสกุล</td>
                  <td class="th-barber-queue">เพศ</td>
                  <td class="th-barber-queue">เบอร์</td>
                  <td class="th-barber-queue">Facebook</td>
                  <td class="th-barber-queue">จำนวนการตัด</td>
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
                    <td class="td-barber-queue">
                      <a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>"><?php echo $row->Username; ?></a>
                    </td>
                    <td class="td-barber-queue"><?php echo $row->C_Nickname; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Name; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Lname; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Sex; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Facebook; ?></td>
                    <td class="td-barber-queue">2 ครั้ง</td>
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