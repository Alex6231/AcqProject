const body = document.querySelector("#body");

let isLocked = false;
const popupButton = document.querySelector("#popupButton");
const popupBackground = document.querySelector("#popupBackground");

popupButton.addEventListener("click", ()=>{
    if (!isLocked) {
    body.style.paddingRight = window.innerWidth - document.documentElement.clientWidth +"px"
    popupBackground.classList.add("active");
    isLocked = true;
    setTimeout(()=>{
        isLocked = false;
    }, 1000);
        body.classList.add("lock")
    }
})

popupBackground.addEventListener("click", (event)=>{
    if (event.target.classList.contains("active")) {
    popupBackground.classList.remove("active");
    body.classList.remove("lock");
    body.style.paddingRight = ""
    }
})

