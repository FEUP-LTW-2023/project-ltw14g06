function deleteFAQ(id){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/delete_faq_action.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
    const csrf = document.getElementById('csrf').value;
    xhr.send('id=' + id + '&csrf='+csrf);
}

function toggleTextarea(id){
    const questionElement = document.getElementById('faq_question_' + id);
    const answerElement = document.getElementById('faq_answer_' + id);
    const buttonElement = document.getElementById('edit_faq_button_'+id);
    
    const isTextarea = questionElement.tagName === 'TEXTAREA';
    
    if (isTextarea) {
        const question = questionElement.value;
        const answer = answerElement.value;
        editFAQ(id,question,answer);
        questionElement.outerHTML = "<h2 id='faq_question_" + id + "'>" + questionElement.value + "</h2>";
        answerElement.outerHTML = "<p id='faq_answer_" + id + "'>" + answerElement.value + "</p>";
        buttonElement.textContent='Edit';
    } else {
        questionElement.outerHTML = "<textarea id='faq_question_" + id + "' class='textareaFAQ'>" + questionElement.innerText + "</textarea>";
        answerElement.outerHTML = "<textarea id='faq_answer_" + id + "' class='textareaFAQ'>" + answerElement.innerText + "</textarea>";
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
    const csrf = document.getElementById('csrf').value;
    xhr.send('id=' + id+'&question='+ question+'&answer='+answer+ '&csrf='+csrf);
}

const getFaq = async () => {
    var response = await fetch("../actions/get_faq_action.php");
    const jsonResponse = await response.json();
    const userType = document.getElementById("user_type").value;

    const elem = document.querySelector('.question_list');
    elem.innerHTML = "";

    for (let i = 0; i < jsonResponse.length; i++) {
        const qa = jsonResponse[i];

        const li = document.createElement("li");
        li.classList.add('questionAnswer');

        const question = document.createElement('h2');
        question.id = 'faq_question_' + qa.id;
        question.textContent = qa.question;
        li.appendChild(question);

        const answer = document.createElement('p');
        answer.textContent = qa.answer;
        answer.id = 'faq_answer_' + qa.id;
        li.appendChild(answer);

        if(userType !== 'Client'){
            const div = document.createElement('div');
            div.classList.add('buttonContainer');

            const deleteButton = document.createElement('button');
            deleteButton.classList.add('deleteFAQ');
            deleteButton.textContent = 'Delete';

            deleteButton.addEventListener('click', function() {;
                deleteFAQ(qa.id);
            });

            div.appendChild(deleteButton);

            const editButton = document.createElement('button');
            editButton.classList.add('deleteFAQ');
            editButton.id= "edit_faq_button_" + qa.id;
            editButton.textContent = 'Edit';

            editButton.addEventListener('click', function() {;
                toggleTextarea(qa.id);
            });

            div.appendChild(editButton);

            li.appendChild(div);
        }
        elem.appendChild(li);
        
    }
    
}

getFaq();