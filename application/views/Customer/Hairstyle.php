<div class="title">
    <div class="wrapper-txt hairstyle-txt">
        <ul class="dynamic-txts">
            <li><span>ทรงผมที่ร้านแนะนำ</span></li>
            <li><span>ทรงผมที่ร้านแนะนำ</span></li>
            <li><span>ทรงผมที่ร้านแนะนำ</span></li>
            <li><span>ทรงผมที่ร้านแนะนำ</span></li>
        </ul>
    </div>
    <div class="description hair">
        <p>ทรงผมชายสุดฮิตที่ลูกค้านิยมมาตัดที่ร้านของเรา Mom House Barber</p>
    </div>
</div>

<?php
foreach ($HS->result_array() as $row) {
?>
    <div class="card-wrapper hairstyle">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="<?php echo base_url(); ?>img/<?= $row['H_Img1']; ?>" alt="<?= $row['H_Img1']; ?>">
                        <img src="<?php echo base_url(); ?>img/<?= $row['H_Img2']; ?>" alt="<?= $row['H_Img2']; ?>">
                        <img src="<?php echo base_url(); ?>img/<?= $row['H_Img3']; ?>" alt="<?= $row['H_Img3']; ?>">
                        <img src="<?php echo base_url(); ?>img/<?= $row['H_Img4']; ?>" alt="<?= $row['H_Img4']; ?>">
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img1']; ?>" alt="<?= $row['H_Img1']; ?>">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img2']; ?>" alt="<?= $row['H_Img2']; ?>">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img3']; ?>" alt="<?= $row['H_Img3']; ?>">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img src="<?php echo base_url(); ?>img/<?= $row['H_Img4']; ?>" alt="<?= $row['H_Img4']; ?>">
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title"><?= $row['H_Name'] ?></h2>
                <a href="#" class="product-link">Mom House Barber</a>

                <div class="product-price">
                    <p class="price">ราคา: <span>150.00 ฿</span></p>
                </div>

                <div class="product-detail">
                    <p>ผมทรง <?= $row['H_Name'] ?></p>

                    <p><?= $row['H_Detail'] ?></p>
                </div>

                <div class="purchase-info">
                    <a href="#" class="btn">จองเลย !</a>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
</script>