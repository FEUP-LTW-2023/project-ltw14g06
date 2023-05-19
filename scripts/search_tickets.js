const department_id = '';
const status_id = '';
const priority = '';
const agent_name = '';
const user_username = '';
const from_created_at = '';
const until_created_at = '';
const hashtags = [];

const getDepartmentsSelectMenu = async () => {
    const response = await fetch("../actions/get_departments_action.php");
    const jsonResponse = await response.json();

    const elem = document.querySelector('#search_deparment_select');
    elem.innerHTML = "";

    const none = document.createElement('option');
    elem.appendChild(none);

    elem.onchange = function() {
        department_id = this.value;
    };

    for (let i = 0; i < jsonResponse.length; i++) {
        const department = jsonResponse[i];
        
        const opt = document.createElement('option');
        opt.value = department.id;
        opt.textContent = department.name;

        elem.appendChild(opt);
    }

}

const getStatusSelectMenu = async () => {
    const response = await fetch("../actions/get_status_action.php");
    const jsonResponse = await response.json();

    const elem = document.querySelector('#search_status_select');
    elem.innerHTML = "";

    const none = document.createElement('option');
    elem.appendChild(none);

    elem.onchange = function() {
        status_id = this.value;
    };

    for (let i = 0; i < jsonResponse.length; i++) {
        const status = jsonResponse[i];
        
        const opt = document.createElement('option');
        opt.value = status.id;
        opt.textContent = status.name;

        elem.appendChild(opt);
    }
}

const prioritySelectMenu = async () => {

    const elem = document.querySelector('#search_priority_select');

    elem.onchange = function() {
        priority = this.value;
    };
}

const changeAgent = async () => {

    const elem = document.querySelector('#agent_name');

    elem.addEventListener('input', function() {
        agent_name = this.value;
    });
}

const changeUser = async () => {

    const elem = document.querySelector('#user_username');

    elem.addEventListener('input', function() {
        user_username = this.value;
    });
}

const changeFromDate = async () => {

    const elem = document.querySelector('#from_created_at');

    elem.addEventListener('input', function() {
        from_created_at = this.value;
    });
}

const changeUntilDate = async () => {

    const elem = document.querySelector('#until_created_at');

    elem.addEventListener('input', function() {
        until_created_at = this.value;
    });
}

const addHashtags = async () => {
    const response = await fetch("../actions/get_hashtags_action.php");
    const jsonResponse = await response.json();

    const elem = document.querySelector('#search_hashtag_select');
    elem.innerHTML = "";

    elem.onchange = function() {
        const selectedOption = this.options[this.selectedIndex];
        const id = selectedOption.value;
        const name = selectedOption.textContent;
        hashtags.push({ id, name });
        elem.selectedIndex = 0;
        showSearchedHashtags();
    };
    

    const none = document.createElement('option');
    elem.appendChild(none);

    for (let i = 0; i < jsonResponse.length; i++) {
        const hashtag = jsonResponse[i];
        
        // WHY DOESNT THIS WORK
        if(hashtags.includes(toString(hashtag.id))){
            continue;
        } 
        
        const opt = document.createElement('option');
        opt.value = hashtag.id;
        opt.textContent = hashtag.name;

        elem.appendChild(opt);
    }
}

const showSearchedHashtags = async () => {
    const elem = document.querySelector('#show_search_hashtags');
    elem.innerHTML = "";

    (hashtags).forEach(hashtag => {
        const showHashtag = document.createElement("span");
        showHashtag.classList.add("pressHashtag");
        showHashtag.onclick = function() {};
        showHashtag.textContent = hashtag.name + "  ";
        elem.appendChild(showHashtag);
    });
}


getDepartmentsSelectMenu();
getStatusSelectMenu();
prioritySelectMenu();
changeAgent();
changeUser();
changeFromDate();
changeUntilDate();
addHashtags();
showSearchedHashtags();

const reset = document.querySelector('#search_reset');

reset.addEventListener('click', function() {
    department_id = '';
    status_id = '';
    priority = '';
    agent_name = '';
    user_username = '';
    from_created_at = '';
    until_created_at = '';
    hashtags = [];

    document.getElementById("search_deparment_select").selectedIndex = 0;
    document.getElementById("search_status_select").selectedIndex = 0;
    document.getElementById("search_priority_select").selectedIndex = 0;
        
    document.getElementById("agent_name").value = '';
    document.getElementById("user_username").value = '';
    document.getElementById("from_created_at").value = '';
    document.getElementById("until_created_at").value = '';

    showSearchedHashtags();
});

