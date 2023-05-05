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

    const elem = document.querySelector('#jstickets');
    elem.textContent = "Subject: " + await response.text();
}

const addNewTicket = document.querySelector('#newTicket');
console.log(addNewTicket);
const user_id = document.querySelector("#newTicket input[name = 'user_id']").value;
console.log(user_id);
postTicket();