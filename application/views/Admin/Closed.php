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
        <div class="recent-grid closed">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="las la-calendar-times"></i> วันที่ร้านปิด</h3>
                    </div>

                    <div class="card-body">
                        <div class="cards">
                            <div class="card-single">
                                <div>
                                    <p>12</p>
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
                                    <p>24</p>
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

                            <div class="card-single">
                                <div>
                                    <p>12</p>
                                    <span>เดือน 3 ปี 2021</span>
                                </div>
                                <div>
                                    <span>
                                        <i class="las la-calendar-day"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <p>8</p>
                                    <span>เดือน 4 ปี 2021</span>
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
                                    <span>เดือน 4 ปี 2021</span>
                                </div>
                                <div>
                                    <span>
                                        <i class="las la-calendar-day"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <p>12</p>
                                    <span>เดือน 5 ปี 2021</span>
                                </div>
                                <div>
                                    <span>
                                        <i class="las la-calendar-day"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <p>8</p>
                                    <span>เดือน 6 ปี 2021</span>
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
                                    <span>เดือน 7 ปี 2021</span>
                                </div>
                                <div>
                                    <span>
                                        <i class="las la-calendar-day"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</main>
</div>