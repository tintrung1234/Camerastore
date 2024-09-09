<?php
include_once("./php/suggestions.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "camerastore_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // If the user is logged in, use their user ID
  $user_id = $_SESSION['user_id'];
} else {
  // If the user is not logged in, set customer_id to 0
  $user_id = 0;
}

// SQL query to sum the total quantity of products in the cart based on the customer_id (either user_id or 0)
$sql = "SELECT SUM(quantity) as total_quantity FROM cart WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Initialize total quantity to 0
$totalQuantity = 0;

// Check if the query was successful
if ($result) {
  // Fetch the result as an associative array
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Check if total_quantity is not null
    $totalQuantity = $row['total_quantity'] !== null ? $row['total_quantity'] : 0;
  }
} else {
  // Handle query error
  echo "Error: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css" />
</head>

<body>
  <!-- navbar -->
  <div id="navBar">
    <div class="container ">
      <div class="logo">
        <a href="Home.php">
          <img src="./uploads/img/ProCam.png" alt="" />
        </a>
        <button onclick=showSidebar() class="showOnMobile hideOnNavbar ml-mobile"><img class='menuImg' src='./uploads/img/menu.png'></button>
      </div>
      <div class="blockNav1 hideOnMobile">
        <div class="dropdown">
          <a href="Home.php">
            <button class="subBtn">
              Trang chủ
            </button>
          </a>
        </div>
        <div class="dropdown">
          <a href="category.php"><button class="subBtn">Sản phẩm</button></a>
          <div class="dropdown-content">
            <a href="#">Canon</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Nikon</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Fujifilm</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Sony</a>
            <div class="sub-dropdown">
            </div>

            <a href="#">Panasonic</a>
            <div class="sub-dropdown">
            </div>
          </div>
        </div>
        <div class="dropdown">
          <a href="category.php"><button class="subBtn">Phụ kiện</button></a>
          <div class="dropdown-content">

            <a href="#">Ống Kính</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Bộ Lọc (Filter)</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Phụ Kiện Ánh Sáng</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Bộ Giá Đỡ và Chân Máy</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Lưu Trữ</a>
            <div class="sub-dropdown">

            </div>

            <a href="#">Khác</a>
            <div class="sub-dropdown">

            </div>
          </div>
        </div>
        <div class="dropdown">
          <a href="repair.php"><button class="subBtn">Sửa chữa</button></a>
        </div>
        <div class="dropdown">
          <a href="event.php">
            <button class="subBtn">Khuyến mãi</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="contact.php"><button class="subBtn">Liên hệ</button></a>
        </div>
      </div>
      <div class="search_box hideOn">
        <form action="./php/search.php" method="GET">
          <div class="row-search-box">
            <input type="text" id="input-box" name="query" autocomplete="off" placeholder="Tìm kiếm" />
            <button type="submit">
              <img src="./uploads/img/SearchIcon.png" alt="Search" />
            </button>
          </div>
          <div class="result-box"></div>
        </form>
      </div>
      <div class="login-icon" class='hideOnMobile'>
        <a href="redirect.php">
          <img class='hideOnMobile' width=30px src="./uploads/img/signin-icon.png" alt="" />
        </a>
      </div>
      <div id="totalCart" class='hideOnMobile'>
        <p class='hideOnMobile' id="count"><?php echo $totalQuantity; ?></p>
        <a href="cart_detail.php">
          <img src="./uploads/img/carticon.png" alt="" />
        </a>
      </div>
    </div>
  </div>

  <div class="sideBar hideOnNavbar">
    <div class="logo">
      <a href="Home.php">
        <img src="./uploads/img/ProCam.png" alt="" />
      </a>
      <button onclick=hideSidebar() class="closeBtn showOnMobile"><img class='menuImg' src='./uploads/img/close.png'></button>
    </div>
    <div class="blockNav1 hideOnMobile">

      <div class="dropdown">
        <a href="Home.php">
          <button class="subBtn">
            Trang chủ
          </button>
        </a>
      </div>
      <div class="dropdown">
        <a href="redirect.php">
          <button class="subBtn">
            Trang cá nhân
          </button>
        </a>
      </div>
      <div class="dropdown">
        <a href="category.php">
          <button class="subBtn">Sản phẩm</button>
        </a>
      </div>
      <div class="dropdown">
        <a href="category.php">
          <button class="subBtn">Phụ kiện</button>
        </a>
      </div>
      <div class="dropdown">
        <a href="repair.php">
          <button class="subBtn">Sửa chữa</button>
        </a>
      </div>
      <div class="dropdown">
        <a href="event.php">
          <button class="subBtn">Khuyến mãi</button>
        </a>
      </div>
      <div class="dropdown">
        <a href="contact.php">
          <button class="subBtn">Liên hệ</button>
        </a>
      </div>
    </div>
  </div>
  </div>
  <script src="js/danhmuc.js" type="text/javascript"></script>
  <script>
    const inputBox = document.getElementById("input-box");
    const resultsBox = document.querySelector(".result-box");

    inputBox.addEventListener("keyup", function() {
      const query = inputBox.value;

      if (query.length > 0) {
        fetch(`./php/suggestions.php?suggest=${query}`)
          .then(response => response.json())
          .then(data => {
            displaySuggestions(data);
          });
      } else {
        resultsBox.innerHTML = "";
      }
    });

    function displaySuggestions(suggestions) {
      if (suggestions.length > 0) {
        const content = suggestions.map(suggestion => {
          return `<li onclick="selectInput('${suggestion}')">${suggestion}</li>`;
        }).join("");
        resultsBox.innerHTML = `<ul>${content}</ul>`;
      } else {
        resultsBox.innerHTML = "";
      }
    }

    function selectInput(value) {
      inputBox.value = value;
      resultsBox.innerHTML = "";
    }

    // Close the suggestion box when clicking outside of it
    document.addEventListener("click", function(event) {
      const isClickInside = document.querySelector(".search_box").contains(event.target);
      if (!isClickInside) {
        resultsBox.innerHTML = ""; // Hide suggestions
      }
    });
  </script>
</body>

</html>