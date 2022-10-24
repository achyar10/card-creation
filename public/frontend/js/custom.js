let homeCarousel = document.querySelectorAll('.home__carousel .carousel-item')

homeCarousel.forEach((el) => {
    // number of slides per carousel-item
    const minPerSlide = 4;
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = homeCarousel[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})
