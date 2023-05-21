const likeButtons = document.querySelectorAll("#likeButton")
likeButtons.forEach((button)=>{
    button.addEventListener("click", (event)=>{
        event.target.classList.toggle("active");
        event.preventDefault();
    })
})
