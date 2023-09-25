const closeIcon = document.querySelector(".close");
const toast = document.querySelector(".toast");
const progress = document.querySelector(".toast-progress");

let timer1, timer2;

if (successMessage !== null){
    toast.classList.add("active");
    progress.classList.add("active");

    timer1 = setTimeout(() => {
        toast.classList.remove("active");
    }, 5000);

    timer2 = setTimeout(() => {
        progress.classList.remove("active");
    }, 5300);

    closeIcon.addEventListener("click", () => {
        toast.classList.remove("active");
    });
}