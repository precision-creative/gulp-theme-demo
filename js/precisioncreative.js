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
const closePushyEl = document.querySelector('.pushyClose__wrapper')
const pushyOverlayEl = document.querySelector('.pushy__overlay')

closePushyEl.addEventListener('click', closePushy)
pushyOverlayEl.addEventListener('click', closePushy)

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

// Yell at Grayson if this code stops working
