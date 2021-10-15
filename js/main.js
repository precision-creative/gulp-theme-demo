/**
 * Copyright (c) 2020
 *
 * Common JavaScript functions for the PrecisionCreative WordPress theme.
 * This file should be called in the footer of the theme.
 *
 * @summary Precision common JavaScript functions
 * @author Precision Creative Dev Team
 *
 * Created: September 23, 2020
 */

// Init Animate On Scroll (if it exists)
if (window.AOS) {
  AOS.init()
}

/*
This code is responsible for the desktop and pushy clicky menus
*/

const Menu = function (menu) {
  let currentMenuButton,
    container = menu.parentElement

  this.init = function () {
    menuSetup()

    document.addEventListener('click', closeOpenMenu)
  }

  // Menu opening and closing

  function toggleOnButtonClick(e) {
    const button = e.currentTarget

    if (currentMenuButton && button !== currentMenuButton) {
      toggleSubmenu(currentMenuButton)
    }

    toggleSubmenu(button)
  }

  function toggleSubmenu(button) {
    const submenu = document.querySelector(button.getAttribute('aria-controls'))

    if ('true' === button.getAttribute('aria-expanded')) {
      button.setAttribute('aria-expanded', false)
      submenu.setAttribute('aria-hidden', true)

      currentMenuButton = false
    } else {
      button.setAttribute('aria-expanded', true)
      submenu.setAttribute('aria-hidden', false)

      currentMenuButton = button
    }
  }

  function closeOpenMenu(e) {
    if (currentMenuButton && !e.target.closest(`#${container.id}`)) {
      toggleSubmenu(currentMenuButton)
    }
  }

  function closeOnEscKey(e) {
    if (27 === e.keyCode) {
      if (null !== e.target.closest('ul[aria-hidden="false"]')) {
        currentMenuButton.focus()
        toggleSubmenu(currentMenuButton)
      } else if ('true' === e.target.getAttribute('aria-expanded')) {
        toggleSubmenu(currentMenuButton)
      }
    }
  }

  // Menu setup functions

  function menuSetup() {
    menu.classList.remove('no-js')

    menu.querySelectorAll('ul').forEach(submenu => {
      const submenuParent = submenu.parentElement
      let button = convertLinkToButton(submenuParent)

      setupAria(submenu, button)

      button.addEventListener('click', toggleOnButtonClick)

      menu.addEventListener('keyup', closeOnEscKey)
    })
  }

  function convertLinkToButton(submenuParent) {
    const link = submenuParent.getElementsByTagName('a')[0],
      linkHTML = link.innerHTML,
      linkAtts = link.attributes,
      button = document.createElement('button')

    if (null !== link) {
      button.innerHTML = linkHTML.trim()

      for (let i = 0, len = linkAtts.length; i < len; i++) {
        let attr = linkAtts[i]

        if ('href' !== attr.name) {
          button.setAttribute(attr.name, attr.value)
        }
      }

      submenuParent.replaceChild(button, link)
    }

    return button
  }

  function setupAria(submenu, button) {
    const submenuID = submenu.getAttribute('id')
    let id

    if (null === submenuID) {
      id =
        button.textContent.trim().replace(/\s+/g, '-').toLowerCase() +
        '-submenu'
    } else {
      id = submenuID + '-submenu'
    }

    if (button.closest('#pushy')) {
      id += '-pushy'
    }

    button.setAttribute('aria-controls', `#${id}`)
    button.setAttribute('aria-expanded', false)

    submenu.setAttribute('id', id)
    submenu.setAttribute('aria-hidden', true)
  }
}

const menus = document.querySelectorAll('.navbar__links, .pushy__links')

menus.forEach(menu => {
  const menuInstance = new Menu(menu)

  menuInstance.init()
})

/*
This code is responsible for the pushy menu
*/

const PushyMenu = function (hamburger) {
  const pushy = document.getElementById('pushy'),
    closePushy = pushy.querySelector('.pushy__close')

  this.init = function () {
    pushySetup()
    setupAria()

    document.addEventListener('click', closeOpenPushy)
  }

  // Open / close functions

  function togglePushy() {
    if ('true' === hamburger.getAttribute('aria-expanded')) {
      hamburger.setAttribute('aria-expanded', false)
      pushy.setAttribute('aria-hidden', true)
    } else {
      hamburger.setAttribute('aria-expanded', true)
      pushy.setAttribute('aria-hidden', false)
    }
  }

  function closeOpenPushy(e) {
    if (
      !e.target.closest(`#${pushy.id}`) &&
      !hamburger.parentElement.contains(e.target)
    ) {
      hamburger.setAttribute('aria-expanded', false)
      pushy.setAttribute('aria-hidden', true)
    }
  }

  // Setup functions

  function pushySetup() {
    hamburger.addEventListener('click', togglePushy)
    closePushy.addEventListener('click', togglePushy)
  }

  function setupAria() {
    hamburger.setAttribute('aria-controls', `#${pushy.id}`)
    hamburger.setAttribute('aria-expanded', false)

    pushy.setAttribute('aria-hidden', true)
  }
}

const hamburgers = document.querySelectorAll('.hamburger--pushy')

hamburgers.forEach((hamburger) => {
  const hamburgerInstance = new PushyMenu(hamburger)
  hamburgerInstance.init()
})

/* 
This code is responsible for the accordion menu
*/

const AccordionMenu = function(hamburger) {
  const accordion = document.getElementById('accordion')

  this.init = function() {
    setupAria()
    eventListeners()
  }

  function closeAccordion() {
    hamburger.setAttribute('aria-expanded', 'false')
    accordion.setAttribute('aria-hidden', 'true')

    accordion.style.height = '0px'
  }

  function openAccordion() {
    const height = accordion.children[0].offsetHeight

    hamburger.setAttribute('aria-expanded', 'true')
    accordion.setAttribute('aria-hidden', 'false')

    accordion.style.height = `${height}px`
  }

  function toggleAccordion() {
    if (hamburger.getAttribute('aria-expanded') === 'true') {
      closeAccordion()
    } else {
      openAccordion()
    }
  }

  // Setup functions

  function eventListeners() {
    hamburger.addEventListener('click', toggleAccordion)
  }

  function setupAria() {
    hamburger.setAttribute('aria-controls', `#${accordion.id}`)
    hamburger.setAttribute('aria-expanded', 'false')

    accordion.setAttribute('aria-hidden', 'true')
  }
}

const accordionHamburgers = document.querySelectorAll('.accordion__hamburger')

accordionHamburgers.forEach((hamburger) => {
  const accordionInstance = new AccordionMenu(hamburger)
  accordionInstance.init()
})

// Yell at Grayson if this code stops working
