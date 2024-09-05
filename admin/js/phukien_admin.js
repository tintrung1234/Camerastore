function displayPhukienProducts() {
<<<<<<< HEAD
    const phukienProducts = products.filter(product => product.type === 'phukien');
    const adminPhukien = document.getElementById("admin-phukien");

    // Check if there are any 'phukien' products
    if (phukienProducts.length === 0) {
        adminPhukien.innerHTML = "<p>No phụ kiện products available.</p>";
        return;
    }

    adminPhukien.innerHTML = `
=======
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
>>>>>>> d59e6d6 (search_function, updatecode)
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
<<<<<<< HEAD
            .map((item) => {
                const { id, image, title, price, type, quantity } = item;
                return `
=======
                    .map((item) => {
                      const { id, image, title, price, type, quantity } = item;
                      return `
>>>>>>> d59e6d6 (search_function, updatecode)
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
<<<<<<< HEAD
            })
            .join("")}
=======
                    })
                    .join("")}
>>>>>>> d59e6d6 (search_function, updatecode)
              </table>
          </div>
      `;
}

<<<<<<< HEAD
displayPhukienProducts();
=======
displayPhukienProducts();
>>>>>>> d59e6d6 (search_function, updatecode)
