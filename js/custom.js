// Force refresh when website crosses 576px
let isBelow576 = window.innerWidth <= 576;

window.onresize = function () {
  const currentIsBelow576 = window.innerWidth <= 576;

  if (currentIsBelow576 !== isBelow576) {
    isBelow576 = currentIsBelow576;
    location.reload();
  }
};

// Page loader
function wait(delay = 0) {
  return new Promise((resolve) => setTimeout(resolve, delay));
}

function setVisible(elementOrSelector, visible) {
  const element =
    typeof elementOrSelector === "string"
      ? document.querySelector(elementOrSelector)
      : elementOrSelector;

  element.style.display = visible ? "block" : "none";
}

function fadeOut(elementOrSelector, duration) {
  const element =
    typeof elementOrSelector === "string"
      ? document.querySelector(elementOrSelector)
      : elementOrSelector;

  element.style.transition = `opacity ${duration / 2000}s`;
  element.style.opacity = "0";

  wait(duration).then(() => {
    setVisible(element, false);
    element.style.transition = "";
    element.style.opacity = "";
  });
}

setVisible("#page", false);
setVisible("#loading", true);

document.addEventListener("DOMContentLoaded", function () {
  wait(1000).then(() => {
    setVisible("#page", true);
    fadeOut("#loading", 500);
  });
});

// Parallax images
const imageBlocks = document.querySelectorAll(".image-block");
if ("IntersectionObserver" in window) {
  const observer = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  );

  imageBlocks.forEach(function (block) {
    observer.observe(block);
  });
} else {
  // Fallback for browsers that do not support Intersection Observer
  imageBlocks.forEach(function (block) {
    block.classList.add("visible");
  });
}

// Appear food & drink menus
const menuItems = document.querySelectorAll(".menu-item");

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

menuItems.forEach(function (item) {
  io2.observe(item);
});

function resetMenuAnimation() {
  menuItems.forEach(function (item) {
    item.classList.remove("inview2");
  });
}

document.querySelector("#menuToggle").addEventListener("click", function () {
  resetMenuAnimation();
});
