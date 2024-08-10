"use strict";

productScroll();

function productScroll() {
    const slider = document.getElementById("slider");
    const next = document.getElementsByClassName("pro-next")[0]; // Get the first button
    const prev = document.getElementsByClassName("pro-prev")[0]; // Get the first button
    const slide = document.getElementById("product-group");

    let position = 0; // Slider position

    prev.addEventListener("click", function () {
        // Click previous button
        if (position > 0) {
            position -= 1;
            translateX(position); // Translate items
        }
    });

    next.addEventListener("click", function () {
        if (position < hiddenItems()) {
            position += 1;
            translateX(position); // Translate items
        }
    });

    function hiddenItems() {
        // Get hidden items
        const items = getCount(slide, false);
        const visibleItems = Math.floor(slider.offsetWidth / 210); // Adjust based on item width
        return items - visibleItems; // Return the number of items that can be scrolled
    }
}

function translateX(position) {
    // Translate items
    const slide = document.getElementById("product-group");
    slide.style.transform = `translateX(${-position * 650}px)`; // Use transform for smoother animations
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
