//--------Slidebar-Cartegory-----------
const itemslidebar = document.querySelectorAll(".cartegory-left-li");
itemslidebar.forEach(function (menu, index) {
  menu.addEventListener("click", function () {
    menu.classList.toggle("block");
  });
});

//---------Filter---------
document.getElementById("filter-toggle").addEventListener("click", function () {
  var filterSection = document.getElementById("filter-section");
  if (
    filterSection.style.display === "none" ||
    filterSection.style.display === ""
  ) {
    filterSection.style.display = "flex";
  } else {
    filterSection.style.display = "none";
  }
});

function showCategory(category) {
  // Ẩn tất cả các mặt hàng
  const allItems = document.querySelectorAll(".cartegory-right-content-item");
  allItems.forEach((item) => (item.style.display = "none"));

  let itemsToShow = [];

  if (category === "products") {
    itemsToShow = ["canon", "nikon", "sony", "fujifilm", "panasonic"];
  } else if (category === "accessories") {
    itemsToShow = ["ongkinh", "giado", "phukienanhsang", "luutru", "khac"];
  }

  // Hiện các mặt hàng tương ứng
  itemsToShow.forEach((id) => {
    const items = document.querySelectorAll(`#${id}`);
    items.forEach((item) => {
      item.style.display = "block";
    });
  });
}

function filterByBrand(brand) {
  const items = document.querySelectorAll(".cartegory-right-content-item");
  items.forEach((item) => {
    if (item.id === brand.toLowerCase()) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
}
