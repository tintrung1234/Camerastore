const des = document.querySelector(".describe")
const info = document.querySelector(".info")

if(des){
    des.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-describe").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-info").style.display = "block"
    })
}

if(info){
    info.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-describe").style.display = "block"
        document.querySelector(".product-content-right-bottom-content-info").style.display = "none"
    })
}