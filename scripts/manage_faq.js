function deleteFAQ(id){
    var xhr = new XMLHttpRequest();
        xhr.open('POST', '../actions/delete_faq_action.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                location.reload();
            }
        };
        xhr.send('id=' + id);
}