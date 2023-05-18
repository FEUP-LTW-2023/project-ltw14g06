const encodeTicketForAjax = (data) => {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
    }).join('&')
};

const postTicket = async (user_id, subject, text, department, priority) => {
    const dataToSend = encodeTicketForAjax({user_id: user_id, subject: subject,text: text,department: department,priority: priority});
    const response = await fetch("../actions/add_ticket_action.php",{
        method: "POST",
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: dataToSend
    });

    if (response.ok) {
        document.querySelector("#newTicket input[name = 'ticketSubject']").value = '';
        document.querySelector("#newPostText").value = '';
        document.querySelector("#ticketDepartment").value = 0;
    }

    
}

const addNewTicket = document.querySelector('#newTicket');

addNewTicket.addEventListener('submit', function(event) {
  event.preventDefault();

  const user_id = document.querySelector("#newTicket input[name = 'user_id']").value;
  const subject = document.querySelector("#newTicket input[name = 'ticketSubject']").value;
  const text = document.querySelector("#newPostText").value;
  const department = document.querySelector("#ticketDepartment").value;

  postTicket(user_id, subject, text, department, 'Low');
});
