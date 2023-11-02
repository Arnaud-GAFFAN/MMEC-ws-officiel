var nav = document.querySelector("nav");
const navlink = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", function () {
  if (window.scrollY > 100) {
    nav.classList.add("bg-light", "shadow");
    navlink.forEach((item) => {
      item.classList.add("text-dark");
      item.classList.remove("text-white");
    });
  } else {
    nav.classList.remove("bg-light", "shadow");
    navlink.forEach((item) => {
      item.classList.remove("text-dark");
      item.classList.add("text-white");
    });
  }
});


// 

