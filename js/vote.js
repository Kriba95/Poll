const pollQueryString = window.location.search;
//console.log(pollQueryString);


const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){

    getPollData(pollParams.get('id'));

}

document.getElementById('vaihtoehdotUl').addEventListener('click', giveVote);




function getPollData(id){
  //  console.log(id);// sen datan
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        showPoll(data);

    }
    ajax.open("GET", "./backend/getPoll.php?id=" + id);
    ajax.send();
} //lähettää sen getPolliin.php

function showPoll(data){

    datee = new Date(data.aloitus);
    vuosi = datee.getFullYear();
    kuukausi = datee.getMonth()+1;
    paiva = datee.getDate();
    
    if (paiva < 10) {
        paiva = '0' + paiva;
    }
    if (kuukausi < 10) {
        kuukausi = '0' + kuukausi;
    }
    dateee = new Date(data.lopetus);
    vuosii = dateee.getFullYear();
    kuukausii = dateee.getMonth()+1;
    paivaa = dateee.getDate();
    tunnit = dateee.getHours();
    minsat = dateee.getMinutes();
    
    if (paivaa < 10) {
        paivaa = '0' + paivaa;
    }
    if (kuukausii < 10) {
        kuukausii = '0' + kuukausii;
    }

     
    //console.log(paivaa+'.' + kuukausii + '.'+vuosii+ '  ' +tunnit+'.'+minsat);

    //console.log(data.aloitus)
    document.querySelector('h1').innerHTML = data.aihe;
    document.getElementById('aloitus').innerHTML = paiva+'.' + kuukausi + '.'+vuosi;
    document.getElementById('lopetus').innerHTML = paivaa+'.' + kuukausii + '.'+vuosii+ '  <b>Time:</b> ' +tunnit+'.'+minsat;

    const ul = document.getElementById('vaihtoehdotUl')




   




    data['vaihtoehdot'].forEach(vaihtoehto => {

        const newLi = document.createElement('p');
        newLi.classList.add('list-group-item');
        newLi.dataset.vaihtoehtoid = vaihtoehto.id;

        newLi.setAttribute('style', 'cursor: pointer; padding-top: 7px; padding-bottom: 7px; border-block-color: black; background-color: #333; color: #fff; margin-bottom: 5px; margin-top: 5px; padding-right: 6px; font-size: 20px; padding-left: 10px;');

        
        const newButton = document.createElement('button');
        newButton.classList.add('btn-primary');
        newButton.setAttribute('style', 'float: right; margin-top: -4px;');
        

        newButton.dataset.vaihtoehtoid = vaihtoehto.id;

       


       


        const liText = document.createTextNode(vaihtoehto.name);
        const buttonText = document.createTextNode("Äänestä");


        newLi.appendChild(liText);
        newButton.appendChild(buttonText);

        newLi.appendChild(newButton);
        ul.appendChild(newLi);

    });
} 
 // antaa id nappulasta
function giveVote(event){
    console.log(event.target.dataset.vaihtoehtoid);
    
    let id = event.target.dataset.vaihtoehtoid;

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);

        if(data.hasOwnProperty('onnistui')){
            showMessage('onnistui', data.onnistui);
        } else if(data.hasOwnProperty('warning')){
            showMessage('warning', data.warning);
        }

        //console.log(data);
    }
    ajax.open("GET", "./backend/givevote.php?id=" + id);
    ajax.send();
} //lähettää sen getPolliin.php
