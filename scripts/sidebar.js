function toggleSidebar(){
    const sidebar = document.querySelector(".sidebar");
    const sidebarButton = document.querySelector(".bx-menu");
    sidebarButton.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
        }
    );
}

function toggleButton(){
    const arrow = document.querySelectorAll(".arrow");
    for (let i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", function(){
            const arrowParent = this.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");
        });
    }
}

toggleSidebar()
toggleButton()
