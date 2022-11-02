const galleryContainer = document.querySelector(".gallery-container");
const galleryControlsContainer = document.querySelector(".gallery-controls");
const galleryControls = [
    "previous",
    "next"
];
const galleryItems = document.querySelectorAll(".gallery-item");
class Carousel {
    constructor(container, items, controls) {
        this.carouselContainer = container;
        this.carouselControls = controls;
        this.carouselArray = [...items];
    }
    setInitialState() {
        this.carouselArray[0].classList.add("gallery-item-first");
        this.carouselArray[1].classList.add("gallery-item-previous2");
        this.carouselArray[2].classList.add("gallery-item-previous");
        this.carouselArray[3].classList.add("gallery-item-selected");
        this.carouselArray[4].classList.add("gallery-item-next");
        this.carouselArray[5].classList.add("gallery-item-next2");
        this.carouselArray[6].classList.add("gallery-item-last");
        document.querySelector(".gallery-nav").childNodes[0].className =
            "gallery-nav-item gallery-item-first";
        document.querySelector(".gallery-nav").childNodes[1].className =
            "gallery-nav-item gallery-item-previous2";
        document.querySelector(".gallery-nav").childNodes[2].className =
            "gallery-nav-item gallery-item-previous";
        document.querySelector(".gallery-nav").childNodes[3].className =
            "gallery-nav-item gallery-item-selected";
        document.querySelector(".gallery-nav").childNodes[4].className =
            "gallery-nav-item gallery-item-next";
        document.querySelector(".gallery-nav").childNodes[5].className =
            "gallery-nav-item gallery-item-next2";
        document.querySelector(".gallery-nav").childNodes[6].className =
            "gallery-nav-item gallery-item-last";
    }
    setCurrentState(target, selected, previous, previous2, next, next2, first, last) {
        selected.forEach((el) => {
            el.classList.remove("gallery-item-selected");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-next");
            } else {
                el.classList.add("gallery-item-previous");
            }
        });
        previous.forEach((el) => {
            el.classList.remove("gallery-item-previous");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-selected");
            } else {
                el.classList.add("gallery-item-previous2");
            }
        });
        previous2.forEach((el) => {
            el.classList.remove("gallery-item-previous2");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-previous");
            } else {
                el.classList.add("gallery-item-first");
            }
        });
        next.forEach((el) => {
            el.classList.remove("gallery-item-next");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-next2");
            } else {
                el.classList.add("gallery-item-selected");
            }
        });
        next2.forEach((el) => {
            el.classList.remove("gallery-item-next2");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-last");
            } else {
                el.classList.add("gallery-item-next");
            }
        });
        first.forEach((el) => {
            el.classList.remove("gallery-item-first");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-previous2");
            } else {
                el.classList.add("gallery-item-last");
            }
        });
        last.forEach((el) => {
            el.classList.remove("gallery-item-last");
            if (target.className == "gallery-controls-previous") {
                el.classList.add("gallery-item-first");
            } else {
                el.classList.add("gallery-item-next2");
            }
        });
    }
    setNav() {
        galleryContainer.appendChild(document.createElement("ul")).className =
            "gallery-nav";
        this.carouselArray.forEach((item) => {
            const nav = galleryContainer.lastElementChild;
            nav.appendChild(document.createElement("li"));
        });
    }
    setControls() {
        this.carouselControls.forEach((control) => {
            galleryControlsContainer.appendChild(
                document.createElement("button")
            ).className = `gallery-controls-${control}`;
        });

        if (!!galleryControlsContainer.childNodes[0]) {
            galleryControlsContainer.childNodes[0].innerHTML = '<i class="bx bx-chevron-left"></i>'
        }

        if (!!galleryControlsContainer.childNodes[1]) {
            galleryControlsContainer.childNodes[1].innerHTML = '<i class="bx bx-chevron-right"></i>'
        }
        // !!galleryControlsContainer.childNodes[0]
        //     ? (galleryControlsContainer.childNodes[0].innerHTML = this.carouselControls[0])
        //     : null;
        // !!galleryControlsContainer.childNodes[1]
        //     ? (galleryControlsContainer.childNodes[1].innerHTML = this.carouselControls[1])
        //     : null;
    }
    useControls() {
        const triggers = [...galleryControlsContainer.childNodes];
        triggers.forEach((control) => {
            control.addEventListener("click", () => {
                const target = control;
                const selectedItem = document.querySelectorAll(".gallery-item-selected");
                const previousSelectedItem = document.querySelectorAll(".gallery-item-previous");
                const previous2SelectedItem = document.querySelectorAll(".gallery-item-previous2");
                const nextSelectedItem = document.querySelectorAll(".gallery-item-next");
                const next2SelectedItem = document.querySelectorAll(".gallery-item-next2");
                const firstCarouselItem = document.querySelectorAll(".gallery-item-first");
                const lastCarouselItem = document.querySelectorAll(".gallery-item-last");
                this.setCurrentState(
                    target,
                    selectedItem,
                    previousSelectedItem,
                    previous2SelectedItem,
                    nextSelectedItem,
                    next2SelectedItem,
                    firstCarouselItem,
                    lastCarouselItem
                );
            });
        });
    }
}
const exampleCarousel = new Carousel(
    galleryContainer,
    galleryItems,
    galleryControls
);
exampleCarousel.setControls();
exampleCarousel.setNav();
exampleCarousel.setInitialState();
exampleCarousel.useControls();
