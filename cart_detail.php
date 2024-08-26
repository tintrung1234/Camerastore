<?php
include "./php/db.php";
include "navbar.php";


$sql = "SELECT * FROM products";
$products = $conn->query($sql);

$total_products = 0;
$total_price = 0;
?>

<!-------------------------- Cart Detail -------------------------->
<div class="cart">
  <div class="container">
    <div class="cart-top-wrap">
      <div class="cart-top">
        <div class="cart-top-cart cart-top-item">
          <img src="img/carticon.png" alt="">
          <span>Giỏ Hàng</span>
        </div>
        <div class="cart-top-address cart-top-item">
          <img src="img/location-icon.png" alt="">
          <span>Giao hàng</span>
        </div>
        <div class="cart-top-payment cart-top-item">
          <img src="img/money-icon.png" alt="">
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
          <?php if ($products): ?>
            <?php while ($product = $products->fetch_assoc()): ?>
              <tr>
                <td><img src="<?= json_decode($product['images'])[0] ?>" alt=""></td>
                <td>
                  <p><?= $product['title'] ?></p>
                </td>
                <td><img src="img/spcolor.png" alt=""></td>
                <td><input type="number" min="1" value="1"></td>
                <td>
                  <p><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
                </td>
                <td><span>X</span></td>
              </tr>
              <?php
              $total_products++;
              $total_price += $product['price'];
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
            <td>TỔNG SẢN PHẨM</td>
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
          <a href="category.html"><button>TIẾP TỤC MUA SẮM</button></a>
          <a href="delivery.php"><button>
              <p style="font-weight: bold;">THANH TOÁN</p>
            </button></a>
        </div>
        <div class="cart-content-right-login">
          <p>TÀI KHOẢN PROCAM</p>
          <p>Hãy <a href="login.html">đăng nhập</a> tài khoản của bạn để tích điểm thành viên</p>
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