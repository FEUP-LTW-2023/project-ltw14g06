const emailValidError = document.querySelector('#email_error');
const emailInUse = document.querySelector('#email_error');
const usernameInUse = document.querySelector('#username_error');
const passwordInvalid = document.querySelector('#password_error');
const passwordDifferent = document.querySelector('#confirm_password_error');

const encodeTicketForAjax = (data) => {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
    }).join('&')
};

const postRegister = async (email,username,name,password,confirmPassword) => {
    const dataToSend = encodeTicketForAjax({email: email,username: username,name: name,password: password,confirmPassword: confirmPassword});
    const response = await fetch("../actions/register_action.php",{
        method: "POST",
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: dataToSend
    });
    emailValidError.textContent = '';
    emailInUse.textContent = '';
    usernameInUse.textContent = '';
    passwordInvalid.textContent = '';
    passwordDifferent.textContent = '';

    if(response.ok){
        window.location.replace("home.php");
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
        } 
    }
    
}

const register = document.querySelector('#register_form');

register.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const email = document.querySelector("#register_form input[name = 'email']").value;
    console.log(email);
    const username = document.querySelector("#register_form input[name = 'username']").value;
    console.log(username);
    const name = document.querySelector("#register_form input[name = 'name']").value;
    console.log(name);
    const password = document.querySelector("#register_form input[name = 'password']").value;
    console.log(password);
    const confirmPassword = document.querySelector("#register_form input[name = 'confirmPassword']").value;
    console.log(confirmPassword);
    
  
    postRegister(email,username,name,password,confirmPassword);
  });