window.addEventListener('load', getPollsAll);
document.getElementById('votesUl').addEventListener('click', openPoll);



let data = null;




function getPollsAll(){
    console.log('haetaandataa')
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);    
        showPolls(data);
    }
    
    ajax.open("GET", "./Kirjaudu/backend/getPollsAll.php");
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
        if (type == 'current') {
            if ( (aloitus == false || aloitus <= now) && ( lopetus == false || lopetus >= now) ){

                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item-dark');
                newLi.dataset.voteid = poll.id;
               // newLi.setAttribute('style', 'padding-top: 7px; padding-bottom: 7px; border-block-color: black; background: #006eff57; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;');

        
                const liText = document.createTextNode(poll.aihe);
                newLi.appendChild(liText);
                
                ul.appendChild(newLi)

            }
        }


        //näytä vanhat
        if (type == 'old') {
            if ( lopetus < now && lopetus != false) {

                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item-dark');
                newLi.dataset.voteid = poll.id;
             //   newLi.setAttribute('style', 'padding-top: 7px; padding-bottom: 7px; border-block-color: black; background: #006eff57; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;');


        
                const liText = document.createTextNode(poll.aihe);
                newLi.appendChild(liText);
                
                ul.appendChild(newLi)
    
            }

        }

                //näytä Tulevat
        if (type == 'future') {
            if ( aloitus > now && aloitus != false) {

                const newLi = document.createElement('li');
                newLi.classList.add('list-group-item-dark');
                newLi.dataset.voteid = poll.id;
                //newLi.setAttribute('style', 'padding-top: 7px; padding-bottom: 7px; border-block-color: black; background: #006eff57; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;');

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