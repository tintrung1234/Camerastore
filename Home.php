<?php
include("./php/db.php");
include("./php/products.php");
include("./php/db-type-product.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Page</title>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="icon" href="img/ProCam.png" type="image/x-icon">
</head>

<body>
  <!-- navbar -->
  <div id="navBar">
  </div>

  <!-- banner -->
  <div id="slider">
    <div class="aspect-ratio-169">
      <img src="img/banner1.jpg" alt="" />
      <img src="img/banner2.jpg" alt="" />
      <img src="img/banner3.jpg" alt="" />
      <img src="img/banner4.jpg" alt="" />
    </div>

    <div class="dot-container">
      <div class="dot active"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>

  <div class="smallIntroduce">
    <hr>
    <div class="Introduce-container">
      <div class="item">
        <img src="./img/truck.png" alt="">
        <div class="conntent">
          <h2>Miễn phí vận chuyển</h2>
          <p>Giao hàng miễn phí tất cả các đơn</p>
        </div>
      </div>
      <div class="item">
        <img src="./img/check.png" alt="">
        <div class="conntent">
          <h2>Cam kết sản phẩm chính hãng</h2>
          <p>Chính hãng, có thương hiệu</p>
        </div>
      </div>
      <div class="item">
        <img src="./img/wrench.png" alt="">
        <div class="conntent">
          <h2>Bảo hành miễn phí</h2>
          <p>Bảo hành tận nơi</p>
        </div>
      </div>
      <div class="item">
        <img src="./img/surprise.png" alt="">
        <div class="conntent">
          <h2>Khuyến mại lớn</h2>
          <p>Nhiều quà tặng hấp dẫn</p>
        </div>
      </div>
    </div>
    <hr>
  </div>

  <div class="little-banner">
    <div class="container-img">
      <div class="block-img1">
        <img src="./img/little-banner3.jpg" alt="">
      </div>
      <div class="block-img2">
        <div class="bb1">
          <img class="img1-block2" src="./img/little-banner2.jpg" alt="">
        </div>
        <div class="bb2">
          <img src="./img/little-banner1.jpg" alt="">
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="canon-item">
    <h2 class="titleCanon">Canon Camera</h2>
    <div class="content">
      <div class="product-group" id="canon-product-group">
        <?php
        foreach ($canonProducts as $item) {
          $id = $item['id'];
          $images = json_decode($item['images'], true); // Decode JSON string
          $primaryImage = $images[0]; // Use the first image
          $title = htmlspecialchars($item['title'], ENT_QUOTES);
          $price = htmlspecialchars($item['price'], ENT_QUOTES);
          echo "<div id='product' class=''>
                            <a class='productLink' onclick='openProductDetail($id)'>
                                <img class='productImg' src='$primaryImage' alt=''>
                            </a>
                            <label class='productName' for=''>$title</label>
                            <p class='productPrice'>Giá từ <strong>$price</strong></p>
                            <button class='addCart' onclick='displayBuyBox($id)'>
                                <img src='img/carticon.png' alt='cartIcon'> 
                                <p class='muahang'> Mua hàng</p>
                            </button>
                          </div>";
        }
        ?>
      </div>
      <button class="ctrl-btn pro-prev">
        <img src="img/left-arrow.png" alt="" />
      </button>
      <button class="ctrl-btn pro-next">
        <img src="img/right-arrow.png" alt="" />
      </button>
    </div>
  </div>

  <div class="nikon-item">
    <h2 class="titleNikon">Nikon Camera</h2>
    <div class="content">
      <div class="product-group" id="nikon-product-group">
        <?php
        foreach ($nikonProducts as $item) {
          $id = $item['id'];
          $images = json_decode($item['images'], true); // Decode JSON string
          $primaryImage = $images[0]; // Use the first image
          $title = htmlspecialchars($item['title'], ENT_QUOTES);
          $price = htmlspecialchars($item['price'], ENT_QUOTES);
          echo "<div id='product' class=''>
                            <a class='productLink' onclick='openProductDetail($id)'>
                                <img class='productImg' src='$primaryImage' alt=''>
                            </a>
                            <label class='productName' for=''>$title</label>
                            <p class='productPrice'>Giá từ <strong>$price</strong></p>
                            <button class='addCart' onclick='displayBuyBox($id)'>
                                <img src='img/carticon.png' alt='cartIcon'> 
                                <p class='muahang'> Mua hàng</p>
                            </button>
                          </div>";
        }
        ?>
      </div>
      <button class="ctrl-btn pro-prev">
        <img src="img/left-arrow.png" alt="" />
      </button>
      <button class="ctrl-btn pro-next">
        <img src="img/right-arrow.png" alt="" />
      </button>
    </div>
  </div>

  <div class="sony-item">
    <h2 class="titleSony">Sony Camera</h2>
    <div class="content">
      <div class="product-group" id="sony-product-group">
        <?php
        foreach ($sonyProducts as $item) {
          $id = $item['id'];
          $images = json_decode($item['images'], true); // Decode JSON string
          $primaryImage = $images[0]; // Use the first image
          $title = htmlspecialchars($item['title'], ENT_QUOTES);
          $price = htmlspecialchars($item['price'], ENT_QUOTES);
          echo "<div id='product' class=''>
                            <a class='productLink' onclick='openProductDetail($id)'>
                                <img class='productImg' src='$primaryImage' alt=''>
                            </a>
                            <label class='productName' for=''>$title</label>
                            <p class='productPrice'>Giá từ <strong>$price</strong></p>
                            <button class='addCart' onclick='displayBuyBox($id)'>
                                <img src='img/carticon.png' alt='cartIcon'> 
                                <p class='muahang'> Mua hàng</p>
                            </button>
                          </div>";
        }
        ?>
      </div>
      <button class="ctrl-btn pro-prev">
        <img src="img/left-arrow.png" alt="" />
      </button>
      <button class="ctrl-btn pro-next">
        <img src="img/right-arrow.png" alt="" />
      </button>
    </div>
  </div>

  <!-- Repeat for Nikon and Sony Cameras as needed -->
  <div id="buyBox">
    <?php foreach ($products as $product): ?>
      <form method="POST" action="./php/products.php">
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
                  <p>VND <?php echo $product['price']; ?></p>
                </div>
              </div>
              <div class="amountproduct">
                <button type="button" class="addToCart" data-id="<?php echo $product['id']; ?>">+</button>
                <input name="quantity" id="userCount-<?php echo $product['id']; ?>" class="amountProduct" value="0">
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
                <h2 class="priceTemp">Tạm tính: <strong class='displayPrice'>0</strong></h2>
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
  <script src="js/product-slider.js" type="text/javascript"></script>
  <script src="js/product-cart.js" type="text/javascript"></script>
  <script src="js/banner.js" type="text/javascript"></script>
  <script src="js/autocomplete.js" type="text/javascript"></script>
  <script src="js/footer.js" type="text/javascript"></script>
</body>

</html>