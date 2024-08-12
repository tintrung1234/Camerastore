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

function updateBrand(brandName) {
    // Mapping of English brand names to Vietnamese
    const brandDisplayNames = {
        Canon: "Canon",
        Nikon: "Nikon",
        fujifilm: "Fujifilm",
        ongkinh: "Ống Kính",
        boloc: "Bộ Lọc (Filter)",
        phukienanhsang: "Phụ Kiện Ánh Sáng",
        giado: "Bộ Giá Đỡ và Chân Máy",
        luutru: "Lưu Trữ",
        khac: "Khác",
    };

    // Update the displayed brand name
    document.getElementById("brand").innerText =
        brandDisplayNames[brandName] || brandName;

    // Hide all products first
    const allProducts = document.querySelectorAll(
        ".cartegory-right-content-item"
    );
    allProducts.forEach((product) => {
        product.style.display = "none"; // Hide all products
    });

    // Show products based on selected brand
    const brandProducts = document.querySelectorAll(
        `.cartegory-right-content-item#${brandName}`
    );
    brandProducts.forEach((product) => {
        product.style.display = "block"; // Show products for the selected brand
    });
}

// Array of products
const products = [
    // Nikon
    {
        id: 'Nikon',
        imgSrc: 'img/Nikon/Z9/Z9-1.jpg',
        name: 'Nikon Z 9',
        price: '1.000.000<sup>đ</sup>'
    },
    {
        id: 'Nikon',
        imgSrc: 'img/Nikon/D780/D780-1.jpg',
        name: 'Nikon D780',
        price: '1.000.000<sup>đ</sup>'
    },
    {
        id: 'Nikon',
        imgSrc: 'img/Nikon/Z30/Z30-1.jpg',
        name: 'Nikon Z 30',
        price: '1.500.000<sup>đ</sup>'
    },
    {
        id: 'Nikon',
        imgSrc: 'img/Nikon/ZF/ZF-1.jpg',
        name: 'Nikon Z F',
        price: '900.000<sup>đ</sup>'
    },
    {
        id: 'Nikon',
        imgSrc: 'img/Nikon/ZFc/ZFc-1.jpg',
        name: 'Nikon Z FC',
        price: '900.000<sup>đ</sup>'
    },
    // Canon
    {
        id: 'Canon',
        imgSrc: 'img/canon/200D/200D.png',
        name: 'Canon 200D',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/1500D-Kit/1500D-kit.png',
        name: 'Canon 1500D',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/3000D-Kit/3000D-kit.png',
        name: 'Canon 3000D',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/G7-X-mark/G7-X-mark.png',
        name: 'Canon G7-X-mark',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/R7/R7.png',
        name: 'Canon R7',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/R8/R8.png',
        name: 'Canon R8',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/R50/R50.png',
        name: 'Canon R50',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Canon',
        imgSrc: 'img/canon/R100/R100.png',
        name: 'Canon R100',
        price: '900.000<sup>đ</sup>'
    }
    // Fujifilm
    , {
        id: 'Fujifilm',
        imgSrc: 'img/Fujifilm/GFX 50S/GPX50S-1.jpg',
        name: 'Fujifilm GFX 50S',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Fujifilm',
        imgSrc: 'img/Fujifilm/X-H2/XH2-1.jpg',
        name: 'Fujifilm X-H2',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Fujifilm',
        imgSrc: 'img/Fujifilm/X-S20/XS20-1.jpg',
        name: 'Fujifilm X-S20',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Fujifilm',
        imgSrc: 'img/Fujifilm/X-T30/XT30-1.jpg',
        name: 'Fujifilm X-T30',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Sony',
        imgSrc: 'img/Sony/Alpha9III/Alpha9III-1.png',
        name: 'Sony Alpha 9 III',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Sony',
        imgSrc: 'img/Sony/Alpha6100/Alpha6100-1.png',
        name: 'Sony Alpha 6100',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'Sony',
        imgSrc: 'img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png',
        name: 'Sony Alpha ZV-E10 II',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'ongkinh',
        imgSrc: 'img/canon/lens/RF24-105/RF24-195 f 2.8 -1.png',
        name: 'RF24mm-195mm f/2.8L IS USM Z',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'ongkinh',
        imgSrc: 'img/canon/lens/RF35/RF35mm f 1.4 -1.png',
        name: 'RF35mm f/1.4 VCM',
        price: '900.000<sup>đ</sup>'
    }, {
        id: 'ongkinh',
        imgSrc: 'img/canon/lens/RF24-105/RF24-195 f 2.8 -1.png',
        name: 'RF24mm-195mm f/2.8L IS USM Z',
        price: '900.000<sup>đ</sup>'
    },
    {
        id: 'phukienanhsang',
        imgSrc: 'img/canon/phukien/speedlite.png',
        name: 'Speedlite EL-1',
        price: '900.000<sup>đ</sup>'
    }


];

// Function to display products
function displayProducts() {
    const container = document.getElementById("cartegory-right-content");

    products.forEach((product) => {
        const productDiv = document.createElement("div");
        productDiv.className = "cartegory-right-content-item";
        productDiv.id = product.id;

        productDiv.innerHTML = `
            <a>
                <img src="${product.imgSrc}" alt="${product.name}">
                <h1>${product.name}</h1>
            </a>
            <p>${product.price}</p>
        `;

        container.appendChild(productDiv);
    });
}
function showAllProducts(category) {
    document.getElementById("brand").innerText =
        category === "products" ? "Sản phẩm" : "Phụ kiện";

    // Hide all products first
    const allProducts = document.querySelectorAll(
        ".cartegory-right-content-item"
    );
    allProducts.forEach((product) => {
        product.style.display = "none"; // Hide all products
    });

    if (category === "products") {
        const productItems = document.querySelectorAll(
            '.cartegory-right-content-item[id="Nikon"], .cartegory-right-content-item[id="Canon"], .cartegory-right-content-item[id="Fujifilm"], .cartegory-right-content-item[id="Panasonic"], .cartegory-right-content-item[id="Sony"]'
        );
        productItems.forEach((product) => {
            product.style.display = "block"; // Show all products
        });
    } else if (category === "accessories") {
        const accessoryItems = document.querySelectorAll(
            '.cartegory-right-content-item[id="ongkinh"], .cartegory-right-content-item[id="boloc"], .cartegory-right-content-item[id="phukienanhsang"], .cartegory-right-content-item[id="giado"], .cartegory-right-content-item[id="luutru"], .cartegory-right-content-item[id="khac"]'
        );
        accessoryItems.forEach((product) => {
            product.style.display = "block"; // Show all accessories
        });
    }
}

// Call the function to display products
displayProducts();
