<?php
include("./php/db.php");
include("./php/products.php");
include("./php/db-type-product.php");
include("./navbar.php");
?>


<!-- Content -->
<div class="content-list">
    <div class="content-container">
        <div class="cartegory-top row">
            <p>Trang chủ</p><span>&#8594;</span>
            <p>Sản phẩm</p><span>&#8594;</span>
            <p>Canon</p>
        </div>
    </div>
    <div class="content-container">
        <div class="row">
            <div class="cartegory-left">
                <ul>
                    <li class="cartegory-left-li">
                        <a href="#" onclick="showCategory('products')">Sản phẩm</a>
                        <ul>
                            <li><a href="#" onclick="filterByBrand('Canon')">Canon</a></li>
                            <li><a href="#" onclick="filterByBrand('Nikon')">Nikon</a></li>
                            <li><a href="#" onclick="filterByBrand('Fujifilm')">Fujifilm</a></li>
                            <li><a href="#" onclick="filterByBrand('Sony')">Sony</a></li>
                            <li><a href="#" onclick="filterByBrand('Panasonic')">Panasonic</a></li>
                        </ul>
                    </li>

                    <li class="cartegory-left-li">
                        <a href="#" onclick="showCategory('accessories')">Phụ kiện</a>
                        <ul>
                            <li><a href="#" onclick="filterByBrand('ongkinh')">Ống Kính</a></li>
                            <li><a href="#" onclick="filterByBrand('boloc')">Bộ Lọc (Filter)</a></li>
                            <li><a href="#" onclick="filterByBrand('phukienanhsang')">Phụ Kiện Ánh Sáng</a></li>
                            <li><a href="#" onclick="filterByBrand('giado')">Bộ Giá Đỡ và Chân Máy</a></li>
                            <li><a href="#" onclick="filterByBrand('luutru')">Lưu Trữ</a></li>
                            <li><a href="#" onclick="filterByBrand('khac')">Khác</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="cartegory-right row">
                <div class="top-item">
                    <div class="cartegory-right-top-item">
                        <p id="brand"></p>
                    </div>
                    <div class="cartegory-right-top-item">
                        <button id="filter-toggle"><span>Bộ Lọc</span><i>&#11206;</i></button>
                        <div id="filter-section" class="filter-section">
                            <div>
                                <label for="price">Giá tiền:</label>
                                <input type="checkbox" id="price1" name="price" value="under10"
                                    onclick="filterProducts()"> Dưới 10 triệu<br>
                                <input type="checkbox" id="price2" name="price" value="10to20"
                                    onclick="filterProducts()"> Từ 10 đến 20 triệu<br>
                                <input type="checkbox" id="price3" name="price" value="above20"
                                    onclick="filterProducts()"> Trên 20 triệu
                            </div>
                            <div>
                                <label for="category">Phân loại:</label>
                                <input type="checkbox" id="category1" name="category" value="dslr"
                                    onclick="filterProducts()"> Máy Ảnh DSLR<br>
                                <input type="checkbox" id="category2" name="category" value="mirrorless"
                                    onclick="filterProducts()"> Máy ảnh Mirrorless<br>
                                <input type="checkbox" id="category3" name="category" value="compact"
                                    onclick="filterProducts()"> Máy Ảnh Compact
                            </div>
                        </div>
                    </div>
                    <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div>
                </div>
                <div class="cartegory-right-content row" id="cartegory-right-content">
                    <?php
                    if (!empty($products)) {
                        foreach ($products as $product) {

                            $images = $product['images'];
                            $type = strtolower(htmlspecialchars($product['type'], ENT_QUOTES));
                            $title = htmlspecialchars($product['title'], ENT_QUOTES);
                            $price = htmlspecialchars($product['price'], ENT_QUOTES);
                            $id = $product['products_id'];

                            echo "<div class='cartegory-right-content-item' id='$type' >
                                    <a  onclick='openProductDetail($id)'>
                                        <img src='./uploads/$images' alt=''>
                                        <h1>$title</h1>
                                    </a>
                                    <p>$price VND</p>
                                </div>";
                        }
                    } else {
                        echo "<p>No products available.</p>";
                    }
                    ?>
                </div>


                <div class="cartegory-right-bottom">
                    <div class="category-right-bottom-item">
                        <!-- <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span> Trang Cuối</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer  -->
<div class="footer" id="footer">
</div>

<script src="js/product-slider.js" type="text/javascript"></script>
<script src="js/product-cart.js" type="text/javascript"></script>
<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script src="js/danhmuc.js" type="text/javascript"></script>
<script src="./js/navbar.js"></script>


</body>

</html>