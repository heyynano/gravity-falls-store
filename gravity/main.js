// navbar......................................................
window.addEventListener("scroll", function () {
    let navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("bg-white", "shadow-md");
    } else {
        navbar.classList.remove("bg-white", "shadow-md");
    }
});
// scroll animation ------------------------------------------------------------------

    

    