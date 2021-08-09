
let vaihtoehtoCount = 2;

document.getElementById('addOptioon').addEventListener('click', addNewOption);
document.getElementById('poista').addEventListener('click', poista);
document.forms['newPoll'].addEventListener('submit', createNewPoll);

function createNewPoll(e){
    e.preventDefault();
    const msg = document.querySelector('.msg');
    const msgtwo = document.querySelector('.msgtwo');
    const msgdate = document.querySelector('.msgdate');
    const msgdateend = document.querySelector('.msgdateend');

    const aihe = document.forms['newPoll']['aihe'].value;
    const aloitus = document.forms['newPoll']['aloitus'].value;
    const lopetus = document.forms['newPoll']['lopetus'].value;

    const viesti = document.forms['newPoll']['viesti'].value;

    const vaihtoehdot = [];



    const inputs = document.querySelectorAll('input');

    inputs.forEach(function (input){
        if (input.name.indexOf('vaihtoehto') == 0){
            vaihtoehdot.push(input.value);
        }
    });

 // tarkistaa vaihtoehdot, Toimii 90%
  if (aihe.length <= 0) {
  msgtwo.innerHTML = 'Aihe pitää valita.';
   return;
 } else if (vaihtoehdot[0].length <= 0 || vaihtoehdot[1].length <=0) {
 msg.innerHTML = 'Vähintään kaksi äänestys kohdetta pitää valita.';
 return;
 } else if (aloitus==null || aloitus=="" || lopetus=="" || lopetus=="") {
 msgdate.innerHTML = 'Vielä aloitus ja lopetus on hyvä merkata.';
 return;
 };


    let postData = `aihe=${aihe}&aloitus=${aloitus}&lopetus=${lopetus}&viesti=${viesti}`;
    let i = 0;
    vaihtoehdot.forEach(function(vaihtoehdot){
        postData += `&vaihtoehto${i++}=${vaihtoehdot}`
    })

    
//Lähettää createNewPOll.php
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        if (data.hasOwnProperty('onnistui')){
            let ids = this.responseText.substr(19, 3); // pitää manuualisesti vaihtaa isompaan.... ongelma.
            console.log(ids);
            window.location.href = "vote.php?id=" + ids; //siirtää toiseen ikkunaan
        } else {
            window.location.href = "omat.php?type=succec&msg=Uusi aani lisatty!" //siirtää toiseen ikkunaan

        }
    }
    ajax.open('POST', 'createNewPolluser.php', true);
    //ajax.setRequestHeader("Content-type: application/json;charset=utf-8");

    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(postData);

    


   

}; 


function poista(e){
    e.preventDefault();
    
    if(vaihtoehtoCount <=2) {
        return;
    }

    vaihtoehtoCount--;


    const poistaVika = document.querySelector('fieldset').lastElementChild;
    const parentElement = document.querySelector('fieldset');

    parentElement.removeChild(poistaVika);
}

function addNewOption(e){
    e.preventDefault();
    
    vaihtoehtoCount++;


    const div = document.createElement('div');
    div.classList.add('inputgroup');

    const label = document.createElement('label');
    const forAttribute = document.createAttribute('for');
    const labelText = document.createTextNode(`Voting option ${vaihtoehtoCount}`);
    forAttribute.value = `Voting option ${vaihtoehtoCount}`;
    label.setAttributeNode(forAttribute);
    label.appendChild(labelText);



    const input = document.createElement('input');
    
    input.classList.add('inputgroup');


    const inputType = document.createAttribute('type');
    inputType.value = "text";
    input.setAttributeNode(inputType);

    
    const inputName = document.createAttribute('name');
    inputName.value = `vaihtoehto${vaihtoehtoCount}`;
    input.setAttributeNode(inputName);

    const inputPlaceholder = document.createAttribute('placeholder');
    inputPlaceholder.value = `Voting option ${vaihtoehtoCount}`;
    input.setAttributeNode(inputPlaceholder);

    const inputStyle = document.createAttribute('style');
    inputStyle.value = "width: 80%";
    input.setAttributeNode(inputStyle);


    div.appendChild(label);
    div.appendChild(input);
    
    document.querySelector('fieldset').appendChild(div);

   
    
    

}