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
document.getElementById("product").innerHTML = categories
    .map((item) => {
        var { image, title, price } = item;
        return (
            `<img class="productImg" src=${image} alt="">
            <label class="productName" for="">${title}</label>
            <p class="productPrice">VND ${price}</p>
            <button class="addCart">
                <img src="img/carticon.png" alt="cartIcon">
                <p class="muahang">Mua hang</p>
            </button>`
        );
    }).join("");

