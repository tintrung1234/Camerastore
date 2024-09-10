<?php
include("sideBar.php");
include("class/checkBillclass.php");
?>

<?php
$bill = new checkBill;
$show_bill = $bill->show_bill();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_bill = $bill->insert_bill($_POST);
    if ($insert_bill) {
        echo "Order added successfully.";
    } else {
        echo "Failed to add order.";
    }
}
?>

<div class="btn-group">
    <div class="AdminAddBtn">
        <button class="AddProductBtn" onclick="displayAddBox()">Thêm đơn đặt hàng mới</button>
        <div id="addProductModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeAddBox()">&times;</span>
                <h2>Thêm đơn đặt hàng mới</h2>
                <form id="addOrderForm" action="" method="post">
                    <label for="customer_id">ID khách hàng:</label>
                    <input type="number" name="customer_id" id="customer_id" required>

                    <label for="product_id">ID sản phẩm:</label>
                    <select id="product_id" name="product_id" required>
                        <option value="">Chọn sản phẩm</option>
                        <?php
                        $resultA = $bill->show_products();
                        if ($resultA) {
                            while ($row = $resultA->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['product_id']) . '">' . htmlspecialchars($row['title']) . '</option>';
                            }
                        } else {
                            echo '<option value="">Không có sản phẩm nào</option>';
                        }
                        ?>
                    </select>

                    <label for="quantity">Số lượng sản phẩm:</label>
                    <input type="number" name="quantity" id="quantity" required>

                    <label for="order_quantity">Số lượng đơn:</label>
                    <input type="number" name="order_quantity" id="order_quantity" required>

                    <label for="address">Địa chỉ giao hàng:</label>
                    <input type="text" name="address" id="address" required>

                    <label for="phone">Số điện thoại:</label>
                    <input type="text" name="phone" id="phone" required>

                    <label for="orderState">Trạng thái đơn hàng:</label>
                    <select id="orderState" name="orderState" required>
                        <option value="0">Chưa thanh toán</option>
                        <option value="1">Đã thanh toán</option>
                    </select>

                    <label for="orderDate">Ngày đặt hàng:</label>
                    <input type="date" name="orderDate" id="orderDate" required>
                    <br>
                    <button type="submit" id="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="admin-product" id="admin-product">
    <div class="container-sell">
        <h2>Thông tin đơn đặt hàng</h2>
        <table>
            <tr>
                <th>STT</th>
                <th>ID khách hàng</th>
                <th>ID sản phẩm</th>
                <th>Số lượng đơn</th>
                <th>Số lượng sản phẩm</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
            </tr>
            <?php
            if ($show_bill) {
                $i = 0;
                while ($bills = $show_bill->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $bills['customer_id'] ?></td>
                        <td> <?php echo $bills['product_id'] ?></td>
                        <td> <?php echo $bills['order_quantity'] ?></td>
                        <td> <?php echo $bills['order_quantity'] ?></td>
                        <td> <?php echo $bills['phone'] ?></td>
                        <td>
                            <?php
                            echo $bills['status'] == 0 ? 'Chưa thanh toán' : 'Đã thanh toán';
                            ?>
                        </td>
                    </tr>
            <?php
                }
            } ?>
        </table>
    </div>
</div>

<script src="js/admin-product.js"></script>
</body>

</html>