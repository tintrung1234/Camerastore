//show product
const product = [
    {
        id: 0,
        image: "./img/devImg.jpg",
        title: "test Image",
        price: 123412,
        type: "canon",
    }
];

const categories = [...new Set(product.map((item) => { return item; }))];
let i = 0;
var cartIcon = './img/carticon.png';

document.getElementById("product").innerHTML = categories
    .map((item) => {
        var { image, title, price } = item;
        return (
            `<img class="productImg" src=${image} alt="">
            <label class="productName" for="">${title}</label>
            <p class="productPrice">VND ${price}</p>` +
            `<button class='addCart' onclick='addtocart(` + i++ + `)'>
            <img src = "img/carticon.png" alt='cartIcon'> 
            <p class='muahang'> Mua hang</p>
            </button >`
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