<?php
include "./php/db.php";
include "navbar.php";
?>

<?php
$total_price = 20100000; // Replace this with your actual total price calculation
$free_shipping_threshold = 500000; // Threshold for free shipping
?>

<!--------------------- Delivery -------------------------->
<div class="delivery">
  <div class="container">
    <div class="delivery-top-wrap">
      <div class="delivery-top">
        <div class="delivery-top-cart delivery-top-item">
          <img src="img/carticon.png" alt="" />
          <span>Giỏ Hàng</span>
        </div>
        <div class="delivery-top-address delivery-top-item">
          <img src="img/location-icon.png" alt="" />
          <span>Giao hàng</span>
        </div>
        <div class="delivery-top-payment delivery-top-item">
          <img src="img/money-icon.png" alt="" />
          <span>Thanh toán</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container-delivery">
    <div class="delivery-content row">
      <div class="delivery-content-left">
        <label>Vui lòng chọn địa chỉ giao hàng:</label>
        <div class="delivery-content-left-login row">
          <img width="15px" src="img/login-icon.png" alt="">
          <p style="margin-left: 6px;">Đăng nhập (Nếu bạn đã có tài khoản của PROCAM)</p>
        </div>
        <div class="delivery-content-left-customer row">
          <input checked type="radio" name="customer" value="customer" />
          <p>
            <span style="font-weight: bold">Khách lẻ</span> (Nếu bạn không
            muốn lưu lại thông tin)
          </p>
        </div>
        <div class="delivery-content-left-signup row">
          <input type="radio" name="customer" value="signup" />
          <p>
            <span style="font-weight: bold">Đăng ký</span> (Tạo tài khoản
            mới với thông tin bên dưới)
          </p>
        </div>
        <div class="delivery-content-left-input-top row">
          <div class="delivery-content-left-input-top-item">
            <label for="">Họ tên: <span style="color: red">*</span></label>
            <input type="text" />
          </div>
          <div class="delivery-content-left-input-top-item">
            <label for="">Điện thoại: <span style="color: red">*</span></label>
            <input type="text" />
          </div>
          <div class="delivery-content-left-input-top-item">
            <label for="">Tỉnh/TP: <span style="color: red">*</span></label>
            <input type="text" />
          </div>
          <div class="delivery-content-left-input-top-item">
            <label for="">Quận/Huyện: <span style="color: red">*</span></label>
            <input type="text" />
          </div>
        </div>
        <div class="delivery-content-left-input-bottom row">
          <label for="">Địa chỉ: <span style="color: red">*</span></label>
          <input type="text" />
        </div>
        <div class="delivery-content-left-button row">
          <a href="cart_detail.php"><span>&#171;</span>
            <p>Quay lại giỏ hàng</p>
          </a>
          <a href="payment.php">
            <button>
              <p style="font-weight: bold">THANH TOÁN VÀ GIAO HÀNG</p>
            </button>
          </a>
        </div>
      </div>
      <div class="delivery-content-right">
        <table>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Giảm giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
          </tr>
          <tr>
            <td>CANON 200D</td>
            <td>-20%</td>
            <td>1</td>
            <td>20.000.000đ</td>
          </tr>
          <tr>
            <td>CANON 200D</td>
            <td>-20%</td>
            <td>1</td>
            <td>20.000.000đ</td>
          </tr>
          <tr>
            <td style="font-weight: bold" colspan="3">Tổng</td>
            <td style="font-weight: bold">
              <p><?= number_format($total_price, 0, ',', '.') ?>đ</p>
            </td>
          </tr>
          <tr>
            <td style="font-weight: bold" colspan="3">Thuế VAT</td>
            <td style="font-weight: bold">
              <p>100.000đ</p>
            </td>
          </tr>
          <tr>
            <td style="font-weight: bold" colspan="3">Tổng tiền hàng</td>
            <td style="font-weight: bold">
              <p><?= number_format($total_price + 100000, 0, ',', '.') ?>đ</p>
            </td>
          </tr>
        </table>

        <!-- Free Shipping Message -->
        <?php if ($total_price < 500000): ?>
          <p style="font-size: 14px; color: red; font-weight: bold;">
            Mua thêm <span style="font-size: 16px;"><?= number_format(500000 - $total_price, 0, ',', '.') ?></span> để được miễn phí ship
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- footer  -->
<div class="footer" id="footer">
</div>

<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>