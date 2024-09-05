<?php
include("sideBar.php");
?>

<div class="btn-group">
    <div class="AdminAddBtn">
        <button class="AddProductBtn" onclick="displayAddBox()">Add Product</button>
        <div id="addProductModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="closeAddBox()">&times;</span>
                <h2>Add Product</h2>
                <form id="addProductForm">
                    <label for="title">Product Title:</label>
                    <input type="text" id="title" required>

                    <label for="image">Image URL:</label>
                    <input type="text" id="image" required>

                    <label for="price">Price:</label>
                    <input type="number" id="price" required>

                    <label for="type">Product Type:</label>
                    <input type="text" id="type" required>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" required>

                    <button type="submit" id="submit">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="editProductModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeEditBox()">&times;</span>
        <h2>Edit Product</h2>
        <form id="editProductForm">
            <input type="hidden" id="editProductId">
            <div class="form-group">
                <label for="editTitle">Product Title:</label>
                <input type="text" id="editTitle" required>
            </div>
            <div class="form-group">
                <label for="editImage">Image URL:</label>
                <input type="text" id="editImage" required>
            </div>
            <div class="form-group">
                <label for="editPrice">Price:</label>
                <input type="number" id="editPrice" required>
            </div>
            <div class="form-group">
                <label for="editType">Product Type:</label>
                <input type="text" id="editType" required>
            </div>
            <div class="form-group">
                <label for="editQuantity">Quantity:</label>
                <input type="number" id="editQuantity" required>
            </div>
            <button type="submit" class="submit-btn">Update Product</button>
        </form>
    </div>
</div>


<div class="admin-product" id="admin-product">
</div>


<div id="buyBox"></div>
<script src="js/admin.js"></script>

</body>

</html>