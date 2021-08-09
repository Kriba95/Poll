
const pollQueryString = window.location.search;
const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){
    getPollData(pollParams.get('id'));
} 
let vaihtoehtoCount = 0;
let toDelete = [];

document.getElementById('addOptioon').addEventListener('click', addNewOption);
document.getElementById('poista').addEventListener('click', poista);

document.forms['editPoll'].addEventListener('submit', modifyPoll);
document.querySelector('fieldset').addEventListener('click', getFieldsetClick); // hakee lomakkeen


function getPollData(id){
 //   console.log(id);
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
      //  console.log(data);
        populatePollForm(data);
    }    
    ajax.open("GET", "./backend/getPoll.php?id=" + id);
    ajax.send();
}

function populatePollForm(data){
    document.forms['editPoll']['id'].value = data.id;
    document.forms['editPoll']['aihe'].value = data.aihe;
    document.forms['editPoll']['aloitus'].value = data.aloitus.replace(" ", "T");
    document.forms['editPoll']['lopetus'].value = data.lopetus.replace(" ", "T");
    document.forms['editPoll']['viesti'].value = data.viesti;

const target = document.querySelector('fieldset');

    data.vaihtoehdot.forEach(function(vaihtoehto){
       // console.log(vaihtoehto);
        vaihtoehtoCount++;
        target.appendChild(createOptionInputDiv(vaihtoehtoCount, vaihtoehto.name, vaihtoehto.id))


    })
}

//Create optiondiv
function createOptionInputDiv(count, name, id){
    


    const div = document.createElement('div');
    div.classList.add('inputgroup');

    const label = document.createElement('label');

    const forAttribute = document.createAttribute('for');
    const labelText = document.createTextNode(`Voting options ${count}`);
    forAttribute.value = `Voting options ${count}`;


    label.setAttributeNode(forAttribute);
    label.appendChild(labelText);



    const input = document.createElement('input');

    
    input.classList.add('inputgroup');

    const inputButton = document.createAttribute('type');
    inputButton.value = "button";
    input.setAttributeNode(inputButton);


    const inputType = document.createAttribute('type');
    inputType.value = "text";
    input.setAttributeNode(inputType);

    
    const inputName = document.createAttribute('name');
    inputName.value = `vaihtoehto${count}`;
    input.setAttributeNode(inputName);

    const inputPlaceholder = document.createAttribute('placeholder');
    inputPlaceholder.value = `Voting options ${count}`;
    input.setAttributeNode(inputPlaceholder);

    const inputStyle = document.createAttribute('style'); //mun lisäämä
    inputStyle.value = "width: 80%";
    input.setAttributeNode(inputStyle);

    



    
    //Poisto Nappi


    const deleteButton = document.createElement('button');
   


    deleteButton.className = "btn-danger";
    

    const deleteText = document.createTextNode('Delete');
    //const deleteClass = document.createAttribute('id'); //mun lisäämä
    //deleteClass.value = `vahenna ${count}`;
   // deleteButton.setAttributeNode(deleteClass);


    deleteButton.appendChild(deleteText);
    deleteButton.dataset.action = 'delete';
   






    input.dataset.vaihtoehtoid = id;

    input.value = name;






    div.appendChild(label);
    div.appendChild(input);
    div.appendChild(deleteButton); // lisää poisto napin



    return div; 
    


    
    

}


function poista(e){
    e.preventDefault();
    
    if(vaihtoehtoCount <=2) {
        return;
    } else if(vaihtoehtoCount >=2) {
    

    vaihtoehtoCount--;


    const poistaVika = document.querySelector('fieldset').lastElementChild;
    const parentElement = document.querySelector('fieldset');

    parentElement.removeChild(poistaVika);
    
    }
}

function addNewOption(e){
    e.preventDefault();
    
    vaihtoehtoCount++;


    const div = document.createElement('div');
    div.classList.add('inputgroup');

    const label = document.createElement('label');
    const forAttribute = document.createAttribute('for');
    const labelText = document.createTextNode(`Voting options ${vaihtoehtoCount}`);
    forAttribute.value = `Voting options ${vaihtoehtoCount}`;
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
    inputPlaceholder.value = `Voting options ${vaihtoehtoCount}`;
    input.setAttributeNode(inputPlaceholder);

    const inputStyle = document.createAttribute('style');
    inputStyle.value = "width: 80%";
    input.setAttributeNode(inputStyle);


    //Poisto Nappi
    const deleteButton = document.createElement('button');
    deleteButton.className = "btn-danger";
    

    const deleteText = document.createTextNode('Delete');
    deleteButton.appendChild(deleteText);
    deleteButton.dataset.action = 'delete';


    div.appendChild(label);
    div.appendChild(input);
    div.appendChild(deleteButton); // lisää poisto napin

    
    document.querySelector('fieldset').appendChild(div);

   
    
    

}

function modifyPoll(e){
    e.preventDefault();
    console.log('save changes');
    vaihtoehtoCount++;


    const msg = document.querySelector('.msg');
    const msgtwo = document.querySelector('.msgtwo');
    const msgdate = document.querySelector('.msgdate');

    // kerää polldata
    let pollData = {};
    pollData.id = document.forms['editPoll']['id'].value;
    pollData.aihe = document.forms['editPoll']['aihe'].value;
    pollData.aloitus = document.forms['editPoll']['aloitus'].value;
    pollData.lopetus = document.forms['editPoll']['lopetus'].value;
    pollData.viesti = document.forms['editPoll']['viesti'].value;

    const vaihtoehdot = [];
    const inputs = document.querySelectorAll('input');

    inputs.forEach(function(input){
        console.log(input.name.indexOf('vaihtoehto'));

        if(input.name.indexOf('vaihtoehto') == 0){
            vaihtoehdot.push({ id: input.dataset.vaihtoehtoid, name: input.value })
        }
    });


 // tarkistaa vaihtoehdot, Toimii 90%
    if (pollData.aihe.length <= 0) {
    msgtwo.innerHTML = 'Aihe pitää lisätä.';
     return;

   } else if ( vaihtoehdot[0].name == "" ) {
   msg.innerHTML = '<br>Vähintään kaksi äänestys kohdetta pitää lisätä.';
   return;
   } 
   
   
   
   
   
   
   
   
   
   
   
   
   
   else if (pollData.aloitus==null || pollData.aloitus=="" || pollData.lopetus=="" || pollData.lopetus=="") {
   msgdate.innerHTML = 'Vielä aloitus ja lopetus on hyvä merkata.';
   return;
   };
   console.log(vaihtoehdot)


    pollData.vaihtoehdot = vaihtoehdot;

    // poisto ominaisuus uudesta vaihtoehdosta
    pollData.todelete = toDelete;

    console.log(pollData.todelete);

    //lähetä to backend
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        let data = JSON.parse(this.responseText);
        //console.log(data);
        if (data.hasOwnProperty('succesc')){
            window.location.href = "index.php?type=success&msg=Poll edited";
        } else
        showMessage('error', data.error);
    }
    ajax.open("POST", "./backend/modifyPoll.php", true);
    ajax.setRequestHeader("Content-Type", "application/json");
    ajax.send(JSON.stringify(pollData));
}


function getFieldsetClick(e){ //poisto ominaisuus
    e.preventDefault();
    //console.log(e.target)
    let btn = e.target;

    if (btn.dataset.action == 'delete'){
        let div = btn.parentElement;
        let input = div.querySelector('input');
        let fieldset = div.parentElement;
        toDelete.push({id: input.dataset.vaihtoehtoid});
        fieldset.removeChild(div);
    }
}

/* 
document.getElementById('vahenna').addEventListener('click', vahenna);

function vahenna(e){
    e.preventDefault();
    
    if(vaihtoehtoCount <=2) {
        return;
    } else if(vaihtoehtoCount >=2) {
    

    vaihtoehtoCount--;

    const deleteButton = document.createElement('button');
    deleteButton.className = "btn-danger";
    

    const deleteText = document.createTextNode('Poista');
    deleteButton.appendChild(deleteText);
    deleteButton.dataset.action = 'delete';
    div.appendChild(deleteButton); // lisää poisto napin
    
    }
}
*/