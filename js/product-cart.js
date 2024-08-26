let products = [];

document.querySelectorAll(".addToCart").forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.getAttribute("data-id");
    const quantityInput = document.getElementById(`userCount-${id}`);
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = ++currentValue;
    console.log(quantityInput.value);
  });
});

document.querySelectorAll(".delToCart").forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.getAttribute("data-id");
    const quantityInput = document.getElementById(`userCount-${id}`);
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 0) {
      quantityInput.value = --currentValue;
      console.log(quantityInput.value);
    }
  });
});
// Cart functionality
var cart = [];

function displayBuyBox(id) {
  const target = document.getElementsByClassName(`notiBox-${id}`);
  if (target.length > 0) {
    target[0].style.display = "block";
  }
}

function openProductDetail(id) {
  window.location.href = `product.html?id=${id}`;
}
