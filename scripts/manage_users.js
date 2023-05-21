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
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../actions/change_user_department_action.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      if (this.status == 200) {
        getUserInfo(username);
      }
    };
  
    xhr.send("user_id=" + user_id + "&department_id=" + department_id);
}


const getAccountTypesSelectMenu = async (username,user_id,user_type) =>{
  const elem = document.querySelector('.change_account_type');
  elem.innerHTML = "";

  elem.onchange = function(){
    const type = this.value;
    changeUserType(username, user_id, type);
  };

  const optClient = document.createElement('option');
  optClient.value = 'Client';
  optClient.textContent = 'Client';
  if(optClient.textContent === user_type){
    optClient.selected = true;
  }
  elem.appendChild(optClient);
  const optAgent = document.createElement('option');
  optAgent.value = 'Agent';
  optAgent.textContent = 'Agent';
  if(optAgent.textContent === user_type){
    optAgent.selected = true;
  }
  elem.appendChild(optAgent);
  const optAdmin = document.createElement('option');
  optAdmin.value = 'Admin';
  optAdmin.textContent = 'Admin';
  if(optAdmin.textContent === user_type){
    optAdmin.selected = true;
  }
  elem.appendChild(optAdmin);
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

  switch (type) {
    case 'Client':
      const pAgent = document.createElement('button');
      pAgent.textContent = 'Promote to Agent';
      pAgent.addEventListener('click', function() {
        changeUserType(username_, id, 'Agent');
      });
      p.appendChild(pAgent);
      break;
  
    case 'Agent':
      const dClient = document.createElement('button');
      dClient.textContent = 'Demote to Client';
      dClient.addEventListener('click', function() {
        changeUserType(username_, id, 'Client');
      });
      p.appendChild(dClient);
  
      const pAdmin = document.createElement('button');
      pAdmin.textContent = 'Promote to Admin';
      pAdmin.addEventListener('click', function() {
        changeUserType(username_, id, 'Admin');
      });
      p.appendChild(pAdmin);
      break;
  
    default:
      const dAgent = document.createElement('button');
      dAgent.textContent = 'Demote to Agent';
      dAgent.addEventListener('click', function() {
        changeUserType(username_, id, 'Agent');
      });
      p.appendChild(dAgent);
      break;
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

    /*
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
    */

    
    const div4 = document.createElement("div");
    div4.classList.add("homeInput");
    const title4 = document.createElement("p");
    title4.classList.add("profile_info_title");
    title4.textContent = "Account Type: ";
    div4.appendChild(title4);
    const accountType = document.createElement("select");
    accountType.classList.add("change_account_type");
    accountType.textContent = user.type;
    div4.appendChild(accountType);
    elem.appendChild(div4);
    
    switch (type) {
      case 'Client':
        const pAgent = document.createElement('button');
        pAgent.textContent = 'Promote to Agent';
        pAgent.addEventListener('click', function() {
          changeUserType(username_, id, 'Agent');
        });
        p.appendChild(pAgent);
        break;
    
      case 'Agent':
        const dClient = document.createElement('button');
        dClient.textContent = 'Demote to Client';
        dClient.addEventListener('click', function() {
          changeUserType(username_, id, 'Client');
        });
        p.appendChild(dClient);
    
        const pAdmin = document.createElement('button');
        pAdmin.textContent = 'Promote to Admin';
        pAdmin.addEventListener('click', function() {
          changeUserType(username_, id, 'Admin');
        });
        p.appendChild(pAdmin);
        break;
    
      default:
        const dAgent = document.createElement('button');
        dAgent.textContent = 'Demote to Agent';
        dAgent.addEventListener('click', function() {
          changeUserType(username_, id, 'Agent');
        });
        p.appendChild(dAgent);
        break;
      }
    
  
  /*
  const typeDiv = document.createElement("div");
  typeDiv.classList.add("PromoteAndDemote");
  elem.appendChild(typeDiv);

  const depDiv = document.createElement("div");
  depDiv.classList.add("changeAgentDepartment");
  elem.appendChild(depDiv);
    */
  //getChangeTypeButtons(user.username, user.type, user.id);
  getAccountTypesSelectMenu(user.username, user.id, user.type);
  getDepartmentsSelectMenu(user.username, user.id, user.department);
};

function toggleSearchUser(){
    const manageUserSec = document.getElementById('manage_users_sec');
    const searchUserDiv = document.querySelector('.searchUser');
    if(!manageUserSec){
      searchUserDiv.classList.remove('searchUser');
      searchUserDiv.classList.add('searchUserDefault');
    }
    else{
      searchUserDiv.classList.remove('searchUserDefault');
      searchUserDiv.classList.add('searchUser');
    }
}

toggleSearchUser();
getUserInfo(username_);
