function setup() {
    printYear();
    // ...
}

function setDropdown() {
    let navbar = document.getElementById("navigation");

    if (window.innerWidth < 600) {
        // enable
    } else {
        toggleDropdown(true);
    }
}

// Needs testing / finishing
function toggleDropdown(reset = false) {
    let icon = document.getElementById("drop-icon");
    let nav = document.getElementById("navigation").getElementsByTagName("li");
    let list = nav.getElementsByTagName("ul");

    if (reset || icon.innerHTML === "x") {
        icon.innerHTML = "≡";
        nav[0].style.flexDirection = "row";

        for (let item of list) {
            item.style.display = "none";
        }

    } else {
        icon.innerHTML = "x";
        nav[0].style.flexDirection = "column";

        for (let item of list) {
            item.style.display = "none";
        }
    }
}

function printYear() {
    document.getElementById("yr").innerHTML = new Date().getUTCFullYear();
}
