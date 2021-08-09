document.getElementById("msg").style.display = "none";
document.getElementById('sulje').addEventListener('click', sulje);


function showMessage(type, msg){

    document.getElementById("msg").style.display = "block";

    let msgBox = document.getElementById("msg");
    let kommentUl = document.getElementById("kommentUl");


    if (type == 'onnistui') {
        msgBox.classList.remove('alert-warning');
        msgBox.classList.remove('alert-danger');
        msgBox.classList.add('alert-success');
        msgBox.querySelector('h4').innerHTML = "Success!";

    } else if (type == 'error') {
        msgBox.querySelector('h4').innerHTML = "Error has occured, no explanations";
        msgBox.classList.remove('alert-success');
        msgBox.classList.add('alert-danger');
        msgBox.classList.add('wow-bounce');


    } else if (type == 'warning') {
        msgBox.querySelector('h4').innerHTML = "Oops,";
        msgBox.classList.remove('alert-success');
        msgBox.classList.add('alert-danger');
        msgBox.classList.add('wow');
        msgBox.classList.add('bounce');


    } else if (type == 'comment') {
        kommentUl.querySelector('voted').innerHTML = "Oops,";
        kommentUl.setAttribute("style", "color: green")
        


    } 

    msgBox.querySelector('p').innerHTML = msg;
    msgBox.classList.remove('d-none');


}

function sulje(e){
    e.preventDefault();
    
    document.getElementById("msg").style.display = "none";

}