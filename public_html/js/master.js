window.onload = function() {
    printYear();
    // ...
};

function searchbarValue(focused) {
    let field = document.getElementsByName("searchbar")[0];

    if (focused && field.value === "Search") {
        field.value = "";
    } else if (field.value === "") {
        field.value = "Search";
    }
}

function whenResized() {
    let list = document.getElementById("nav-list").getElementsByTagName("li");

    if (window.innerWidth < 600) {
        for (let item of list) {
            item.style.display = "none";
        }

        document.getElementById("drop-icon").style.display = "block";

    } else {
        toggleDropdown(true);
        document.getElementById("drop-icon").style.display = "none";
    }
}

function toggleDropdown(reset = false) {
    let icon = document.getElementById("drop-icon").getElementsByTagName("a");
    let nav = document.getElementById("nav-list");
    let list = nav.getElementsByTagName("li");

    if (reset || icon[0].innerHTML === "x") {
        icon[0].innerHTML = "≡";
        nav.style.flexDirection = "row";

        if (reset) {
            for (let item of list) {
                item.style.display = "block";
            }
        } else {
            for (let item of list) {
                item.style.display = "none";
            }
        }

        list[0].style.display = "block";

    } else {
        icon[0].innerHTML = "x";
        nav.style.flexDirection = "column";

        for (let item of list) {
            item.style.display = "block";
        }
    }
}

function printYear() {
    document.getElementById("yr").innerHTML = new Date().getUTCFullYear();
}
