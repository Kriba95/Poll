window.addEventListener('load', getMypolls);
document.getElementById('votesMyUl').addEventListener('click', openPoll);



let mydata = null;




function getMypolls(){
    console.log('haetaanmydataa')
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        mydata = JSON.parse(this.responseText);    
        showMypoll(mydata);
    }
    
    ajax.open("GET", "./backend/getPolls.php");
    ajax.send();
}

function showMypoll(mydata, type = 'current'){


    const ul = document.getElementById("votesMyUl");
    ul.innerHTML = "";




    const now = new Date();
    //json mydata
    mydata.forEach(poll => {

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
        if (type == 'current') {
            if ( (aloitus == false || aloitus <= now) && ( lopetus == false || lopetus >= now) ){

                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item-my');
                newLi.dataset.voteid = poll.id;

        
                const liText = document.createTextNode(poll.aihe);
                newLi.appendChild(liText);
                
                ul.appendChild(newLi)

            }
        }


        //näytä vanhat
        if (type == 'old') {
            if ( lopetus < now && lopetus != false) {

                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item-my');
                newLi.dataset.voteid = poll.id;

        
                const liText = document.createTextNode(poll.aihe);
                newLi.appendChild(liText);
                
                ul.appendChild(newLi)
    
            }

        }

                //näytä Tulevat
        if (type == 'future') {
            if ( aloitus > now && aloitus != false) {

                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item-my');
                newLi.dataset.voteid = poll.id;
        
                const liText = document.createTextNode(poll.aihe);
                newLi.appendChild(liText);
                
                ul.appendChild(newLi)
    
            }

        }      
    });
}

function openPoll(event){
    console.log(event.target.dataset.voteid);
    window.location.href = "vote.php?id=" + event.target.dataset.voteid;
}