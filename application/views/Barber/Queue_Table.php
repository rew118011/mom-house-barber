<!--   #posts start -->
<div class="posts queue">
  <!-- .post start -->
  <div class="container queue">
    <div class="text-title">
      ตารางคิวที่รอตัด / วันนี้
    </div>
    <?php
    foreach ($BOOKING as $row) {
    ?>
      <div class="item queue">
        <div class="content Slot_time_<?php echo $row->ST_ID; ?>" id="<?php echo $row->BK_ID; ?>">
          <div class="card">
            <div class="firstinfo">
              <a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>">
                <img src="<?php echo base_url(); ?>img/<?php echo $row->C_Img; ?>" alt="" />
              </a>
              <div class="profileinfo">
                <div class="date">
                  <tr id="<?php echo $row->BK_ID; ?>" class="tr-barber-queue">
                    <p><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></p>
                    <p><?php echo $row->ST_Time; ?></p>
                </div>
                <div class="data">
                  <a href="<?php echo site_url('Barber_Con/getCustomerProfile/') . $row->C_ID; ?>">ชื่อเล่น : <?php echo $row->C_Nickname; ?></a>
                  <p value="<?php echo $row->Q_ID; ?>"><i class="far fa-clock"></i> <?php echo $row->Q_Status; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="badgescard">
            <div class="phone">
              <i class="fas fa-mobile-alt"></i><span><?php echo $row->C_Phone; ?></span>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <!-- .post finish -->
</div>
<!--   #posts finish -->