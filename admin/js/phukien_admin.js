function displayPhukienProducts() {
  const phukienProducts = products.filter(
    (product) => product.type === "phukien"
  );
  const adminPhukien = document.getElementById("admin-phukien");

  // Check if there are any 'phukien' products
  if (phukienProducts.length === 0) {
    adminPhukien.innerHTML = "<p>No phụ kiện products available.</p>";
    return;
  }

  adminPhukien.innerHTML = `
          <div class="container-sell">
              <h2>Sản phẩm phụ kiện</h2>
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
                  ${phukienProducts
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

displayPhukienProducts();
