<?php
include("./php/db.php");
include("./php/products.php");
include("./php/db-type-product.php");
include("./navbar.php");
include("./php/cart_price.php");
header('Content-Type: text/html; charset=UTF-8');

// Sample database connection (update with your actual connection details)
$host = "localhost"; // Update with your server details
$user = "root";
$pass = "";
$db = "camerastore_db";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// Get product ID from the query string
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$product_detail = null;

if ($productId > 0) {
  // Prepare and execute the query
  $stmt = $conn->prepare("SELECT title, price, type, images FROM products WHERE products_id = ?");
  $stmt->bind_param("i", $productId);
  $stmt->execute();

  // Get the result
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $product_detail = $result->fetch_assoc();

    // Decode images JSON string into an array
    $product_detail['images'] = json_decode($product_detail['images'], true);

    // Check if images are an array
    if (!is_array($product_detail['images'])) {
      $product_detail['images'] = []; // Set to empty array if not valid
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>

  <!-- Product -->
  <div class="productDetail">
    <?php if ($product_detail): ?>
      <div class="container">
        <div class="product-top row">
          <p>Trang chủ</p>
          <span>&#10230;</span>
          <p>Sản phẩm</p>
          <span>&#10230;</span>
          <p>Máy ảnh DSLR</p>
          <span>&#10230;</span>
          <p><?php echo htmlspecialchars($product_detail['title']); ?></p>
        </div>

        <div class="product-content rowFlexTop">
          <div class="product-content-left rowFlexTop">
            <div class="product-content-left-big-img">
              <img src="<?php echo htmlspecialchars($product_detail['images'][0]); ?>" alt="<?php echo htmlspecialchars($product_detail['title']); ?>">
            </div>
            <div class="product-content-left-small-img">
              <?php foreach (array_slice($product_detail['images'], 1) as $index => $image): ?>
                <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($product_detail['title']); ?> Image <?php echo $index + 3; ?>">
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-content-right">
            <table class="table-detail">
              <tr>
                <td>Tên sản phẩm</td>
                <td>
                  <div class="product-content-right-product-name">
                    <h1 style="color: red;"><?php echo htmlspecialchars($product_detail['title']); ?></h1>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Giá bán</td>
                <td>
                  <div class="product-content-right-product-price">
                    <p><?php echo number_format($product_detail['price'], 0, ',', '.'); ?> VNĐ
                      <span style="color: black; font-size: 16px;">(Đã có VAT)</span>
                    </p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Thương hiệu</td>
                <td><?php echo htmlspecialchars($product_detail['type']); ?></td>
              </tr>
              <tr>
                <td>Bảo hành</td>
                <td>24 tháng</td>
              </tr>
              <tr>
                <td>Màu sắc</td>
                <td>
                  <div class="product-content-right-product-color">
                    <div class="product-content-right-product-color-img">
                      <img src="img/canon/200D/200D.png" alt="Màu sắc sản phẩm">
                    </div>
                  </div>
                </td>
              </tr>
            </table>
            <div class="quantity">
              <p style="font-weight: bold;">Số lượng:</p>
              <input type="number" min="0" value="1">
            </div>
            <div class="quatang">
              <p style="font-weight: bold;">Sản phẩm tặng kèm</p>
              <div class="quatang_content">
                <img src="img/tangkem.jpg" alt="">
                <p>Bộ vệ sinh K&F Concept 3 in 1</p>
              </div>
            </div>

            <div class="product-content-right-product-button">
              <button onclick='displayBuyBox(<?php echo $productId; ?>)'>
                <img src="img/carticon.png" alt="Giỏ hàng">
                <p>MUA HÀNG</p>
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <p>Product not found.</p>
    <?php endif; ?>
  </div>

  <!-- product-related -->
  <div class="product-related container">
    <div class="product-related-title">
      <p>SẢN PHẨM LIÊN QUAN</p>
    </div>
    <div class="row product-content">
      <div class="product-related-item">
        <img src="img/canon/200D/200D.png">
        <h1>CANON 200D</h1>
        <p>20.000.000đ <del>25.000.000đ</del></p>
      </div>
      <div class="product-related-item">
        <img src="img/canon/200D/200D.png">
        <h1>CANON 200D</h1>
        <p>20.000.000đ <del>25.000.000đ</del></p>
      </div>
      <div class="product-related-item">
        <img src="img/canon/200D/200D.png">
        <h1>CANON 200D</h1>
        <p>20.000.000đ <del>25.000.000đ</del></p>
      </div>
      <div class="product-related-item">
        <img src="img/canon/200D/200D.png">
        <h1>CANON 200D</h1>
        <p>20.000.000đ <del>25.000.000đ</del></p>
      </div>
      <div class="product-related-item">
        <img src="img/canon/200D/200D.png">
        <h1>CANON 200D</h1>
        <p>20.000.000đ <del>25.000.000đ</del></p>
      </div>
      <!-- Repeat similar blocks for other related products -->
    </div>
  </div>

  <div id="buyBox">
    <?php foreach ($products as $product): ?>
      <form method="POST" action="./php/products.php" header="./cart_detail.php">
        <?php $image = json_decode($product['images'])[0]; ?>
        <div class="notiBox-<?php echo $product['id']; ?>" id="notiBox" style="display: none;">
          <div class="backgroundNoti"></div>
          <div class="littleBox">
            <button class="exitBtn" id="exitBtn" type="button" onclick="this.parentElement.parentElement.style.display='none'">X</button>
            <div class="firstInfo">
              <div class="imgAndInfo">
                <img src="<?php echo $image; ?>" alt="" class="imgInLittleBox">
                <div class="productInfo">
                  <h2><?php echo $product['title']; ?></h2>
                  <p>
                    <span id="priceOfProduct"></span><?php echo $formattedPrice = number_format($product['price'], 0, ',', '.'); ?>
                    <span>VND</span>
                  </p>
                </div>
              </div>
              <div class="amountproduct">
                <button type="button" class="addToCart" data-id="<?php echo $product['id']; ?>" data-price="<?php echo $product['price']; ?>">+</button>
                <input name="quantity" id="userCount-<?php echo $product['id']; ?>" class="amountProduct" value="0" readonly>
                <button type="button" class="delToCart" data-id="<?php echo $product['id']; ?>">-</button>
                <input type="hidden" name="quantity-<?php echo $product['id']; ?>" id="inputQuantity-<?php echo $product['id']; ?>" value="0">
              </div>
            </div>

            <div class="eventGift">
              <h2><img class="giftIcon" src="img/giftbox.png" alt="">Chương trình khuyến mãi</h2>
              <p class="eventDes">Tặng thẻ nhớ 64GB</p>
            </div>
            <div class="lastInfo">
              <div class="countBox">
                <h2 class="priceTemp">Tạm tính: <strong class='displayPrice' id="displayPrice-<?php echo $product['id']; ?>">0</strong></h2>
              </div>
              <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
              <input type="hidden" name="nameproduct" value="<?php echo $product['title']; ?>">
              <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
              <button type="submit" class="buyBtn">Xác nhận mua</button>
            </div>
          </div>
        </div>
      </form>
    <?php endforeach; ?>
  </div>

  <!-- footer  -->
  <div class="footer" id="footer">
  </div>

  <script src="js/navbar.js" type="text/javascript"></script>
  <script src="./js/product-cart.js" type="text/javascript"></script>
  <script src="js/autocomplete.js" type="text/javascript"></script>
  <script src="js/footer.js" type="text/javascript"></script>
  <!-- <script src="js/product-detail.js"></script> -->
</body>

</html>