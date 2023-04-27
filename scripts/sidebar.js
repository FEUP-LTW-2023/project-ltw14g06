/**
 * This function will toggle the sidebar (opening and closing it).
 * Located in scripts/sidebar.js
 */
function toggleSidebar(){
    const sidebar = document.querySelector(".sidebar")
    const sidebarButton = document.querySelector(".bx-menu")
    sidebarButton.addEventListener("click", ()=>{
            sidebar.classList.toggle("close")
        }
    )
}
toggleSidebar()

/**
 * This function will toggle buttons from the sidebar up and down.
 * Located in scripts/sidebar.js
 */
function toggleButton(){
    const arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", function(){
            const arrowParent = this.parentElement.parentElement //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu")
        })
    }
}
toggleButton()