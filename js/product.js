const des = document.querySelector(".describe")
const info = document.querySelector(".info")
const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")

smallImg.forEach(function(imgItem,X){
    imgItem.addEventListener("click",function(){
        bigImg.src = imgItem.src
    })
})


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

const butTon = document.querySelector(".product-content-right-bottom-top") 

if(butTon){
    butTon.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
    })
}