const menuBurger = document.querySelector('.menuBurger');
const navBarre = document.querySelector('.navBarre');

menuBurger.addEventListener("click", () => {
    navBarre.classList.toggle('navBarreDisplayBlock');
    navBarre.classList.toggle('navBarreDisplayNone');
    menuBurger.classList.toggle('spanChange');
});