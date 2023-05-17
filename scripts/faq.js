function deleteFAQ(id){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/delete_faq_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
    xhr.send('id=' + id);
}

function toggleTextarea(id){
    const questionElement = document.getElementById('faqQuestion' + id);
    const answerElement = document.getElementById('faqAnswer' + id);
    const buttonElement = document.getElementById('editFAQButton' + id);
    
    const isTextarea = questionElement.tagName === 'TEXTAREA';
    
    if (isTextarea) {
        const question = questionElement.value;
        console.log(question);
        const answer = answerElement.value;
        console.log(answer);
        editFAQ(id,question,answer);
        // Switch back to <h2> and <p> tags
        questionElement.outerHTML = "<h2 id='faqQuestion" + id + "'>" + questionElement.value + "</h2>";
        answerElement.outerHTML = "<p id='faqAnswer" + id + "'>" + answerElement.value + "</p>";
        buttonElement.textContent='Edit';
    } else {
        // Switch to <textarea> tags
        questionElement.outerHTML = "<textarea id='faqQuestion" + id + "' class='textareaFAQ'>" + questionElement.innerText + "</textarea>";
        answerElement.outerHTML = "<textarea id='faqAnswer" + id + "' class='textareaFAQ'>" + answerElement.innerText + "</textarea>";
        buttonElement.textContent='Save';
    }
}

function editFAQ(id,question,answer){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/edit_faq_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send('id=' + id+'&question='+ question+'&answer='+answer);
}