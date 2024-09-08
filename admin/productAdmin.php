<?php
include("sideBar.php");
include("class/productAdminclass.php");
?>

<?php
$products = new products;
$show_products = $products->show_products();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_products = $products->insert_products($_POST, $_FILES);
    if (isset($insert_products['errors'])) {
        $errorMessages = $insert_products['errors'];
    }
    header("Location: productAdmin.php");
}
?>

<div class="btn-group">
    <div class="AdminAddBtn">
        <button class="AddProductBtn" onclick="displayAddBox()">Thêm sản phẩm</button>
        <div id="addProductModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeAddBox()">&times;</span>
                <h2>Thêm sản phẩm</h2>
                <form id="addProductForm" action="" method="POST" enctype="multipart/form-data">
                    <label for="productName">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" name="productName" id="productName" required>

                    <label for="category">Chọn danh mục <span style="color: red;">*</span></label>
                    <select name="category" id="category" required>
                        <option value="#">--Chọn danh mục--</option>
                        <?php
                        $show_category = $products->show_category();
                        if ($show_category) {
                            while ($category = $show_category->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                    <label for="productType">Chọn loại sản phẩm <span style="color: red;">*</span></label>
                    <select name="productType" id="productType" required>
                        <option value="#">--Chọn loại sản phẩm--</option>
                    </select>

                    <label for="price">Giá sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" name="price" id="price" required>

                    <label for="quantity">Số lượng sản phẩm <span style="color: red;">*</span></label>
                    <input type="number" name="quantity" id="quantity" required>

                    <label for="description">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea name="description" id="description" cols="30" rows="10" required></textarea>

                    <label for="discount">Mã giảm giá <span style="color: red;">*</span></label>
                    <input type="text" name="discount" id="discount" required value="0">

                    <label for="images">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <input type="file" name="images" id="images" required>
                    <span style="color: red;"><?php echo isset($errorMessages['imageError']) ? $errorMessages['imageError'] : ''; ?></span>

                    <label for="images_des">Ảnh mô tả sản phẩm <span style="color: red;">*</span></label>
                    <input type="file" name="images_des[]" id="images_des" required multiple>
                    <span style="color: red;"><?php echo isset($errorMessages['imageDesError']) ? $errorMessages['imageDesError'] : ''; ?></span>

                    <button type="submit" id="submit">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="admin-product" id="admin-product">
    <div class="    ">
        <h2>Các sản phẩm hiện tại</h2>
        <table>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên loại sản phẩm</th>
                <th>Giá</th>
                <th>Phân Loại</th>
                <th>Số lượng</th>
                <th>Mã giảm giá</th>
                <th>Mô tả sản phẩm</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_products) {
                $i = 0;
                while ($product = $show_products->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <img src="../uploads/<?= $product['images'] ?>" alt=""></td>
                        <td> <?php echo $product['type'] ?></td>
                        <td> <?php echo number_format($product['price']) ?></td>
                        <td> <?php echo $product['title'] ?></td>
                        <td> <?php echo $product['quantity'] ?></td>
                        <td> <?php echo $product['discount'] ?></td>
                        <td> <?php echo $product['description'] ?></td>
                        <td>
                            <a href="productAdminEdit.php?products_id=<?php echo $product['products_id'] ?>"><button>Edit</button></a>
                            <a href="productAdminDelete.php?products_id=<?php echo $product['products_id'] ?>"><button>Delete</button></a>
                        </td>
                    </tr>
            <?php
                }
            } ?>
        </table>
    </div>
</div>

<script src="js/admin-product.js"></script>

<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: "fetch_product_types.php",
                    type: "POST",
                    data: {
                        category_id: categoryId
                    },
                    success: function(data) {
                        $('#productType').html(data);
                    }
                });
            } else {
                $('#productType').html('<option value="#">--Chọn loại sản phẩm--</option>');
            }
        });
    });
</script>
</body>

</html>