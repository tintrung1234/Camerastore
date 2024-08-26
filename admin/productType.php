<?php
include("sideBar.php");
include("class/productTypeclass.php");
?>

<?php
$productType = new productType;
$show_productType = $productType->show_productType();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $productType_name = $_POST['productType_name'];
    $insert_productType = $productType->insert_productType($category_id, $productType_name);
}
?>

<div class="btn-group">
    <div class="AdminAddBtn">
        <button class="AddProductBtn" onclick="displayAddBox()">Thêm loại sản phẩm</button>
        <div id="addProductModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeAddBox()">&times;</span>
                <h2>Thêm loại sản phẩm</h2>
                <form action="" method="post">
                    <select name="category_id" id="">
                        <option value="#">--Chọn danh mục--</option>
                        <?php
                        $show_category = $productType->show_category();
                        if ($show_category) {
                            while ($result = $show_category->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?></option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                    <label for="title">Tên loại sản phẩm:</label>
                    <input type="text" name="productType_name" placeholder="Nhập tên loại sản phẩm" required>

                    <button type="submit" id="submit">Thêm loại sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="category_list" id="category_list">
    <div class="container-sell">
        <h2>Loại sản phẩm</h2>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Tên loại sản phẩm</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_productType) {
                $i = 0;
                while ($result = $show_productType->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['product_id'] ?></td>
                        <td> <?php echo $result['category_name'] ?></td>
                        <td> <?php echo $result['product_name'] ?></td>
                        <td>
                            <a href="productTypeEdit.php?product_id=<?php echo $result['product_id'] ?>"><button>Edit</button></a>
                            <a href="productTypeDelete.php?product_id=<?php echo $result['product_id'] ?>"><button>Delete</button></a>
                        </td>
                    </tr>
            <?php
                }
            } ?>
        </table>
    </div>
</div>

<script src="js/category.js"></script>
</body>

</html>