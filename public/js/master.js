function setup() {
    printYear();
    // ...
}

function toggleDropdown() {
    let navbar = document.getElementById("navigation");

    if (window.innerWidth < 600) {
        // enable
    } else {
        // disable
    }
}

function printYear() {
    document.getElementById("yr").innerHTML = new Date().getUTCFullYear();
}
