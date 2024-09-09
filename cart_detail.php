<?php
include "./php/db.php";
include "navbar.php";

$sql = "SELECT cart.*, products.title, products.images, products.price
  FROM cart 
  JOIN products ON cart.product_id = products.products_id";
$cart_items = $conn->query($sql);

$total_products = 0;
$total_price = 0;
?>

<!-------------------------- Cart Detail -------------------------->
<div class="cart">
  <div class="container">
    <div class="cart-top-wrap">
      <div class="cart-top">
        <div class="cart-top-cart cart-top-item">
          <img src="./uploads/img/carticon.png" alt="">
          <span>Giỏ Hàng</span>
        </div>
        <div class="cart-top-address cart-top-item">
          <img src="./uploads/img/location-icon.png" alt="">
          <span>Giao hàng</span>
        </div>
        <div class="cart-top-payment cart-top-item">
          <img src="./uploads/img/money-icon.png" alt="">
          <span>Thanh toán</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container-cartdetail">
    <div class="cart-content row">
      <div class="cart-content-left">
        <table>
          <tr>
            <th>Sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Màu</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xoá</th>
          </tr>
          <?php if ($cart_items->num_rows > 0): ?>
            <?php while ($item = $cart_items->fetch_assoc()): ?>
              <tr>
                <td><img src="./uploads/<?= $item['images'] ?>" alt=""></td>
                <td>
                  <p><?= $item['title'] ?></p>
                </td>
                <td><img src="./uploads/img/spcolor.png" alt=""></td>
                <td><input type="number" min="1" value="<?= $item['quantity'] ?>"></td>
                <td>
                  <p><?= number_format($item['total_price'] * $item['quantity'], 0, ',', '.') ?>đ</p>
                </td>
                <td>
                  <form method="POST" action="./delete_from_cart.php" style="display:inline;">
                    <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                    <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to remove this item?');">X</button>
                  </form>
                </td>
              </tr>
              <?php
              $total_products += $item['quantity'];
              $total_price += $item['total_price'] * $item['quantity'];
              ?>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="6">Không có sản phẩm nào trong giỏ hàng.</td>
            </tr>
          <?php endif; ?>

        </table>
      </div>
      <div class="cart-content-right">
        <table>
          <tr>
            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
          </tr>
          <tr>
            <td>TỔNG SỐ LƯỢNG</td>
            <td><?= $total_products ?></td>
          </tr>
          <tr>
            <td>TỔNG TIỀN HÀNG</td>
            <td>
              <p><?= number_format($total_price, 0, ',', '.') ?>đ</p>
            </td>
          </tr>
          <tr>
            <td>TẠM TÍNH</td>
            <td>
              <p style="color: red; font-weight: bold;"><?= number_format($total_price, 0, ',', '.') ?>đ</p>
            </td>
          </tr>
        </table>
        <div class="cart-content-right-text">
          <p style="font-size: 16px;">Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 500.000đ</p>
          <?php if ($total_price < 500000): ?>
            <p style="font-size: 14px; color: red; font-weight: bold;">
              Mua thêm <span style="font-size: 16px;"><?= number_format(500000 - $total_price, 0, ',', '.') ?></span> để được miễn phí ship
            </p>
          <?php endif; ?>
        </div>

        <div class="cart-content-right-button">
          <a href="category.php"><button>TIẾP TỤC MUA SẮM</button></a>
          <a href="delivery.php"><button>
              <p style="font-weight: bold;">THANH TOÁN</p>
            </button></a>
        </div>
        <div class="cart-content-right-login">
          <p>TÀI KHOẢN PROCAM</p>
          <p>Hãy <a href="login.php">đăng nhập</a> tài khoản của bạn để tích điểm thành viên</p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- footer  -->
<div class="footer" id="footer">
</div>

<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script>
  document.querySelectorAll('.delete-button').forEach((button) => {
    button.addEventListener('click', function(e) {
      e.preventDefault(); // Prevent the default form submission
      const form = this.closest('form');
      const formData = new FormData(form);

      fetch('./delete_from_cart.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          if (data.includes('Error')) {
            alert('An error occurred while deleting the item.');
          } else {
            form.closest('tr').remove();
          }
        });
    });
  });
</script>