/* let items = document.querySelectorAll(".carousel .carousel-item");

items.forEach((el) => {
  const minPerSlide = 3;
  let next = el.nextElementSibling;
  for (var i = 1; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = items[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});
*/
/*When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size */
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.height = "40px";
    document.getElementById("navbrand").style.width = "80px";
    document.getElementById("navbrand").style.height = "28px";
    document.getElementById("navbrand").style.marginTop = "0px";
    document.getElementById("bookBtn").style.marginTop = "0px";
    document.getElementById("bookBtn").style.transitionDelay = "0s";
    document.getElementById("menuIcon").style.marginTop = "8px";
    document.getElementById("menuIcon").style.transitionDelay = "0s";
  } else {
    document.getElementById("navbar").style.height = "80px";
    document.getElementById("navbrand").style.width = "160px";
    document.getElementById("navbrand").style.height = "23px";
    document.getElementById("navbrand").style.marginTop = "8px";
    document.getElementById("bookBtn").style.marginTop = "18px";
    document.getElementById("menuIcon").style.marginTop = "27px";
    document.getElementById("bookBtn").style.transitionDelay = "0.1s";
    document.getElementById("menuIcon").style.transitionDelay = "0.1s";
  }
}

// page loader

const wait = (delay = 0) =>
  new Promise((resolve) => setTimeout(resolve, delay));

const setVisible = (elementOrSelector, visible) =>
  ((typeof elementOrSelector === "string"
    ? document.querySelector(elementOrSelector)
    : elementOrSelector
  ).style.display = visible ? "block" : "none");

const fadeOut = (elementOrSelector, duration) => {
  const element =
    typeof elementOrSelector === "string"
      ? document.querySelector(elementOrSelector)
      : elementOrSelector;

  element.style.transition = `opacity ${duration / 2000}s`;
  element.style.opacity = "0";

  // Hide the element after the fade-out animation
  wait(duration).then(() => {
    setVisible(element, false);
    element.style.transition = ""; // Reset the transition property
    element.style.opacity = ""; // Reset the opacity property
  });
};

setVisible("#page", false);
setVisible("#loading", true);

document.addEventListener("DOMContentLoaded", () =>
  wait(1000).then(() => {
    setVisible("#page", true);
    fadeOut("#loading", 500); // 500 milliseconds = 0.5 seconds
  })
);
