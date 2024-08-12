document.getElementById("navBar").innerHTML = `
<div class="container aligncenter">
      <div class="blockNav1 hideOnMobile">
        <div class="logo">
          <a href="home.html">
            <img src="./img/ProCam.png" alt="" />
          </a>
        </div>
        <div class="dropdown">
        <a href="home.html">
          <button class="subBtn">
            Trang chủ
          </button>
        </a>
        </div>
        <div class="dropdown">
          <a href="category.html" ><button class="subBtn" >Sản phẩm</button></a>
          <div class="dropdown-content">
            <a href="#" class="brand-link">Canon</a>
            <div class="sub-dropdown">
              <li>
                <p>Phân loại</p>
                <ul>
                  <li><a href="#">Máy Ảnh DSLR</a></li>
                  <li><a href="#">Máy Ảnh Mirrorless</a></li>
                  <li><a href="#">Máy Ảnh Compact</a></li>
                </ul>
              </li>

              <li>
                <p>Giá cả</p>
                <ul>
                  <li><a href="#">Dưới 10 triệu</a></li>
                  <li><a href="#">Từ 10 - 20 triệu</a></li>
                  <li><a href="#">Trên 20 triệu</a></li>
                </ul>
              </li>
            </div>
            <a href="#">Nikon</a>
            <div class="sub-dropdown">
              <li>
                <p>Phân loại</p>
                <ul>
                  <li><a href="#">Máy Ảnh DSLR</a></li>
                  <li><a href="#">Máy Ảnh Mirrorless</a></li>
                  <li><a href="#">Máy Ảnh Compact</a></li>
                </ul>
              </li>

              <li>
                <p>Giá cả</p>
                <ul>
                  <li><a href="#">Dưới 10 triệu</a></li>
                  <li><a href="#">Từ 10 - 20 triệu</a></li>
                  <li><a href="#">Trên 25 triệu</a></li>
                </ul>
              </li>
            </div>
            <a href="#">Fujifilm</a>
            <div class="sub-dropdown">
              <li>
                <p>Phân loại</p>
                <ul>
                  <li><a href="#">Máy Ảnh DSLR</a></li>
                  <li><a href="#">Máy Ảnh Mirrorless</a></li>
                  <li><a href="#">Máy Ảnh Compact</a></li>
                </ul>
              </li>

              <li>
                <p>Giá cả</p>
                <ul>
                  <li><a href="#">Dưới 10 triệu</a></li>
                  <li><a href="#">Từ 10 - 20 triệu</a></li>
                  <li><a href="#">Trên 30 triệu</a></li>
                </ul>
              </li>
            </div>
            <a href="#">Sony</a>
            <div class="sub-dropdown">
              <li>
                <p>Phân loại</p>
                <ul>
                  <li><a href="#">Máy Ảnh DSLR</a></li>
                  <li><a href="#">Máy Ảnh Mirrorless</a></li>
                  <li><a href="#">Máy Ảnh Compact</a></li>
                </ul>
              </li>

              <li>
                <p>Giá cả</p>
                <ul>
                  <li><a href="#">Dưới 10 triệu</a></li>
                  <li><a href="#">Từ 10 - 20 triệu</a></li>
                  <li><a href="#">Trên 40 triệu</a></li>
                </ul>
              </li>
            </div>
            <a href="#">Panasonic</a>
            <div class="sub-dropdown">
              <li>
                <p>Phân loại</p>
                <ul>
                  <li><a href="#">Máy Ảnh DSLR</a></li>
                  <li><a href="#">Máy Ảnh Mirrorless</a></li>
                  <li><a href="#">Máy Ảnh Compact</a></li>
                </ul>
              </li>

              <li>
                <p>Giá cả</p>
                <ul>
                  <li><a href="#">Dưới 10 triệu</a></li>
                  <li><a href="#">Từ 10 - 20 triệu</a></li>
                  <li><a href="#">Trên 50 triệu</a></li>
                </ul>
              </li>
            </div>
          </div>
        </div>
        <div class="dropdown">
          <a href="category.html"><button class="subBtn">Phụ kiện</button></a>
          <div class="dropdown-content">

            <a href="#" >Ống Kính</a>
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
          <a href="repair.html"><button class="subBtn">Sửa chữa</button></a>
        </div>
        <div class="dropdown">
          <a href="event.html">
            <button class="subBtn">Khuyến mãi</button>
          </a>
        </div>
        <div class="dropdown">
          <a href="contact.html"><button class="subBtn">Liên hệ</button></a>
        </div>
        <div class="dropdown">
          <button class="subBtn">Bảo hành</button>
        </div>
        </div>
        <button onclick=showSidebar() class="showOnMobile hideOnNavbar "><img class='menuImg' src='./img/menu.png'></button>
      <div class="blockNav2 hideOnMobile widthOnMobile">
        <div class="search_box hideOn">
          <div class="row-search-box">
            <input type="text" id="input-box" name="input-box" autocomplete="off" placeholder="Tìm kiếm" />
            <button>
              <img src="img/SearchIcon.png" />
            </button>
          </div>
          <div class="result-box"></div>
        </div>
        <div id="totalCart" class='hideOnMobile'>
          <p class='hideOnMobile' id="count">0</p>
          <a href="cart_detail.html">
            <img class='hideOnMobile' src="./img/carticon.png" alt="" />
          </a>
        </div>
      </div>
    </div>

    
    <div class="sideBar hideOnNavbar">
      <div class="logo">
        <a href="Home.html">
          <img src="./img/ProCam.png" alt="" />
        </a>
        <button onclick=hideSidebar() class="closeBtn showOnMobile"><img class='menuImg' src='./img/close.png'></button>
      </div>
      <div class="blockNav1 hideOnMobile">

        <div class="dropdown">
        <a href="Home.html">
          <button class="subBtn">
            Trang chủ
          </button>
        </a>
        </div>
        <div class="dropdown">
          <a href="category.html">
            <button class="subBtn">Sản phẩm</button>
          </a>
        </div>
        <div class="dropdown">
          <button class="subBtn">Phụ kiện</button>
        </div>
        <div class="dropdown">
          <button class="subBtn">Sửa chữa</button>
        </div>
        <div class="dropdown">
          <button class="subBtn">Khuyến mãi</button>
        </div>
        <div class="dropdown">
          <button class="subBtn">Liên hệ</button>
        </div>
        <div class="dropdown">
          <button class="subBtn">Bảo hành</button>
        </div>
      </div>
`;
function showSidebar() {
  const sidebar = document.querySelector(".sideBar");
  sidebar.style.display = "flex";
}
function hideSidebar() {
  const sidebar = document.querySelector(".sideBar");
  sidebar.style.display = "none";
}
