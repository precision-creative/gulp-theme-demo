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

const $ = jQuery;

function closePushy(e) {
  e.preventDefault();
  jQuery("body").removeClass("pushy-open-right");
  jQuery("body").removeClass("pushy-open-left");
}

$(".pushyClose__wrapper").click(closePushy);
$(".pushy__overlay").click(closePushy);

// Yell at Grayson if this code stops working
