function changeTicketStatus(ticketId, status) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../actions/change_ticket_status_action.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      location.reload();
    }
  };

  xhr.send("ticket_id=" + ticketId + "&status=" + status);
}