let bills = [
    {
        id: 1,
        name: 'Huynh Trung Tin',
        product: "Canon 200D, Canon 1500D, Tripod K&F",
        price: 1246547,
        state: 0,
        daybuy: '12/8/2024'
    },
    {
        id: 2,
        name: 'Ngo Minh Kham',
        product: "Fujifilm C200 fujicolor, Đèn led Ulanzi, Dây đeo",
        price: 342564,
        state: 1,
        daybuy: '8/8/2024'
    },
    {
        id: 3,
        name: 'Le Hoang Quy',
        product: "Canon 200D, Canon 1500D, Tripod K&F",
        price: 6547900,
        state: 0,
        daybuy: '12/8/2024'
    },
    {
        id: 4,
        name: 'Pham Tan Tien',
        product: "Canon 3000D, Canon G7-X-mark",
        price: 4870000,
        state: 1,
        daybuy: '9/8/2024'
    },
    {
        id: 5,
        name: 'Ho Chi Dung',
        product: "Canon R7, Hắt sáng, Fujifilm C200 fujicolor",
        price: 1246547,
        state: 1,
        daybuy: '6/8/2024'
    },
];

function displayProducts() {
    const adminProduct = document.getElementById("admin-bills");
    adminProduct.innerHTML = `
          <div class="container-sell">
              <h2>Thông tin đơn đặt hàng</h2>
              <table>
                  <tr>
                      <th>ID</th>
                      <th>Tên người đặt</th>
                      <th>Tên sản phẩm</th>
                      <th>Tổng Giá</th>
                      <th>Trạng thái</th>
                      <th>Ngày đặt hàng</th>
                      <th>Thao tác</th>
                  </tr>
                  ${bills
            .map((item) => {
                const { id, name, product, price, state, daybuy } = item;
                return `
                          <tr>
                              <td >${id}</td>
                              <td>${name}</td>
                              <td>${product}</td>
                              <td>${price.toLocaleString()} VND</td>
                              <td>${state === 1 ? 'Paid' : 'Not pay'}</td>
                              <td>${daybuy}</td>
                              <td>
                                  <button onclick="openEditOrderBox(${id})">Edit</button>
                                  <button onclick="deleteProduct(${id})">Delete</button>
                              </td>
                          </tr>
                      `;
            })
            .join("")}
              </table>
          </div>
      `;
}

function displayAddBox() {
    document.getElementById("addProductModal").style.display = "block";
}

function closeAddBox() {
    document.getElementById("addProductModal").style.display = "none";
}

function addOrder(event) {
    event.preventDefault(); // Prevent form submission

    const customerName = document.getElementById("customerName").value;
    const productList = document.getElementById("productList").value;
    const totalPrice = parseFloat(document.getElementById("totalPrice").value);
    const orderState = parseInt(document.getElementById("orderState").value);
    const orderDate = document.getElementById("orderDate").value;

    const newOrder = {
        id: Date.now(),
        name: customerName,
        product: productList,
        price: totalPrice,
        state: orderState,
        daybuy: orderDate
    };

    // Add the new order to your bills array
    bills.push(newOrder);

    // Optionally, you can refresh the product display
    displayProducts();

    // Close the modal and reset the form
    closeAddBox();
    document.getElementById("addOrderForm").reset();
}

function closeEditBox() {
    document.getElementById("editOrderModal").style.display = "none";
}

function openEditOrderBox(id) {
    const bill = bills.find((b) => b.id === id);
    if (bill) {
        document.getElementById("editOrderId").value = bill.id;
        document.getElementById("editCustomerName").value = bill.name;
        document.getElementById("editProductList").value = bill.product;
        document.getElementById("editTotalPrice").value = bill.price;
        document.getElementById("editOrderState").value = bill.state;
        document.getElementById("editOrderDate").value = bill.daybuy;

        document.getElementById("editOrderModal").style.display = "block";
    }
}

document.getElementById("editOrderForm").onsubmit = function (event) {
    event.preventDefault(); // Prevent form submission

    const id = document.getElementById("editOrderId").value;
    const customerName = document.getElementById("editCustomerName").value;
    const productList = document.getElementById("editProductList").value;
    const totalPrice = parseFloat(document.getElementById("editTotalPrice").value);
    const orderState = parseInt(document.getElementById("editOrderState").value);
    const orderDate = document.getElementById("editOrderDate").value;

    // Update the order in the bills array
    const orderIndex = bills.findIndex(order => order.id == id);
    if (orderIndex !== -1) {
        bills[orderIndex] = {
            id: parseInt(id),
            name: customerName,
            product: productList,
            price: totalPrice,
            state: orderState,
            daybuy: orderDate
        };
    }

    // Refresh the display
    displayProducts();

    // Close the modal and reset the form
    closeEditBox();
    document.getElementById("editOrderForm").reset();
};

displayProducts()