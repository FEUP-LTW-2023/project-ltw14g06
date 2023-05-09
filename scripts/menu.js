function handleMenuItemClick(){    
    const menuItems = document.querySelectorAll('.choice-menu li');
    menuItems.forEach(item => {
    item.addEventListener('click', () => {
        const link = item.querySelector('a').getAttribute('href');
        window.location.href = link;
        });
    });
}

handleMenuItemClick();