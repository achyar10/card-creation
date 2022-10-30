const sectionHome2 = document.querySelector(".section__home2");
const sectionHome3 = document.querySelector(".section__home3");
let scrollPos = 0;
let windowY = 0;

function checkPosition() {
    windowY = window.scrollY;
    if (windowY > sectionHome2.scrollHeight) {
        let home2Children = sectionHome2.children;
        for (let i = 0; i < home2Children.length; i++) {
            home2Children[i].classList.remove("d-none");
        }
    }

    if (scrollPos > sectionHome2.scrollHeight + sectionHome3.scrollHeight) {
        let home3Children = sectionHome3.children;
        for (let i = 0; i < home3Children.length; i++) {
            home3Children[i].classList.remove("d-none");
        }
    }

    scrollPos = windowY;
}

if (sectionHome2) {
    window.addEventListener("scroll", checkPosition);
}
