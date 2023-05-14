const getWithAsyncAwait = async () => {
    const response = await fetch("../actions/get_tickets_action.php");
    const jsonResponse = await response.json();
    
    const elem = document.querySelector('.activeTickets');
    elem.innerHTML = "";
    
    for (let i = 0; i < jsonResponse.length; i++) {
        const ticket = jsonResponse[i];
        
        const div = document.createElement("div");
        div.classList.add(ticket.priority);
        div.innerHTML = "";

        const ticketSubj = document.createElement("p");
        ticketSubj.textContent = "Subject: " + ticket.subject + " || Debug: ticket id: " + ticket.id;
        ticketSubj.classList.add("subjectTicket");
        div.appendChild(ticketSubj);

        const ticketText = document.createElement("p");
        ticketText.textContent = "Text: " + ticket.text;
        ticketText.classList.add("ticketText");
        div.appendChild(ticketText);

        const ticketDepartment = document.createElement("p");
        ticketDepartment.textContent = "Department: "+ ticket.department;
        ticketDepartment.classList.add("ticketDepartment");
        div.appendChild(ticketDepartment);

        const ticketUsername = document.createElement("p");
        ticketUsername.textContent = "Posted by: " + ticket.username; 
        ticketUsername.classList.add("ticketPostedBy");
        div.appendChild(ticketUsername);

        elem.appendChild(div);
        
    }
};
  
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
        document.querySelector("#ticketDepartment").value = '';
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
