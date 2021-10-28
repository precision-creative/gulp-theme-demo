// @link https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API

;(function() {
  function observerCallback(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-intersecting')
      } else {
        entry.target.classList.remove('is-intersecting')
      }
    })
  }

  const options = {
    threshold: [0, 0.5],
    rootMargin: '-20px 0px -100px 0px',
  }

  const observer = new IntersectionObserver(observerCallback, options)

  document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.has-animations')

    sections.length > 0 &&
      sections.forEach((section) => {
        observer.observe(section)
      })
  })
})()
