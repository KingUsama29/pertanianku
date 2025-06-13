const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navLinks.classList.toggle("show");
});

window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const nav_links = document.querySelectorAll("ul.nav-links li a");
  const logo = document.querySelector(".logo");
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
    logo.classList.add("scrolled");
    nav_links.forEach((link) => link.classList.add("scrolled"));
  } else {
    header.classList.remove("scrolled");
    logo.classList.remove("scrolled");
    nav_links.forEach((link) => link.classList.remove("scrolled"));
  }
});
