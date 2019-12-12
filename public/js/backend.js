//  Wait For Document to Load
document.addEventListener('DOMContentLoaded', () => {
    hamburger();

});
//  Load Our Hamburger Menu
function hamburger()
{
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {
            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);
            const $menu = document.getElementById('mobileMenu');
            $menu.classList.toggle('is-hidden');
            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

            });
        });
    }
}
//  Add New 
function addNew(element)
{
    let value = element.dataset.value;
    console.log(value);
    // alert(element.value + " Clicked");

    let modal = document.getElementById('newModal');
    modal.classList.toggle('is-active');
    console.log(modal);
}
//  Close Modal
function closeModal(element)
{
    let el = element;
    el.classList.toggle('is-active');
}