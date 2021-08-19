const drop_btn = document.querySelector(".drop-btn span");
const tooltip = document.querySelector(".tooltip");
const menu_profile = document.querySelector(".drop-profile");
const menu_bar = document.querySelector(".menu-bar");

const btnProfile = document.querySelector("#btn-profile");
btnProfile.onclick = () => {
    drop_btn.click();
}
drop_btn.onclick = (() => {
    menu_profile.classList.toggle("show");
    tooltip.classList.toggle("show");
});