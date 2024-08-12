// Mảng các tên để tìm kiếm
const names = ["Fujifilm"];

// Hàm xử lý tìm kiếm
function searchByName() {
  const inputBox = document.getElementById("input-box");
  const searchTerm = inputBox.value.toLowerCase();
  const results = names.filter((name) =>
    name.toLowerCase().includes(searchTerm)
  );

  // Hiển thị kết quả
  console.log("Kết quả tìm kiếm:", results);
  // Bạn có thể hiển thị kết quả trên giao diện người dùng theo cách bạn muốn
}

// Gán sự kiện cho nút tìm kiếm
document.querySelector("button").addEventListener("click", searchByName);

// Gán sự kiện cho ô nhập để tìm kiếm khi nhấn Enter
document
  .getElementById("input-box")
  .addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      searchByName();
    }
  });
