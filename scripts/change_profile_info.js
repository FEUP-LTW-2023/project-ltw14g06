const emailValidError = document.querySelector('#email_error');
const emailInUse = document.querySelector('#email_error');
const usernameInUse = document.querySelector('#username_error');
const passwordInvalid = document.querySelector('#password_error');
const passwordDifferent = document.querySelector('#confirm_password_error');
const oldPasswordIncorrect = document.querySelector('#old_password_error');

const encodeTicketForAjax = (data) => {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
    }).join('&')
};

const postChange = async (email,username,name,password,confirmPassword, oldPassword) => {
    const csrf = document.getElementById('csrf').value;
    const dataToSend = encodeTicketForAjax({email: email,username: username,name: name,password: password,confirmPassword: confirmPassword,oldPassword:oldPassword,csrf:csrf});
    const response = await fetch("../actions/change_info_action.php",{
        method: "POST",
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: dataToSend
    });
    emailValidError.textContent = '';
    emailInUse.textContent = '';
    usernameInUse.textContent = '';
    passwordInvalid.textContent = '';
    passwordDifferent.textContent = '';
    oldPasswordIncorrect.textContent= '';

    if(response.ok){
        window.location.replace("profile.php");
    }else{
        if(response.status === 452){
            emailValidError.textContent = 'Email is not valid';
        }
        else if(response.status === 453){
            emailInUse.textContent = 'Email is already in use';
        } 
        else if(response.status === 454){
            usernameInUse.textContent = 'Username is already in use';
        } 
        else if(response.status === 455){
            passwordInvalid.textContent = 'Password must be at least 8 characters long and have at least one capital letter';
        } 
        else if(response.status === 456){
            passwordDifferent.textContent = 'Passwords do not match';
        } else if (response.status === 457){
            oldPasswordIncorrect.textContent = "Old password isn't correct";
        }
    }
    
}

const change = document.querySelector('#change_info_form');

change.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const email = document.querySelector("#change_info_form input[name = 'email']").value;
    const username = document.querySelector("#change_info_form input[name = 'username']").value;
    const name = document.querySelector("#change_info_form input[name = 'name']").value;
    const password = document.querySelector("#change_info_form input[name = 'password']").value;
    const confirmPassword = document.querySelector("#change_info_form input[name = 'confirmPassword']").value;
    const oldPassword = document.querySelector("#change_info_form input[name = 'oldPassword']").value;

    postChange(email,username,name,password,confirmPassword, oldPassword);
  });