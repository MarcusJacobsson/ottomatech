window.onload = function setActive() {
    //Depending on the title of the page, the navbar item classes gets swapped out.
    switch (document.title) {
        case "OttoMaTech Min Sida":
            document.getElementById("nav_item_my_site").className = "active";
            document.getElementById("nav_item_ads").className = "";
            break;
        case "OttoMaTech Annonser":
            document.getElementById("nav_item_my_site").className = "";
            document.getElementById("nav_item_ads").className = "active";
            break;
    }
}