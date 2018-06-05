/**
 * Created by Marcus Jacobsson on 2015-01-12.
 */
window.onload = function setActive() {
    //Depending on the title of the page, the navbar item classes gets swapped out.
    switch (document.title) {
        case "OttoMaTech Start":
            document.getElementById("nav_item_start").className = "active";
            document.getElementById("nav_item_services").className = "";
            document.getElementById("nav_item_contact").className = "";
            document.getElementById("nav_item_sale").className = "";
            break;
        case "OttoMaTech Services":
            document.getElementById("nav_item_start").className = "";
            document.getElementById("nav_item_services").className = "active";
            document.getElementById("nav_item_contact").className = "";
            document.getElementById("nav_item_sale").className = "";
            break;
        case "OttoMaTech Contact":
            document.getElementById("nav_item_start").className = "";
            document.getElementById("nav_item_services").className = "";
            document.getElementById("nav_item_contact").className = "active";
            document.getElementById("nav_item_sale").className = "";
            break;
        case "OttoMaTech Sale":
            document.getElementById("nav_item_start").className = "";
            document.getElementById("nav_item_services").className = "";
            document.getElementById("nav_item_contact").className = "";
            document.getElementById("nav_item_sale").className = "active";
            break;
    }
}