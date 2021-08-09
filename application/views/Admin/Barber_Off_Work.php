<main>
  <div class="cards barber-off-work">
    <div class="card-single">
      <div>
        <p>13 <strong>วัน</strong></p>
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
        <p>1 <strong>วัน</strong></p>
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
        <p>2 <strong>วัน</strong></p>
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
        <p>5 <strong>วัน</strong></p>
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
          <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $ID->B_Img; ?>" />
        </div>
        <div class="card-header title">
          <h3>ตารางการลา</h3>
        </div>

        <div class="card-body">
          <div class="cards">

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 22 / 6 / 2021</span>
              </div>
            </div>

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 13 / 7 / 2021</span>
              </div>
            </div>

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 29 / 8 / 2021</span>
              </div>
            </div>

          </div>
        </div>

        <div class="card-header title">
          <h3>ประวัติการลา</h3>
        </div>

        <div class="card-body">
          <div class="cards">

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 27 / 5 / 2021</span>
              </div>
            </div>

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 1 / 5 / 2021</span>
              </div>
            </div>

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 12 / 4 / 2021</span>
              </div>
            </div>

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 1 / 3 / 2021</span>
              </div>
            </div>

            <div class="card-single">
              <div>
                <span><i class="las la-calendar-day"></i> 29 / 1 / 2021</span>
              </div>
            </div>

          </div>
        </div>


      </div>
    </div>
  </div>
</main>
</div>

</div>