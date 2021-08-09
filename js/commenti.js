document.forms['komment'].addEventListener('submit', komment);
document.getElementById('kommentUl').addEventListener('click', giveVoteComment);




function giveVoteComment(event){
    let jokuid = event.target.dataset[Object.keys(event.target.dataset)[0]];
        
    if (jokuid !== null){
        return;
    } else {
        let id = jokuid;

        let ajax = new XMLHttpRequest();
        ajax.onload = function(){
            data = JSON.parse(this.responseText);
    
            if(data.hasOwnProperty('voteonnistui')){
                showMessage('voteonnistui', data.onnistui);
                location.reload();
            } else if(data.hasOwnProperty('warning')){
                showMessage('warning', data.warning);
            }
    
            console.log(data); 
        }
        
        ajax.open("GET", "kirjaudu/backend/givecomment.php?id=" + id);
        ajax.send();



    }


} 





function komment(e){
    e.preventDefault();


    const teksti = document.forms['komment']['teksti'].value;
    //const username = document.forms['komment']['username'].value;





    



    console.log(data.id)

    let postDataa = `teksti=${teksti}&id=${data.id}`; //&username=${username}
    

    
//Lähettää createNewPOll.php
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        console.log(data.id)

        if (data.hasOwnProperty('succesc')){
            location.reload();  
        } else {
            location.reload();  

        }
    }
    ajax.open('POST', './kirjaudu/comment.php', true);
    //ajax.setRequestHeader("Content-type: application/json;charset=utf-8");

    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(postDataa);

    


    console.log(postDataa)


    console.log(postDataa.responseText)

}; 
