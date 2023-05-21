function deleteDepartment(id){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/delete_department_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
    const csrf = document.getElementById('csrf').value;
    xhr.send('id=' + id + '&csrf='+csrf);
}

function deleteHashtag(id){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/delete_hashtag_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
    const csrf = document.getElementById('csrf').value;
    xhr.send('id=' + id + '&csrf='+csrf);
}


function deleteStatus(id){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/delete_status_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
    const csrf = document.getElementById('csrf').value;
    xhr.send('id=' + id + '&csrf='+csrf);
}

const deleteDepartmentButton = document.getElementById('delete_department_button');
deleteDepartmentButton.addEventListener('click', function(){
    deleteDepartment(document.querySelector('#delete_departments_select').value);
})

const deleteHashtagButton = document.getElementById('delete_hashtag_button');
deleteHashtagButton.addEventListener('click', function(){
    deleteHashtag(document.querySelector('#delete_hashtag_select').value);
})

const deleteStatusButton = document.getElementById('delete_status_button');
deleteStatusButton.addEventListener('click', function(){
    deleteStatus(document.querySelector('#delete_status_select').value);
})