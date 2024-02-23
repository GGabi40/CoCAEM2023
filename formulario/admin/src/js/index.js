document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("hit");
    const header = document.getElementById("header");
    const toggleTotal = document.querySelector('.toggle');

    toggleBtn.addEventListener("click", () => {
        header.classList.toggle('open');

        if (header.classList.contains("open")) {
            header.classList.add("slide-in");
        } else {
            header.classList.remove("slide-in");
        }

        toggleTotal.classList.toggle("open");
    });


});