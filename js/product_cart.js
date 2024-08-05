//show product
const product = [
    {
        id: 1,
        image: "./img/canon/200D/200D.png",
        title: "Canon 200D",
        price: 40000,
        type: "canon",
    },
    {
        id: 2,
        image: "./img/canon/1500D-kit/1500D-kit.png",
        title: "Canon 1500D-kit",
        price: 43000,
        type: "canon",
    },
    {
        id: 3,
        image: "./img/canon/3000D-kit/3000D-kit.png",
        title: "Canon 3000D-kit",
        price: 16000,
        type: "canon",
    },
    {
        id: 4,
        image: "./img/canon/G7-X-mark/G7-X-mark.png",
        title: "Canon G7-X-mark",
        price: 23100,
        type: "canon",
    },
    {
        id: 5,
        image: "./img/canon/phukien/speedlite.png",
        title: "Đèn speedlite",
        price: 5400,
        type: "phukien",
    },
    {
        id: 6,
        image: "./img/canon/R7/R7.png",
        title: "Canon R7",
        price: 54322,
        type: "canon",
    },
    {
        id: 7,
        image: "./img/canon/R8/R8.png",
        title: "Canon R8",
        price: 54323,
        type: "canon",
    },
    {
        id: 8,
        image: "./img/canon/R50/R50.png",
        title: "Canon R50",
        price: 32554,
        type: "canon",
    },
    {
        id: 9,
        image: "./img/canon/R100/R100.png",
        title: "Canon R100",
        price: 4325220,
        type: "canon",
    },
    {
        id: 10,
        image: "./img/canon/SX740-HS/SX740-HS.png",
        title: "Canon SX740-HS",
        price: 540030,
        type: "canon",
    }
];

const categories = [...new Set(product.map((item) => { return item; }))];
let i = 1;
var cartIcon = './img/carticon.png';

document.getElementById("product-group").innerHTML = categories
    .map((item) => {
        var { image, title, price } = item;
        return (
            `<div id="product"><a href="product.html" class="productLink">
            <img class="productImg" src=${image} alt=""></a>
            <label class="productName" for="">${title}</label>
            <p class="productPrice">VND ${price}</p>` +
            `<button class='addCart' onclick='addtocart(` + i++ + `)'>
            <img src = "img/carticon.png" alt='cartIcon'> 
            <p class='muahang'> Mua hàng</p>
            </button > </div>`
        );
    }).join("");

//Cart
var cart = [];

function addtocart(a) //a: any item 
{
    const selectedProduct = { ...categories[a] };
    const existingItem = cart.find(item => item.id === selectedProduct.id);

    if (existingItem) {

        // If the product already exists in the cart, increment its quantity
        existingItem.quantity = (existingItem.quantity || 1) + 1;
    }
    else {
        // If the product is not in the cart, add it with quantity 1
        selectedProduct.quantity = 1;
        cart.push(selectedProduct);
    }
    displaycart();
}

function delElement(a) {
    cart.splice(a, 1);
    displaycart();
}

function displaycart() {
    var totalQuantity = 0;
    cart.map((items, idx) => {
        var { quantity } = items;
        totalQuantity += quantity;
        document.getElementById("count").innerHTML = totalQuantity;
    }).join("");
}