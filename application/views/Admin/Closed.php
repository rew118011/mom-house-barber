<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main>
    <div class="recent-grid closed">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3><i class="las la-calendar-times"></i> วันที่ร้านปิด</h3>
                </div>

                <div class="card-body">
                    <div class="cards">
                        <?php foreach ($CLOSEALL as $row) { ?>
                            <div class="card-single">
                                <div>
                                    <p>12</p>
                                    <span><?php echo $row->OB_DATE ?></span>
                                </div>
                                <div>
                                    <span>
                                        <i class="las la-calendar-day"></i>
                                    </span>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="recent-grid closed">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3><i class="las la-calendar-times"></i> วันที่ร้านเคยปิด</h3>
                </div>

                <div class="card-body">
                    <div class="cards">

                        <?php foreach ($CLOSEHISTORY as $row) { ?>
                            <div class="card-single">
                                <div>
                                    <p>12</p>
                                    <span><?php echo $row->OB_DATE ?></span>
                                </div>
                                <div>
                                    <span>
                                        <i class="las la-calendar-day"></i>
                                    </span>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</div>