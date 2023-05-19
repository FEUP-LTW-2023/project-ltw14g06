function deleteHashtag(ticketId, hashtag){
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../actions/delete_ticket_hashtag_action.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if (this.status == 200) {
      location.href = "ticket_page.php?id=" + ticketId;
      //getSingleTicket(ticketId);
    }
  };

  xhr.send("ticket_id=" + ticketId + "&hashtag=" + hashtag);
}

const getSingleTicket = async (ticketId) => {
  const response = await fetch("../actions/get_single_ticket_action.php?ticket_id="+ticketId);
  const jsonResponse = await response.json();
  
  const elem = document.querySelector('#singleTicket');
  elem.innerHTML = "";
  
  const ticket = jsonResponse;
      
  const div = document.createElement("div");
  div.classList.add(ticket.priority);
  div.innerHTML = "";

  const ticketSubj = document.createElement("p");
  ticketSubj.textContent = "Subject: " + ticket.subject;
  ticketSubj.classList.add("subjectTicket");
  div.appendChild(ticketSubj);

  const ticketPriority = document.createElement("p");
  ticketPriority.textContent = "Priority: " + ticket.priority;
  ticketPriority.classList.add("ticketPriority");
  div.appendChild(ticketPriority);

  const ticketStatus = document.createElement("p");
  ticketStatus.textContent = "Status: " + ticket.status;
  ticketStatus.classList.add("ticketStatus");
  div.appendChild(ticketStatus);

  const ticketHashtags = document.createElement("div");
  ticketHashtags.classList.add("ticketHashtags");
  (ticket.hashtags).forEach(hashtag => {
    const ticketHashtag = document.createElement("span");
    ticketHashtag.classList.add("pressHashtag");
    ticketHashtag.textContent = hashtag + "  ";
    ticketHashtags.appendChild(ticketHashtag);
    ticketHashtag.addEventListener('click', function() {
      deleteHashtag(ticketId, hashtag);
    })
  });
  div.appendChild(ticketHashtags);


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
  if(ticket.assigned_username != ''){
    ticketAssigned.textContent = "Assigned to: " + ticket.assigned_name + " (@" + ticket.assigned_username + ")";
  } else {
    ticketAssigned.textContent = "Assigned to: " + ticket.assigned_name;
  }
  ticketAssigned.classList.add("ticketAssignedTo");
  div.appendChild(ticketAssigned);

  elem.appendChild(div);

};

getSingleTicket(ticketId);

setInterval(() => {
  getSingleTicket(ticketId);
}, 1000);

const getTicketAnswers = async (ticketId) => {
  const response = await fetch("../actions/get_ticket_answers_action.php?ticket_id="+ticketId);
  const jsonResponse = await response.json();
    
  const elem = document.querySelector('#ticketAnswers');
  elem.innerHTML = "";
    
  for (let i = 1; i < jsonResponse.length; i++) {
    const ticket = jsonResponse[i];
        
    const div = document.createElement("div");
    div.classList.add("ticketAnswer");
    div.innerHTML = "";

    const ticketText = document.createElement("p");
    ticketText.textContent = "Text: " + ticket.text;
    ticketText.classList.add("ticketText");
    div.appendChild(ticketText);

    const ticketUsername = document.createElement("p");
    ticketUsername.textContent = "Posted by: " + ticket.postedBy; 
    ticketUsername.classList.add("ticketPostedBy");
    div.appendChild(ticketUsername);
      
    elem.appendChild(div);
  }

};

getTicketAnswers(ticketId);
setInterval(() => {
  getTicketAnswers(ticketId);
}, 1000);