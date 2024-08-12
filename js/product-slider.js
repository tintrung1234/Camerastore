"use strict";

productScroll();

function productScroll() {
    const slider = document.getElementById("slider");
    const next = document.getElementsByClassName("pro-next")[0];
    const prev = document.getElementsByClassName("pro-prev")[0];
    const slide = document.getElementById("canon-product-group");
    const slide1 = document.getElementById("nikon-product-group");
    const slide2 = document.getElementById("sony-product-group");

    let position = 0;

    prev.addEventListener("click", function () {
        if (position > 0) {
            position -= 1;
            translateX(position);
        }
    });

    next.addEventListener("click", function () {
        console.log(this.parentElement);
        if (position < hiddenItems()) {
            position += 1;
            translateX(position, this.parentElement);
        }
    });

    function hiddenItems() {
        // Get hidden items
        const items = getCount(slide, false);
        const visibleItems = Math.floor(slider.offsetWidth / 210);
        return items - visibleItems;
    }
}

function translateX(position, elementID) {
    // Translate items
    const slide = document.getElementById(elementID);
    slide.style.transform = `translateX(${-position * 650}px)`;
}

function getCount(parent, getChildrensChildren) {
    // Count number of items
    let relevantChildren = 0;
    const children = parent.children; // Use children instead of childNodes for better performance
    for (let i = 0; i < children.length; i++) {
        if (getChildrensChildren) {
            relevantChildren += getCount(children[i], true);
        }
        relevantChildren++;
    }
    return relevantChildren;
}