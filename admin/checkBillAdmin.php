<?php
include("sideBar.php");
?>

<div class="btn-group">
    <div class="AdminAddBtn">
        <button class="AddProductBtn" onclick="displayAddBox()">Add</button>
        <div id="addProductModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeAddBox()">&times;</span>
                <h2>Add New Order</h2>
                <form id="addOrderForm">
                    <label for="customerName">Customer Name:</label>
                    <input type="text" id="customerName" required>

                    <label for="productList">Product List:</label>
                    <input type="text" id="productList" required placeholder="e.g., Canon 200D, Tripod K&F">

                    <label for="totalPrice">Total Price (VND):</label>
                    <input type="number" id="totalPrice" required>

                    <label for="orderState">Order Status:</label>
                    <select id="orderState" required>
                        <option value="0">Not Yet Paid</option>
                        <option value="1">Paid</option>
                    </select>

                    <label for="orderDate">Order Date:</label>
                    <input type="date" id="orderDate" required>

                    <button type="submit" id="submit">Add Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="editOrderModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeEditBox()">&times;</span>
        <h2>Edit Order</h2>
        <form id="editOrderForm">
            <input type="hidden" id="editOrderId">
            <div class="form-group">
                <label for="editCustomerName">Customer Name:</label>
                <input type="text" id="editCustomerName" required>
            </div>
            <div class="form-group">
                <label for="editProductList">Product List:</label>
                <input type="text" id="editProductList" required placeholder="e.g., Canon 200D, Tripod K&F">
            </div>
            <div class="form-group">
                <label for="editTotalPrice">Total Price (VND):</label>
                <input type="number" id="editTotalPrice" required>
            </div>
            <div class="form-group">
                <label for="editOrderState">Order Status:</label>
                <select id="editOrderState" required>
                    <option value="0">Not Yet Paid</option>
                    <option value="1">Paid</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editOrderDate">Order Date:</label>
                <input type="date" id="editOrderDate" required>
            </div>
            <button type="submit" class="submit-btn">Update Order</button>
        </form>
    </div>
</div>
<div class="admin-bills" id="admin-bills">
</div>
<div id="buyBox"></div>

<script src="js/admin.js"></script>
<script src="js/checkBill.js"></script>
</body>

</html>