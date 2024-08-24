let products = [];

// // Fetch products from the PHP script
// fetch('./php/products.php')
//     .then(response => response.json())
//     .then(data => {
//         console.log(data);
//         products = data; // Store the fetched products in the global variable
//         document.getElementById("buyBox").innerHTML = categories
//             .map((item) => {
//                 const categoryProducts = products.filter(product => product.type === item);
//                 return categoryProducts.map(product => {
//                     const { id, images, title, price } = product;
//                     const image = JSON.parse(images)[0]; // Get the primary image
//                     return (
//                         `<div class="notiBox-${id}" id="notiBox" style="display: none;">
//                             <div class="backgroundNoti"></div>
//                             <div class="littleBox">
//                                 <button class="exitBtn" id="exitBtn" onclick="this.parentElement.parentElement.style.display='none'">X</button>
//                                 <div class="firstInfo">
//                                     <div class="imgAndInfo">
//                                         <img src="${image}" alt="" class="imgInLittleBox">
//                                         <div class="productInfo">
//                                             <h2>${title}</h2>
//                                             <p>VND ${price}</p>
//                                         </div>
//                                     </div>
//                                     <div class="amountproduct">
//                                         <button class="addToCart" onclick='addtocart(${id})'>+</button>
//                                         <p id='displayCount-${id}'>0</p>
//                                         <button class="delToCart" onclick='delElement(${id})'>-</button>
//                                     </div>
//                                 </div>
//                                 <div class="eventGift">
//                                     <h2><img class="giftIcon" src="img/giftbox.png" alt="">Chương trình khuyến mãi</h2>
//                                     <p class="eventDes">Tặng thẻ nhớ 64GB</p>
//                                 </div>
//                                 <div class="lastInfo">
//                                     <div class="countBox">
//                                         <h2 class="priceTemp">Tạm tính: <strong class='displayPrice'>0</strong></h2>
//                                     </div>
//                                     <button class="buyBtn"><a href="cart_detail.html"> Xác nhận mua</a></button>
//                                 </div>
//                             </div>
//                         </div>`
//                     );
//                 }).join('');
//             }).join('');
//     })
// // .catch(error => console.error('Error fetching products:', error));

document.querySelectorAll('.addToCart').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const quantityInput = document.getElementById(`userCount-${id}`);
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = ++currentValue;
        console.log(quantityInput.value);
    });
});

document.querySelectorAll('.delToCart').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
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
    window.open(`product.html?id=${id}`);
}
