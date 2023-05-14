function changeUserType(username, user_id, type) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../actions/change_user_type_action.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      if (this.status == 200) {
        getUserInfo(username);
      }
    };
  
    xhr.send("user_id=" + user_id + "&type=" + encodeURIComponent(type));
}

function changeUserDepartment(username, user_id, department_id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../actions/change_user_department_action.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      if (this.status == 200) {
        getUserInfo(username);
      }
    };
  
    xhr.send("user_id=" + user_id + "&department_id=" + department_id);
}

const getDepartmentsSelectMenu = async (username, user_id, user_department) => {
    const response = await fetch("../actions/get_departments_action.php");
    const jsonResponse = await response.json();

    const elem = document.querySelector('.change_agent_department');
    elem.innerHTML = "";

    elem.onchange = function() {
        const department_id = this.value;
        changeUserDepartment(username, user_id, department_id);
    };

    for (let i = 0; i < jsonResponse.length; i++) {
        const department = jsonResponse[i];
        
        const opt = document.createElement('option');
        opt.value = department.id;
        opt.textContent = department.name;

        if(opt.textContent === user_department){
            opt.selected = true;
        }

        elem.appendChild(opt);
    }
    
}

const getChangeTypeButtons = async (username_, type, id) => {

    const elem = document.querySelector('.PromoteAndDemote');
    elem.innerHTML = "";

    const p = document.createElement("p");
    p.textContent = "Change Type:";

    if (type === 'Client') {
        const pAgent = document.createElement('button');
        pAgent.textContent = 'Promote to Agent';
        pAgent.onclick = function() {
          changeUserType(username_,id,'Agent');
        };
        p.appendChild(pAgent);
      } else if (type === 'Agent') {
        const dClient = document.createElement('button');
        dClient.textContent = 'Demote to Client';
        dClient.onclick = function() {
            changeUserType(username_,id,'Client');
        };
        p.appendChild(dClient);
        const pAdmin = document.createElement('button');
        pAdmin.textContent = 'Promote to Admin';
        pAdmin.onclick = function() {
            changeUserType(username_,id,'Admin');
        };
        p.appendChild(pAdmin);
    } else {
        const dAgent = document.createElement('button');
        dAgent.textContent = 'Demote to Agent';
        dAgent.onclick = function() {
            changeUserType(username_,id,'Agent');
        };
        p.appendChild(dAgent);
    }
    
    elem.appendChild(p);
}

const getUserInfo = async (username_) => {
    const response = await fetch("../actions/get_user_info_action.php?username="+username_);
    const jsonResponse = await response.json();
    
    const elem = document.querySelector('.profile_info_sec');
    elem.innerHTML = "";
    
    const user = jsonResponse;
       
    const header = document.createElement("header");
    header.innerHTML = "";
    const h2 = document.createElement("h2");
    h2.textContent = user.username + "'s profile information";
    header.appendChild(h2);
    elem.appendChild(header);

    const div1 = document.createElement("div");
    div1.classList.add("profile_info_div");
    const title1 = document.createElement("p");
    title1.classList.add("profile_info_title");
    title1.textContent = "Username: ";
    div1.appendChild(title1);
    const userUsername = document.createElement("p");
    userUsername.textContent = user.username;
    div1.appendChild(userUsername);
    elem.appendChild(div1);

    const div2 = document.createElement("div");
    div2.classList.add("profile_info_div");
    const title2 = document.createElement("p");
    title2.classList.add("profile_info_title");
    title2.textContent = "Name: ";
    div2.appendChild(title2);
    const userRealName = document.createElement("p");
    userRealName.textContent = user.name;
    div2.appendChild(userRealName);
    elem.appendChild(div2);

    const div3 = document.createElement("div");
    div3.classList.add("profile_info_div");
    const title3 = document.createElement("p");
    title3.classList.add("profile_info_title");
    title3.textContent = "Email: ";
    div3.appendChild(title3);
    const userEmail = document.createElement("p");
    userEmail.textContent = user.email;
    div3.appendChild(userEmail);
    elem.appendChild(div3);

    const div4 = document.createElement("div");
    div4.classList.add("profile_info_div");
    const title4 = document.createElement("p");
    title4.classList.add("profile_info_title");
    title4.textContent = "Account Type: ";
    div4.appendChild(title4);
    const userType = document.createElement("p");
    userType.textContent = user.type;
    div4.appendChild(userType);
    elem.appendChild(div4);

    if(user.type !== 'Client'){
        const div5 = document.createElement("div");
        div5.classList.add("homeInput");

        const title5 = document.createElement("p");
        title5.classList.add("profile_info_title");
        title5.textContent = "Department: ";
        
        div5.appendChild(title5);
        const userDepartment = document.createElement("select");
        userDepartment.classList.add("change_agent_department");
        userDepartment.textContent = user.department;
        div5.appendChild(userDepartment);
        elem.appendChild(div5);
    }
    
  const typeDiv = document.createElement("div");
  typeDiv.classList.add("PromoteAndDemote");
  elem.appendChild(typeDiv);

  const depDiv = document.createElement("div");
  depDiv.classList.add("changeAgentDepartment");
  elem.appendChild(depDiv);


  getChangeTypeButtons(user.username, user.type, user.id);
  getDepartmentsSelectMenu(user.username, user.id, user.department);
  
};
  
getUserInfo(username_);

