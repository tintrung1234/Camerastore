<?php
include("sideBar.php");
include("class/categoryclass.php");
?>

<?php
$category = new category;
$show_category = $category->show_category();

if (!isset($_GET['category_id']) || $_GET['category_id'] == NULL) {
    echo "<script>window.location = 'category.php'</script>";
} else {
    $category_id = $_GET['category_id'];
}

$get_category = $category->get_category($category_id);
if ($get_category) {
    $result = $get_category->fetch_assoc();
}
?>

<?php
$category = new category;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $delete_category = $category->delete_category($category_id);
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
<div id="editProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditBox()">&times;</span>
        <h2>Xóa danh mục</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="editImage">Tên danh mục: <?php echo $result['category_name'] ?></label>
            </div>
            <button type="submit" class="submit-btn">Xóa danh mục</button>
        </form>
    </div>
</div>


<div class="category_list" id="category_list">
    <div class="container-sell">
        <h2>Danh mục</h2>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_category) {
                $i = 0;
                while ($result = $show_category->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['category_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td>
                            <a href="categoryEdit.php?category_id=<?php echo $result['category_id'] ?>"><button>Edit</button></a>
                            <a href="categoryDelete.php?category_id=<?php echo $result['category_id'] ?>"><button>Delete</button></a>
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