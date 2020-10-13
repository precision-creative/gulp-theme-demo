const hamburger = document.getElementById("hamburger");
const accordion = document.getElementById("accordion");
const accordionLinks = document.querySelectorAll("#accordion a");

function closeAccordion(accordion) {
  accordion.classList.remove("accordion--open");
  accordion.classList.add("accordion--closed");

  accordion.style.height = "0px";
}

function openAccordion(accordion) {
  const height = accordion.children[0].offsetHeight + 24;

  accordion.classList.remove("accordion--closed");
  accordion.classList.add("accordion--open");

  accordion.style.height = `${height}px`;
}

function checkLinkType(link) {
  const href = link.getAttribute("href");
  const target = link.getAttribute("target");

  if (/^#/.test(href)) {
    return true;
  } else if (target === '_blank') {
    return true;
  }
}

hamburger.addEventListener("click", function (e) {
  const isOpen = accordion.classList.contains("accordion--open");

  if (isOpen) {
    closeAccordion(accordion);
  } else {
    openAccordion(accordion);
  }
});

for (let link of accordionLinks) {
  if (checkLinkType(link)) {
    link.addEventListener("click", function(e) {
      closeAccordion(accordion);
    })
  };
}
