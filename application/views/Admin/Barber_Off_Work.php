<main>
  <div class="cards barber-off-work">
    <div class="card-single">
      <div>
        <p><?php echo $EVERALL; ?> <strong>วัน</strong></p>
        <span>เคยลาทั้งหมด</span>
      </div>
      <div>
        <span>
          <i class="las la-calendar-day"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p><?php echo $LASTEDMONTH; ?> <strong>วัน</strong></p>
        <span>ลาเดือนที่แล้ว</span>
      </div>
      <div>
        <span>
          <i class="las la-calendar-week"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p><?php echo $MONTH; ?> <strong>วัน</strong></p>
        <span>ลาเดือนนี้</span>
      </div>
      <div>
        <span>
          <i class="las la-calendar-week"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p><?php echo $ALL; ?> <strong>วัน</strong></p>
        <span>ลาทั้งหมด</span>
      </div>
      <div>
        <span>
          <i class="las la-calendar-day"></i>
        </span>
      </div>
    </div>
  </div>


  <div class="recent-grid barber-off-work">
    <div class="projects">
      <div class="card">
        <div class="card-header">
          <h3>วันลาหยุดของ
            <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $ID->B_ID; ?>">
              <span class="span">ช่าง<?php echo $ID->B_Nickname; ?></span>
            </a>
          </h3>
          <div class="img-barber-profile-small">
            <img src="<?php echo base_url(); ?>img/<?php echo $ID->B_Img; ?>" alt="BarberProfile">
          </div>
        </div>
        <div class="card-header title">
          <h3>ตารางการลา</h3>
        </div>

        <div class="card-body">
          <div class="cards">

            <?php foreach ($OFFWORK as $row) { ?>
              <div class="card-single">
                <div>
                  <span><i class="las la-calendar-day"></i> <?php echo $row->Date;?></span>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>

        <div class="card-header title">
          <h3>ประวัติการลา</h3>
        </div>

        <div class="card-body">
          <div class="cards">

            <?php foreach ($OFFWORKHISTORY as $row) { ?>
              <div class="card-single">
                <div>
                  <span><i class="las la-calendar-day"></i> <?php echo $row->Date;?></span>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>


      </div>
    </div>
  </div>
</main>
</div>

</div>