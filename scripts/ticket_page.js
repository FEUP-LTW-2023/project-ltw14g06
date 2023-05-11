function changeTicketStatus(ticketId, status) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../actions/change_ticket_status_action.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if (this.status == 200) {
      location.href = "ticket_page.php?id=" + ticketId;
    }
  };

  xhr.send("ticket_id=" + ticketId + "&status=" + status);
}

const getSingleTicket = async (ticketId) => {
  const response = await fetch("../actions/get_single_ticket_action.php?ticket_id="+ticketId);
  const jsonResponse = await response.json();
  
  const elem = document.querySelector('#singleTicket');
  elem.innerHTML = "";
  
  for (let i = 0; i < jsonResponse.length; i++) {
      const ticket = jsonResponse[i];
      
      const div = document.createElement("div");
      div.classList.add(ticket.priority);
      div.innerHTML = "";

      const ticketSubj = document.createElement("p");
      ticketSubj.textContent = "Subject: " + ticket.subject;
      ticketSubj.classList.add("subjectTicket");
      div.appendChild(ticketSubj);

      const ticketStatus = document.createElement("p");
      ticketStatus.textContent = "Status: " + ticket.status
      ticketStatus.classList.add("ticketStatus");
      div.appendChild(ticketStatus);

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

      const ticketAssigned = document.createElement("p");
      ticketAssigned.textContent = "Assigned to: " + ticket.assigned;
      ticketAssigned.classList.add("ticketAssignedTo");
      div.appendChild(ticketAssigned);

      elem.appendChild(div);
      
  }
};

const ticketId = document.  
getSingleTicket(ticketId);
