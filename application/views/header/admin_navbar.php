<input type="checkbox" id="nav-toggle">
<div class="slidebar">
    <div class="slidebar-brand">
        <span>
            <a href="<?php echo site_url('Login_Con/admin_page'); ?>">
                <h2><span><i class="las la-cut"></i></span> <span><p>Mom House Barber</p></span></h2>
            </a>
        </span>
    </div>

    <div class="slidebar-menu">
        <ul>
            <li>
                <a href="<?php echo site_url('Login_Con/admin_page'); ?>">
                    <span class="las la-igloo"></span>
                    <span class="span-title">หน้าแรก</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('Admin_Con/admin_seebookingqueueall'); ?>">
                    <span class="las la-users"></span>
                    <span class="span-title">จัดการปฏิทิน</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('Admin_Con/admin_seebarberall'); ?>">
                    <span class="las la-clipboard-list"></span>
                    <span class="span-title">จัดการช่าง</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('Admin_Con/admin_seecustomerall'); ?>">
                    <span class="las la-shopping-bag"></span>
                    <span class="span-title">จัดการลูกค้า</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="las la-receipt"></span>
                    <span class="span-title">จัดการทรงผม</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('Login_Con/logout'); ?>">
                    <span><i class="las la-sign-out-alt"></i></span>
                    <span class="span-title">ออกจากระบบ</span>
                </a>
            </li>

        </ul>
    </div>
</div>

<script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength = menuItem.length
        for (let i = 0; i<menuLength; i++){
            if(menuItem[i].href === currentLocation){
                menuItem[i].className = "active"
            }
        }
    </script>