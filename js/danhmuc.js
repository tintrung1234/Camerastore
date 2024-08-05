//--------Slidebar-Cartegory-----------
const itemslidebar = document.querySelectorAll(".cartegory-left-li")
itemslidebar.forEach(function (menu, index) {
    menu.addEventListener("click", function () {
        menu.classList.toggle("block")
    })
})


//---------Filter---------
document.getElementById('filter-toggle').addEventListener('click', function () {
    var filterSection = document.getElementById('filter-section');
    if (filterSection.style.display === 'none' || filterSection.style.display === '') {
        filterSection.style.display = 'flex';
    } else {
        filterSection.style.display = 'none';
    }
});