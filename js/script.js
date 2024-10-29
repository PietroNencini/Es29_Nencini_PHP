
let usa_flag = "./images/us-flag.gif";
let jpn_flag = "./images/ja-flag.gif";
let uk_flag = "./images/uk-flag.gif";
let swi_flag = "./images/sz-flag.gif";


function updateCountryFlag() {
    let image = document.getElementById("current_country");
    let selected_country = document.getElementById("foreign_country").value;
    let img_path = "";
    switch(selected_country) {
        case "us_d":
            img_path = usa_flag;
            break;
        case "sz_f":
            img_path = swi_flag;
            break;
        case "jp_y":
            img_path = jpn_flag;
            break;
        case "uk_p":
            img_path = uk_flag;
            break;
        default:
            console.log("ERRoRE");
    }
    image.src = img_path;
}