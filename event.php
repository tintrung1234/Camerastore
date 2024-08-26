<?php
include "./php/db.php";
include "navbar.php";
?>

<style>
    h1 {
        margin-top: 10%;
        display: inline-block;
        text-align: center;
        font-size: 20px;
        width: 100%;
    }
</style>


<h1>Khuyến Mãi Máy Ảnh</h1>
<div class="content discountProductcss" id="content">
    <div class="discountProduct" id="discountProduct"></div>
    <button class="ctrl-btn pro-prev">
        <img src="img/left-arrow.png" alt="" />
    </button>
    <button class="ctrl-btn pro-next">
        <img src="img/right-arrow.png" alt="" />
    </button>
</div>
<!-- <div class="content" id="content">
        <div class="discountProduct" id="discountProduct">
            <button class="ctrl-btn pro-prev">
                <img src="img/left-arrow.png" alt="" />
            </button>
            <button class="ctrl-btn pro-next">
                <img src="img/right-arrow.png" alt="" />
            </button>
        </div> -->
<!-- <div class="product">
            <h2>Máy Ảnh Canon EOS 90D</h2>
            <img src="https://example.com/canon-eos-90d.jpg" alt="Máy Ảnh Canon EOS 90D">
            <p>Giá: 22,000,000 VNĐ</p>
            <p>Khuyến mãi: Giảm 10%</p>
            <a href="#" class="button">Mua Ngay</a>
        </div>

        <div class="product">
            <h2>Máy Ảnh Nikon D7500</h2>
            <img src="https://example.com/nikon-d7500.jpg" alt="Máy Ảnh Nikon D7500">
            <p>Giá: 18,000,000 VNĐ</p>
            <p>Khuyến mãi: Giảm 15%</p>
            <a href="#" class="button">Mua Ngay</a>
        </div>

        <div class="product">
            <h2>Máy Ảnh Fujifilm X-T30</h2>
            <img src="https://example.com/fujifilm-x-t30.jpg" alt="Máy Ảnh Fujifilm X-T30">
            <p>Giá: 16,000,000 VNĐ</p>
            <p>Khuyến mãi: Giảm 20%</p>
            <a href="#" class="button">Mua Ngay</a>
        </div>

        <div class="product">
            <h2>Phụ Kiện Máy Ảnh Canon</h2>
            <img src="https://example.com/canon-accessories.jpg" alt="Phụ Kiện Máy Ảnh Canon">
            <p>Giá: 1,500,000 VNĐ</p>
            <p>Khuyến mãi: Giảm 30%</p>
            <a href="#" class="button">Mua Ngay</a>
        </div>

        <div class="product">
            <h2>Phụ Kiện Máy Ảnh Nikon</h2>
            <img src="https://example.com/nikon-accessories.jpg" alt="Phụ Kiện Máy Ảnh Nikon">
            <p>Giá: 1,200,000 VNĐ</p>
            <p>Khuyến mãi: Giảm 25%</p>
            <a href="#" class="button">Mua Ngay</a>
        </div> -->
<!-- </div> -->

<!-- <div class="reviews">
        <h2>Đánh Giá Từ Khách Hàng</h2>
        <div class="review">
            <strong>Nguyễn Văn A:</strong>
            <p>Máy ảnh Canon EOS 90D thật tuyệt vời! Hình ảnh sắc nét và chất lượng tốt.</p>
        </div>
        <div class="review">
            <strong>Trần Thị B:</strong>
            <p>Nikon D7500 là lựa chọn hoàn hảo cho những người mới bắt đầu. Dễ sử dụng và giá cả hợp lý.</p>
        </div>
        <div class="review">
            <strong>Lê Văn C:</strong>
            <p>Fujifilm X-T30 nhỏ gọn và dễ mang theo. Tôi rất hài lòng với sản phẩm này!</p>
        </div>
    </div>

    <div class="news">
        <h2>Tin Tức Khuyến Mãi</h2>
        <p>Chúng tôi đang có chương trình khuyến mãi đặc biệt cho các sản phẩm máy ảnh trong tháng này. Đừng bỏ lỡ
            cơ
            hội sở hữu những sản phẩm chất lượng với giá ưu đãi!</p>
        <p>Thời gian khuyến mãi: Từ ngày 01/08 đến 31/08.</p>
    </div> -->

<div class="footer" id="footer">
</div>

<script src="js/product-slider.js" type="text/javascript"></script>

<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script src="js/discount.js"></script>