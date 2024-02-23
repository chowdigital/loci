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
/* When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size */
/*

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (window.innerWidth <= 576) {
    setStyles("50px", "230px", "4px", "10px", "0s", "8px", "0s");
  } else if (
    window.innerWidth > 576 &&
    (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80)
  ) {
    setStyles(
      "50px",
      "250px",
      "2px",
      "calc(50% - 125px)",
      "5px",
      "0s",
      "8px",
      "0s"
    );
  } else {
    setStyles(
      "100px",
      "400px",
      "17px",
      "calc(50% - 200px)",
      "30px",
      "0.1s",
      "27px",
      "0.1s"
    );
  }

  function setStyles(
    navbarHeight,
    navbrandWidth,
    navbrandMarginTop,
    navbrandLeft,
    bookBtnMarginTop,
    bookBtnTransitionDelay,
    menuIconMarginTop,
    menuIconTransitionDelay
  ) {
    document.getElementById("navbar").style.height = navbarHeight;
    document.getElementById("navbrand").style.width = navbrandWidth;
    document.getElementById("navbrand").style.marginTop = navbrandMarginTop;
    document.getElementById("navbrand").style.left = navbrandLeft;

    document.getElementById("bookBtn").style.marginTop = bookBtnMarginTop;
    document.getElementById("bookBtn").style.transitionDelay =
      bookBtnTransitionDelay;
    document.getElementById("bookBtn2").style.marginTop = bookBtnMarginTop;
    document.getElementById("bookBtn2").style.transitionDelay =
      bookBtnTransitionDelay;
    document.getElementById("menuIcon").style.marginTop = menuIconMarginTop;
    document.getElementById("menuIcon").style.transitionDelay =
      menuIconTransitionDelay;
  }
}
*/
// force refresh when website crosses 576px
// Set the initial window size
let isBelow576 = window.innerWidth <= 576;

// Add an event listener for the resize event
window.onresize = function () {
  // Check if the window size goes above or below 576px
  const currentIsBelow576 = window.innerWidth <= 576;

  if (currentIsBelow576 !== isBelow576) {
    // Update the flag
    isBelow576 = currentIsBelow576;

    // Force a page refresh
    location.reload();
  }
};

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
/* Paralax images */

document.addEventListener("DOMContentLoaded", function () {
  // Create a new Intersection Observer instance
  var observer = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(function (entry) {
        // Check if the element is intersecting
        if (entry.isIntersecting) {
          // Add the 'visible' class to make the element fade in
          entry.target.classList.add("visible");
          // Stop observing the element if you want the animation to occur only once
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  ); // Customize this value based on when you want the animation to start

  // Observe all elements with the .image-block class
  document.querySelectorAll(".image-block").forEach(function (block) {
    observer.observe(block);
  });
});

/* Paralax end */

/* appear food & drink menus */
const items = document.querySelectorAll(".menu-item");

function active(entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      entry.target.classList.add("inview2");
    } else {
      entry.target.classList.remove("inview2");
    }
  });
}

const io2 = new IntersectionObserver(active);

items.forEach(function (item) {
  io2.observe(item);
});

function resetMenuAnimation() {
  const items = document.querySelectorAll(".menu-item");
  items.forEach(function (item) {
    item.classList.remove("inview2");
  });
}
document.querySelector("#menuToggle").addEventListener("click", function () {
  // You might need additional logic here to determine if the menu is being opened or closed
  resetMenuAnimation();
});
/* appear food & drink menus end */
