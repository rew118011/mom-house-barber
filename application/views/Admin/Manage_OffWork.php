<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main>
  <div class="recent-grid manage-off-work">
    <div class="projects">
      <div class="card">
        <div class="card-header">
          <h3>ลาหยุด / ช่าง</h3>
        </div>

        <div class="card-body">
          <div class="card">



            <div class="cards">
              <?php
              foreach ($BARBER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
              ?>
                <div class="barber">
                  <form action="<?php echo site_url('OffWork_Con/insert_offWork') ?>" class="login" method="post">
                    <div class="dataBarber">
                      <input class="B_ID" type="text" name="B_ID" value="<?php echo $row->B_ID; ?>" hidden />
                      <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                      <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                    </div>
                    <div class="field">
                      <input class="dropdown-barber" type="date" id="selectDate" name="Date">
                    </div>
                    <div class="field btn">
                      <input class="submitOffWork" type="submit" name="btnOffWork" value="ยืนยัน">
                    </div>
                  </form>
                </div>
              <?php
              }
              ?>





            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="recent-grid manage-off-work">
    <div class="projects">
      <div class="card">
        <div class="card-header">
          <h3>วันลาหยุดของช่าง</h3>
        </div>

        <div class="card-body">
          <div class="card">

            <div class="cards">
              <?php
              foreach ($OFFWORK as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
              ?>
                <div class="barber">
                  <form class="login" method="post">
                    <div class="dataBarber">
                      <input class="B_ID" type="text" name="B_ID" value="<?php echo $row->B_ID; ?>" hidden />
                      <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                      <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>">
                        ช่าง<?php echo $row->B_Nickname; ?>
                      </a>
                    </div>

                    <div class="field btn">
                      <a href="<?php echo site_url('Admin_Con/getBarberOffWork/') . $row->B_ID; ?>">
                        <i class="fas fa-calendar-times"></i> ดูวันหยุดทั้งหมด
                      </a>
                    </div>
                      <div class="field">
                        <div class="card-single">
                          <div>
                            <span><i class="las la-calendar-day"></i><?php echo $row->Date; ?></span>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
              <?php
              }
              ?>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  </div>
</main>
</div>