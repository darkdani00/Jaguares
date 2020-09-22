const collapsedClass = "nav-collapsed";
const collapsedClassMain = "main-content-collapsed";
//local storage variable
const lsKey = "navCollapsed";

const nav = document.querySelector(".nav");
const main_content = document.getElementsByClassName("main-content");
const btnOpen = document.getElementById("btnOpen");

if (localStorage.getItem(lsKey)=="true") {
    nav.classList.add(collapsedClass);
    // main_content.add(collapsedClassMain);
}

btnOpen.addEventListener('click',()=>{
    nav.classList.toggle(collapsedClass);
    // main_content.classList.toggle(collapsedClassMain);

    localStorage.setItem(lsKey,nav.classList.contains(collapsedClass));
});
