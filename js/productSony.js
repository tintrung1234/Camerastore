const sonyProducts = product.filter(item => item.type === 'sony');

function displayProducts(products, elementId) {
    document.getElementById(elementId).innerHTML = products
        .map((item) => {
            var { id, image, title, price } = item;
            return (
                `<div id="product" class=""><a class="productLink" onclick="openProductDetail(${id})" >
                <img class="productImg" src=${image} alt=""></a>
                <label class="productName" for="">${title}</label>
                <p class="productPrice">Giá từ <strong> ${price} </strong></p>` +
                `<button class='addCart' onclick='displayBuyBox(${id})'>
                <img src="img/carticon.png" alt='cartIcon'> 
                <p class='muahang'> Mua hàng</p>
                </button></div>`
            );
        }).join("");
}

displayProducts(sonyProducts, "sony-product-group");