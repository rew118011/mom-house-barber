<section class="profile_area">
    <div class="container">
        <div class="profile">
            <div class="profile_image">
                <img src="<?php echo base_url(); ?>img/<?= $ID->B_Img; ?>">
            </div>
            <div class="profile_info">
                <div class="profile_info--top">
                    <h1><?php echo $ID->Username; ?></h1>
                </div>
                <div class="profile_info--center">
                    <span>นาย <?php echo $ID->B_Name; ?> <?php echo $ID->B_Lname; ?></span>
                    <span>เพศ <?php echo $ID->B_Sex; ?></span>
                </div>
                <div class="profile_info--bottom">
                    <strong>☼" <?php echo $ID->B_Nickname; ?> "●</strong>
                    <br />
                    <p>
                        [ "ธนายุทธ" ชื่อที่เเม่กูตั้ง มันคู่มากับ "สามสังข์" ที่พ่อกูให้
                        ]<br />
                        ◐" 𝙸 𝚑𝚊𝚟𝚎 𝚊 𝚍𝚛𝚎𝚊𝚖. 𝙰𝚗𝚍 𝚒 𝚠𝚒𝚕𝚕 𝚍𝚘 𝚒𝚝 " ◑<br />
                    </p>
                    <p>
                        <a><i class="fas fa-mobile-alt"></i><?php echo $ID->B_Phone; ?></a>
                    </p>
                    <p>
                        <?php echo $ID->B_Address; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="profile_c_container_bottom">
    <div class="skill">
        <div class="skill-album">
            <ul>
                <li>
                    <div class="progress-circle progress-<?= $ID->B_Skill_Score1; ?>"><span><?= $ID->B_Skill_Score1; ?></span></div><span>ตัดซอย</span>
                </li>
                <li>
                    <div class="progress-circle progress-<?= $ID->B_Skill_Score2; ?>"><span><?= $ID->B_Skill_Score2; ?></span></div><span>ตัดมือ</span>
                </li>
                <li>
                    <div class="progress-circle progress-<?= $ID->B_Skill_Score3; ?>"><span><?= $ID->B_Skill_Score3; ?></span></div><span>แต่งลาย</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="profile_c_tabs">
        <div class="profile_c_icon active">
            <i class="fas fa-bookmark sam"></i><span class="profile_c_strong">ผลงานของช่าง<?php echo $ID->B_Nickname; ?></span>
        </div>
    </div>
</div>