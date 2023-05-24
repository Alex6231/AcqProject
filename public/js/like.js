const likeButtons = document.querySelectorAll(".likeButton")
likeButtons.forEach((button)=>{
    button.addEventListener("click", (event)=>{
        event.preventDefault();
        event.target.classList.toggle("active");

        let form = new FormData;
        form.append("id", event.target.id);

        const token = document.querySelector("input").value

        fetch("/like-user", {
            method: "post",
            body: form,
            headers: {
                'x-csrf-token' : token}
        });
    })
})
