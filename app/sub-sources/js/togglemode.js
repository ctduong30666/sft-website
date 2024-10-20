const togglebtn = document.getElementById("mode-toggle_btn");
var bgcolor = document.getElementById("main_content");
var main_box = document.getElementById("main_box");
var health_box = document.getElementById("health-box");
var register_box = document.getElementById("register-box");
var sub_logo = document.getElementById("sub-logo");
var header_box = document.getElementById("header-box");
var device_box = document.getElementById("device-box");
var device_right_content = document.getElementById("device-right-content");
var login_btn = document.getElementById("login-btn");
var register_btn = document.getElementById("register-btn");
var water_amount = document.getElementById("water-amount");
var icon = document.querySelectorAll(".icon");
var input = document.querySelectorAll(".input");
var menu = document.querySelectorAll(".dropdown-menu");
var progress_number = document.getElementById("progress-number");
var outer = document.querySelectorAll(".outer");
var inner = document.querySelectorAll(".inner");
var advice = document.querySelectorAll(".advice");
var advice_input = document.querySelectorAll(".advice-input");
var health_box_new = document.getElementById("health-box-new");
var homeBox = document.getElementById("home-box");
var logoutBtn = document.querySelector(".logout");

togglebtn.addEventListener("change", function () {
  if (this.checked) {
    bgcolor.style.backgroundColor = "#0A1621";
    bgcolor.style.color = "#fff";
    main_box.style.backgroundColor = "#162231";
    main_box.style.boxShadow = "none";
    health_box.style.backgroundColor = "#121e2d";
    register_box.style.backgroundColor = "#121e2d";
    sub_logo.style.color = "#fff"; // Dark mode
    sub_logo.style.textShadow = "1px 1px 2px rgba(0, 0, 0, 0.5)"; // Thêm hiệu ứng bóng cho sub-logo
    device_box.style.backgroundColor = "#121e2d";
    device_right_content.style.backgroundColor = "#121e2d";
    login_btn.style.color = "#fff";
    register_btn.style.color = "#fff";
    water_amount.style.color = "#fff";
    icon.forEach((icon) => {
      icon.style.color = "#fff";
    });
    input.forEach((input) => {
      input.style.color = "#fff";
      input.style.borderColor = "#fff";
      input.style.backgroundColor = "#121e2d";
      input.style.placeholder = "#fff";
    });
    menu.forEach((menu) => {
      menu.style.backgroundColor = "#121e2d";
      menu.style.boxShadow = "rgba(0, 0, 0, 0.3) 0px 4px 12px";
    });
    progress_number.style.color = "#fff";
    outer.forEach((outer) => {
      outer.style.boxShadow =
        "6px 6px 10px -1px rgba(0, 0, 0, 0.15), -6px -6px 10px -1px rgba(255, 255, 255, 0.7)";
    });
    inner.forEach((inner) => {
      inner.style.boxShadow =
        "inset 4px 4px 6px -1px rgba(0, 0, 0, 0.2), inset -4px -4px 6px -1px rgba(255, 255, 255, 0.7), -0.5px -0.5px 0px rgba(255, 255, 255, 1), 0.5px 0.5px 0px rgba(0, 0, 0, 0.15)";
    });
    advice_input.forEach((advice_input) => {
      advice_input.style.color = "#fff";
      advice_input.style.borderColor = "#fff";
      advice_input.style.backgroundColor = "#121e2d";
      advice_input.style.placeholder = "#fff";
    });
    health_box_new.style.backgroundColor = "#121e2d";
    homeBox.style.backgroundColor = "#121e2d";
  } else {
    bgcolor.style.backgroundColor = "#DBE8F4";
    bgcolor.style.color = "#000";
    main_box.style.backgroundColor = "#fff";
    main_box.style.boxShadow = "rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    health_box.style.backgroundColor = "#fff";
    register_box.style.backgroundColor = "#fff";
    sub_logo.style.color = "#000"; // Light mode
    sub_logo.style.textShadow = "none"; // Xóa hiệu ứng bóng cho sub-logo
    device_box.style.backgroundColor = "#fff";
    device_right_content.style.backgroundColor = "#fff";
    login_btn.style.color = "#000";
    register_btn.style.color = "#000";
    water_amount.style.color = "#000";
    icon.forEach((icon) => {
      icon.style.color = "#000";
    });
    input.forEach((input) => {
      input.style.color = "#000";
      input.style.borderColor = "#000";
      input.style.backgroundColor = "#fff";
      input.style.placeholder = "#000";
    });
    menu.forEach((menu) => {
      menu.style.backgroundColor = "#fff";
      menu.style.boxShadow = "rgba(0, 0, 0, 0.3) 0px 4px 12px";
    });
    progress_number.style.color = "#000";
    outer.forEach((outer) => {
      outer.style.boxShadow =
        "6px 6px 10px -1px rgba(0, 0, 0, 0.15), -6px -6px 10px -1px rgba(0, 0, 0, 0.7)";
    });
    inner.forEach((inner) => {
      inner.style.boxShadow =
        "inset 4px 4px 6px -1px rgba(0, 0, 0, 0.2), inset -4px -4px 6px -1px rgba(255, 255, 255, 0.7), -0.5px -0.5px 0px rgba(255, 255, 255, 1), 0.5px 0.5px 0px rgba(0, 0, 0, 0.15)";
    });
    advice_input.forEach((advice_input) => {
      advice_input.style.color = "#000";
      advice_input.style.borderColor = "#000";
      advice_input.style.backgroundColor = "#fff";
      advice_input.style.placeholder = "#000";
    });
    health_box_new.style.backgroundColor = "#fff";
    // Light mode
    if (homeBox) homeBox.classList.remove("dark-mode");
    if (logoutBtn) logoutBtn.style.backgroundColor = "#59b65a";
  }
});
