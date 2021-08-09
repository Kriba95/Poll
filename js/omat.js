
window.addEventListener('load', getOwnPolls);
document.getElementById('voteUl').addEventListener('click', openPoll);



let dataM= null;




function getOwnPolls(){
    console.log('haetaandataa')
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        dataM = JSON.parse(this.responseText);    
        showPoll(dataM);
    }
    
    ajax.open("GET", "./backend/getPolls.php");
    ajax.send();
}

function showPoll(dataM, type = 'all'){


    const ul = document.getElementById("voteUl");
    ul.innerHTML = "";


    if (dataM.length == 0) {
        document.getElementById("non").style.display = "block";
 
    } else if (dataM.length >= 0) {
        document.getElementById("non").style.display = "none";
       
    }


    const now = new Date();
    //json data
    dataM.forEach(poll => {

        let aloitus = false;
        let lopetus = false;
        
        //00000-00-00T00:00
        if (poll.aloitus != "0000-00-00 00:00:00"){
            aloitus = new Date(poll.aloitus);
        } 
        if (poll.lopetus != "0000-00-00 00:00:00"){
            lopetus = new Date(poll.lopetus);
        }



     //   console.log(aloitus);
     //   console.log(lopetus);

        // tämän hetkinen aika sallitaan



        //näytä vanhat
        if (type == 'old') {
            if ( lopetus < now ) {
                createPollLi(ul, poll.id, poll.aihe);
                document.getElementById("non").style.display = "none";
            } else {
                document.getElementById("non").style.display = "block";
            } 

        } else if (type == 'future') {
            if ( aloitus > now) {
                createPollLi(ul, poll.id, poll.aihe);
                document.getElementById("non").style.display = "none";
            } else if (aloitus > now) {
                document.getElementById("non").style.display = "block";
            }

        } else if (type == 'current') {           
            if (aloitus <= now && lopetus >= now) {
                createPollLi(ul, poll.id, poll.aihe);
                document.getElementById("non").style.display = "none";
            } else if  (aloitus <= now && lopetus >= now)  {
                document.getElementById("non").style.display = "block";
            }

        } else  {
            createPollLi(ul, poll.id, poll.aihe);
        }

                




    });
}


//create new li, elemnt for poll
function createPollLi(targetUl, pollId, pollAihe){

    const newLi = document.createElement('li');
    newLi.classList.add('list-group-item-dark');
    newLi.dataset.voteid = pollId;
    //newLi.setAttribute('style', 'padding-top: 7px; padding-bottom: 7px; border-block-color: black; background: #006eff57; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;');

    const newDeleteBtn = document.createElement('button');
    newDeleteBtn.classList.add('btn-danger');

newDeleteBtn.dataset.action = 'poista';

    const deleteText = document.createTextNode('Delete');
    newDeleteBtn.appendChild(deleteText);
    newDeleteBtn.setAttribute('style', 'float: right; margin-top: -4px;');

    const newEditBtn = document.createElement('button');
newEditBtn.dataset.action = 'muokkaa';
newEditBtn.classList.add('btn-primary');


    const editText = document.createTextNode('Modify');
    newEditBtn.appendChild(editText);
    newEditBtn.setAttribute('style', 'float: right; margin-top: -4px; margin-left: 5px; border-radius: 12px;');



    const liText = document.createTextNode(pollAihe);
    newLi.appendChild(liText);

    newLi.appendChild(newEditBtn);
    newLi.appendChild(newDeleteBtn);

    
    targetUl.appendChild(newLi)
 

}


function openPoll(event){



    console.log(event.target.dataset);
    const action = event.target.dataset.action;
    
    if (action == 'poista'){
        let pollId = event.target.parentElement.dataset.voteid;

        poistaPoll(pollId);
        return;

    }   if (action == 'muokkaa'){
        let pollId = event.target.parentElement.dataset.voteid;

        muokkaaPoll(pollId);
        return;
    }
    window.location.href = "vote.php?id=" + event.target.dataset.voteid;
}

function poistaPoll(id){
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        dataM = JSON.parse(this.responseText);
        console.log(dataM);
        let liToDelete = document.querySelector(`[data-voteid="${id}"]`);
        let parent = liToDelete.parentElement;
        parent.removeChild(liToDelete);
    }
    ajax.open("GET", "./backend/poistaPoll.php?id=" + id);
    ajax.send();
}

function muokkaaPoll(id){
    window.location.href= "editPoll.php?id=" + id;
}