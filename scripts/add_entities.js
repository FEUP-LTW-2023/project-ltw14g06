function deleteDepartment(id){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/delete_department_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
    xhr.send('id=' + id);
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
    xhr.send('id=' + id);
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
    xhr.send('id=' + id);
}