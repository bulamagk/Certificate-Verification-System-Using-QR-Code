const hamburger = document.getElementById("hamburger");
const aside = document.getElementById("aside");
const main = document.getElementById("main");

hamburger.addEventListener("click", () => {
  aside.style.display = "block";
});

const hideAside = () => {
  aside.style.display = "none";
};

main.addEventListener("click", () => {
  window.innerWidth <= 768 ? hideAside() : null;
});

// const showAside = () => {
//   window.innerWidth > 800 ? (aside.style.display = "block") : null;
// };

// setInterval(() => {
//   showAside();
// }, 100);
