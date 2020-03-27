function setup() {
    printYear();
    // ...
}

function setDropdown() {
    let navbar = document.getElementById("navigation");

    if (window.innerWidth < 600) {
        // ...
    } else {
        toggleDropdown(true);
    }
}

function toggleDropdown(reset = false) {
    let icon = document.getElementById("drop-icon");
    let nav = document.getElementById("nav-list");
    let list = nav.getElementsByTagName("li");

    if (reset || icon.innerHTML === "x") {
        icon.innerHTML = "≡"; // issue here
        nav.style.flexDirection = "row";

        for (let item of list) {
            item.style.display = "none";
        }

    } else {
        icon.innerHTML = "x";
        nav.style.flexDirection = "column";

        for (let item of list) {
            item.style.display = "block";
        }
    }
}

function printYear() {
    document.getElementById("yr").innerHTML = new Date().getUTCFullYear();
}
