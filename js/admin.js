
window.addEventListener('load', getOwnPolls);
document.getElementById('votesUl').addEventListener('click', openPoll);



let data = null;




function getOwnPolls(){
    console.log('haetaandataa')
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);    
        showPolls(data);
    }
    
    ajax.open("GET", "./backend/getPolls.php");
    ajax.send();
}

function showPolls(data, type = 'current'){


    const ul = document.getElementById("votesUl");
    ul.innerHTML = "";




    const now = new Date();
    //json data
    data.forEach(poll => {

        let aloitus = false;
        let lopetus = false;
        
        //00000-00-00T00:00
        if (poll.aloitus != "0000-00-00"){
            aloitus = new Date(poll.aloitus);
        } 
        if (poll.lopetus != "0000-00-00 00:00:00"){
            lopetus = new Date(poll.lopetus);
        }



        console.log(aloitus);
        console.log(lopetus);

        // tämän hetkinen aika sallitaan



        //näytä vanhat
        if (type == 'old') {

            if ( lopetus < now && lopetus != false) {
                createPollLi(ul, poll.id, poll.aihe);
               
    
            }

        } else if (type == 'future') {
            if ( aloitus > now) {

                createPollLi(ul, poll.id, poll.aihe);

            }

        } else {
                if ( (aloitus == false || aloitus <= now) && ( lopetus == false || lopetus >= now) ){
    
                    createPollLi(ul, poll.id, poll.aihe);

    
                }
            }

                




    });
}


//create new li, elemnt for poll
function createPollLi(targetUl, pollId, pollAihe){

    const newLi = document.createElement('li');
    newLi.classList.add('list-group-item');
    newLi.dataset.voteid = pollId;

    const newDeleteBtn = document.createElement('button');
newDeleteBtn.dataset.action = 'poista';

    const deleteText = document.createTextNode('Poista äänestys');
    newDeleteBtn.appendChild(deleteText);

    const newEditBtn = document.createElement('button');
newEditBtn.dataset.action = 'muokkaa';

    const editText = document.createTextNode('Muokkaa');
    newEditBtn.appendChild(editText);



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
        data = JSON.parse(this.responseText);
        console.log(data);
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