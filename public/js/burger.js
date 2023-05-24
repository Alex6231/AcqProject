const burgerMenuButton = document.querySelector("#burgerMenuButton");
const burgerMenu = document.querySelector("#burgerMenu");

burgerMenuButton.addEventListener("click", ()=>{
    burgerMenu.classList.toggle("active");
    burgerMenuButton.classList.toggle("active");
})
