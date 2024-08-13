const signInButton = document.getElementById("signIn");
const signUpButton = document.getElementById("signUp");
const container = document.getElementById("container-login");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

document
  .querySelector(".sign-in-container form")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const usernameOrEmail = this.querySelector("input[type='email']").value;
    const password = this.querySelector("input[type='password']").value;

    console.log("Đăng nhập với:", usernameOrEmail, password);
  });

document
  .querySelector(".sign-up-container form")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Ngăn chặn reload trang
    const username = this.querySelector("input[type='text']").value;
    const email = this.querySelector("input[type='email']").value;
    const password = this.querySelectorAll("input[type='password']")[0].value;
    const confirmPassword = this.querySelectorAll("input[type='password']")[1]
      .value;

    // Kiểm tra mật khẩu
    if (password !== confirmPassword) {
      alert("Mật khẩu không khớp!");
      return;
    }

    console.log("Đăng ký với:", username, email, password);
  });

// Lấy các phần tử cần thiết
const forgotPasswordLink = document.querySelector(".sign-in-container a");
const modal = document.getElementById("forgotPasswordModal");
const closeModal = document.querySelector(".close");
const sendResetLinkButton = document.getElementById("sendResetLink");

// Hiển thị modal khi nhấn vào "Quên mật khẩu?"
forgotPasswordLink.addEventListener("click", (event) => {
  event.preventDefault(); // Ngăn chặn reload trang
  modal.style.display = "block";
});

// Đóng modal khi nhấn vào nút đóng
closeModal.addEventListener("click", () => {
  modal.style.display = "none";
});

// Đóng modal khi nhấn ra ngoài modal
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

// Gửi liên kết khôi phục mật khẩu
sendResetLinkButton.addEventListener("click", () => {
  const email = document.getElementById("forgotEmail").value;

  // Xử lý gửi yêu cầu khôi phục mật khẩu (thay thế bằng logic thực tế của bạn)
  console.log("Gửi liên kết khôi phục đến:", email);
  alert("Liên kết khôi phục đã được gửi đến email của bạn!");

  // Đóng modal sau khi gửi yêu cầu
  modal.style.display = "none";
});
