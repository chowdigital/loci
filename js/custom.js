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
const menuItems = document.querySelectorAll(".menu-item, .nav-item");

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

/* ------ Modal ---*/
// Get the modal
var modal = document.getElementById("myModal");

// Get the buttons that open the modal
var btns = document.querySelectorAll(".openModal");

// Get the <span> element that closes the modal
var span = document.getElementById("closeModal");

// Function to open the modal
function openModal() {
  modal.style.display = "block";
  setTimeout(function () {
    modal.classList.add("show");
    modal.classList.remove("hide");
  }, 10); // Delay to allow display property to apply before animation starts
}

// Add event listeners to all buttons with the class "openModal"
btns.forEach(function (btn) {
  btn.onclick = function () {
    openModal();
  };
});

// Function to close the modal
function closeModal() {
  modal.classList.remove("show");
  modal.classList.add("hide");
  setTimeout(function () {
    modal.style.display = "none";
  }, 500); // Delay to allow fade-out animation to complete
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  closeModal();
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    closeModal();
  }
};

// When the user clicks the submit button inside the form, close the modal
document.querySelector(".ot-dtp-picker-button").onclick = function () {
  closeModal();
};

// close nav on link click

var navLinks = document.querySelectorAll(".nav-link");
var offcanvasNav = document.getElementById("offcanvasNav");

navLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasNav);
    if (offcanvasInstance) {
      offcanvasInstance.hide();
    }
  });
});
