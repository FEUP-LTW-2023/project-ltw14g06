const encodeTicketForAjax = (data) => {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
    }).join('&')
};

const postTicket = async (user_id, subject, text, department, priority) => {
    const csrf = document.getElementById('csrf').value;
    const dataToSend = encodeTicketForAjax({user_id: user_id, subject: subject,text: text,department: department,priority: priority,csrf:csrf});
    const response = await fetch("../actions/add_ticket_action.php",{
        method: "POST",
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: dataToSend
    });

    if (response.ok) {
        window.location.replace("user_active_tickets.php");
    } else{
        if(response.status === 452){
            subjectInvalid.textContent = 'Subject must be under  characters!'
        }
    } 
}

    const subjectInvalid = document.querySelector('#subject_invalid');
    subjectInvalid.textContent = '';

    const ticketSubject = document.querySelector('#ticketSubject');
    ticketSubject.addEventListener('click', function(){
        subjectInvalid.textContent = '';
});


const addNewTicket = document.querySelector('#newTicket');

addNewTicket.addEventListener('submit', function(event) {
  event.preventDefault();

  const user_id = document.querySelector("#newTicket input[name = 'user_id']").value;
  const subject = document.querySelector("#newTicket input[name = 'ticketSubject']").value;
  const text = document.querySelector("#newPostText").value;
  const department = document.querySelector("#ticketDepartment").value;

  postTicket(user_id, subject, text, department, 'Low');
});
