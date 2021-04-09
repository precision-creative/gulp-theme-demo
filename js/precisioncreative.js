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

// Close pushy handlers
const closePushyEl = document.querySelector('.pushy__close')
const pushyOverlayEl = document.querySelector('.pushy__overlay')

if (closePushyEl) {
  closePushyEl.addEventListener('click', closePushy)
  pushyOverlayEl.addEventListener('click', closePushy)
}

function closePushy(e) {
  e.preventDefault()

  document.body.classList.remove('pushy-open-right')
  document.body.classList.remove('pushy-open-left')
}

// Open pushy sub-menu handlers
const itemsWithChildren = document.querySelectorAll(
  '.pushy .menu-item-has-children'
)

function toggleItemOpen(itemEl, submenuEl, height) {
  if (itemEl.dataset.opened === 'true') {
    itemEl.dataset.opened = 'false'
    itemEl.classList.remove('is-open')
    submenuEl.style.height = '0px'
  } else {
    itemEl.dataset.opened = 'true'
    itemEl.classList.add('is-open')
    submenuEl.style.height = height + 'px'
  }
}

for (item of itemsWithChildren) {
  const submenuEl = item.querySelector('.sub-menu')
  const submenuHeight = submenuEl.offsetHeight

  const link = item.querySelector('a')

  link.addEventListener('click', e => {
    e.preventDefault()
    toggleItemOpen(item, submenuEl, submenuHeight)
  })

  // Close items on init
  item.dataset.opened = 'false'
  submenuEl.style.height = '0px'
}

/*
This code is responsible for the desktop clicky menus
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
    const submenu = document.getElementById(
      button.getAttribute('aria-controls')
    )

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

    button.setAttribute('aria-controls', id)
    button.setAttribute('aria-expanded', false)

    submenu.setAttribute('id', id)
    submenu.setAttribute('aria-hidden', true)
  }
}

const menus = document.querySelectorAll('.navbar__links')

menus.forEach(menu => {
  const menuInstance = new Menu(menu)

  menuInstance.init()
})

// Yell at Grayson if this code stops working
