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

const closePushyEl = document.querySelector('.pushyClose__wrapper')
const pushyOverlayEl = document.querySelector('.pushy__overlay')

closePushyEl.addEventListener('click', closePushy)
pushyOverlayEl.addEventListener('click', closePushy)

function closePushy(e) {
  e.preventDefault()

  document.body.classList.remove('pushy-open-right')
  document.body.classList.remove('pushy-open-left')
}

// Yell at Grayson if this code stops working
