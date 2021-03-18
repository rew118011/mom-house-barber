<!--wrapper start-->
<div class="wrapper">
	<!--header menu start-->
	<div class="header">
		<div class="header-menu">
			<div class="title"><a href="<?php echo site_url('Login_Con/admin_page'); ?>">MOM HOUSE <span>BARBER</span></a></div>
			<div class="sidebar-btn">
				<i class="fas fa-bars"></i>
			</div>
			<ul>
				<li><a href="#"><i class="fas fa-search"></i></a></li>
				<li><a href="#"><i class="fas fa-bell"></i></a></li>
				<li><a href="<?php echo site_url('Login_Con/logout'); ?>"><i class="fas fa-power-off"></i></a></li>
			</ul>
		</div>
	</div>
	<!--header menu end-->
	<!--sidebar start-->
	<div class="sidebar">
		<div class="sidebar-menu">
			<div class="profile">
				<img src="1.jpg" alt="">
				<p><?php echo $this->session->userdata('Username'); ?></p>
			</div>
			<li class="item" id="bookig">
				<a href="<?php echo site_url('Login_Con/admin_page'); ?>" class="menu-btn">
					<i class="fas fa-home"></i><span>หน้าแรก</span>
				</a>
			</li>
			<li class="item" id="profile">
				<a href="#profile" class="menu-btn">
					<i class="fas fa-calendar-alt"></i><span>จัดการปฏิทิน <i class="fas fa-chevron-down drop-down"></i></span>
				</a>
				<div class="sub-menu">
					<a href="<?php echo site_url('Admin_Con/admin_seebookingqueueall'); ?>"><i class="fas fa-image"></i><span>ปิดร้าน</span></a>
					<a href="<?php echo site_url('Admin_Con/admin_seebookingqueueall'); ?>"><i class="fas fa-address-card"></i><span>จองคิวเพิ่ม</span></a>
				</div>
			</li>
			<li class="item" id="messages">
				<a href="#messages" class="menu-btn">
					<i class="fas fa-cut"></i><span>จัดการช่าง <i class="fas fa-chevron-down drop-down"></i></span>
				</a>
				<div class="sub-menu">
					<a href="<?php echo site_url('Admin_Con/admin_seebarberall'); ?>"><i class="fas fa-exclamation-circle"></i><span>ช่างทั้งหมด</span></a>
					<a href="<?php echo site_url('Admin_Con/admin_seebarberall'); ?>"><i class="fas fa-envelope"></i><span>ลาหยุดช่าง</span></a>
					<a href="<?php echo site_url('Admin_Con/admin_seebarberall'); ?>"><i class="fas fa-envelope-square"></i><span>ปฏิทินวันหยุด</span></a>
				</div>
			</li>
			<li class="item" id="settings">
				<a href="#settings" class="menu-btn">
					<i class="fas fa-users"></i><span>จัดการลูกค้า<i class="fas fa-chevron-down drop-down"></i></span>
				</a>
				<div class="sub-menu">
					<a href="<?php echo site_url('Admin_Con/admin_seecustomerall'); ?>"><i class="fas fa-lock"></i><span>ลูกค้าทั้งหมด</span></a>
					<a href="<?php echo site_url('Admin_Con/admin_seecustomerall'); ?>"><i class="fas fa-language"></i><span>ประวัติการจอง</span></a>
				</div>
			</li>
			<li class="item" id="hair">
				<a href="#hair" class="menu-btn">
					<i class="fab fa-snapchat-ghost"></i><span>จัดการทรงผม<i class="fas fa-chevron-down drop-down"></i></span>
				</a>
				<div class="sub-menu">
					<a href="#"><i class="fas fa-envelope"></i><span>เพิ่มทรงผม</span></a>
					<a href="#"><i class="fas fa-envelope-square"></i><span>ดูทรงผม</span></a>
					<a href="#"><i class="fas fa-exclamation-circle"></i><span>แก้ไขทรงผม </span></a>
				</div>
			</li>
		</div>
		<!--sidebar end-->
	</div>
	<!--wrapper end-->

	<script type="text/javascript">
		$(document).ready(function() {
			$(".sidebar-btn").click(function() {
				$(".wrapper").toggleClass("collapse");
			});
		});
	</script>