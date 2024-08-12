let products = [
  {
    id: 1,
    image: "../img/canon/200D/200D.png",
    title: "Canon 200D",
    price: 40000,
    type: "canon",
    quantity: 1,
  },
  {
    id: 2,
    image: "../img/canon/1500D-kit/1500D-kit.png",
    title: "Canon 1500D-kit",
    price: 43000,
    type: "canon",
    quantity: 100,
  },
  {
    id: 3,
    image: "../img/canon/3000D-kit/3000D-kit.png",
    title: "Canon 3000D-kit",
    price: 16000,
    type: "canon",
    quantity: 100,
  },
  {
    id: 4,
    image: "../img/canon/G7-X-mark/G7-X-mark.png",
    title: "Canon G7-X-mark",
    price: 23100,
    type: "canon",
    quantity: 100,
  },
  {
    id: 5,
    image: "../img/canon/phukien/speedlite.png",
    title: "Đèn speedlite",
    price: 5400,
    type: "phukien",
    quantity: 100,
  },
  {
    id: 6,
    image: "../img/canon/R7/R7.png",
    title: "Canon R7",
    price: 54322,
    type: "canon",
    quantity: 100,
  },
  {
    id: 7,
    image: "../img/canon/R8/R8.png",
    title: "Canon R8",
    price: 54323,
    type: "canon",
    quantity: 100,
  },
  {
    id: 8,
    image: "../img/canon/R50/R50.png",
    title: "Canon R50",
    price: 32554,
    type: "canon",
    quantity: 100,
  },
  {
    id: 9,
    image: "../img/canon/R100/R100.png",
    title: "Canon R100",
    price: 4325220,
    type: "canon",
    quantity: 100,
  },
  {
    id: 10,
    image: "../img/canon/SX740-HS/SX740-HS.png",
    title: "Canon SX740-HS",
    price: 540030,
    type: "canon",
    quantity: 100,
  },
];

// Bat dung nay neu chay
// products = JSON.parse(localStorage.getItem('products')) || products;

function displayProducts() {
  const adminProduct = document.getElementById("admin-product");
  adminProduct.innerHTML = `
        <div class="container-sell">
            <h2>Top sản phẩm bán chạy</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Phân Loại</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
                ${products
                  .map((item) => {
                    const { id, image, title, price, type, quantity } = item;
                    return `
                        <tr>
                            <td>${id}</td>
                            <td><img src="${image}" alt="${title}" style="width:50px;"></td>
                            <td>${title}</td>
                            <td>${price.toLocaleString()} VND</td>
                            <td>${type}</td>
                            <td>${quantity}</td>
                            <td>
                                <button onclick="openEditBox(${id})">Edit</button>
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

document
  .getElementById("addProductForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const newProduct = {
      id: Date.now(), // Unique ID based on timestamp
      title: document.getElementById("title").value,
      image: document.getElementById("image").value,
      price: parseFloat(document.getElementById("price").value),
      type: document.getElementById("type").value,
      quantity: parseInt(document.getElementById("quantity").value),
    };

    products.push(newProduct);
    localStorage.setItem("products", JSON.stringify(products));
    closeAddBox();
    displayProducts();
  });

function openEditBox(id) {
  const product = products.find((p) => p.id === id);
  if (product) {
    document.getElementById("editProductId").value = product.id;
    document.getElementById("editTitle").value = product.title;
    document.getElementById("editImage").value = product.image;
    document.getElementById("editPrice").value = product.price;
    document.getElementById("editType").value = product.type;
    document.getElementById("editQuantity").value = product.quantity;
    document.getElementById("editProductModal").style.display = "block";
  }
}

function closeEditBox() {
  document.getElementById("editProductModal").style.display = "none";
}

document
  .getElementById("editProductForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const id = parseInt(document.getElementById("editProductId").value);
    const updatedProduct = {
      id: id,
      title: document.getElementById("editTitle").value,
      image: document.getElementById("editImage").value,
      price: parseFloat(document.getElementById("editPrice").value),
      type: document.getElementById("editType").value,
      quantity: parseInt(document.getElementById("editQuantity").value),
    };

    products = products.map((product) =>
      product.id === id ? updatedProduct : product
    );
    localStorage.setItem("products", JSON.stringify(products));
    closeEditBox();
    displayProducts();
  });

function deleteProduct(id) {
  products = products.filter((product) => product.id !== id);
  localStorage.setItem("products", JSON.stringify(products));
  displayProducts();
}

displayProducts();
