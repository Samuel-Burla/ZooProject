
const menuList = document.getElementById("menu");
const IconButton = document.getElementsByClassName("show_menu_button")[0];

function showMenu() {
  menuList.classList.toggle("show_menu");
}
IconButton.addEventListener("click", showMenu);
