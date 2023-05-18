const getDepartmentsSelectMenu = async () => {
    const response = await fetch("../actions/get_departments_action.php");
    const jsonResponse = await response.json();

    const elem = document.querySelector('#search_deparment');
    elem.innerHTML = "";

    elem.onchange = function() {
        const department_id = this.value;
    };

    for (let i = 0; i < jsonResponse.length; i++) {
        const department = jsonResponse[i];
        
        const opt = document.createElement('option');
        opt.value = department.id;
        opt.textContent = department.name;

        elem.appendChild(opt);
    }
    
}

getDepartmentsSelectMenu();