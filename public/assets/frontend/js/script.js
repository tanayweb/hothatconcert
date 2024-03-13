// More Button toggle
const morebtn = document.querySelector(".bars");
const sideNav = document.querySelector(".sidenav");

morebtn.addEventListener("click", () => {
    morebtn.classList.toggle("active");
    sideNav.classList.toggle("active");
})

// Premium page popup js
function closepopup(){
    document.querySelector(".membership_popup").style.display = "none";
}

// Owl Carousel
$(document).ready(function () {
    $(".owl-carousel").owlCarousel();
});
// Videos slider js
$('.videoslider').owlCarousel({
    nav: true,
    pagination : true,
    loop : true,
    dots: false,
    autoplay : false,
    slideSpeed : 300,
    paginationSpeed : 400,
    margin: 0,
    
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});