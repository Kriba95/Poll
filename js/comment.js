document.forms['komment'].addEventListener('submit', komment);
document.getElementById('kommentUl').addEventListener('click', giveVoteComment);
document.getElementById('maincomment').addEventListener('click', mainComment);

function mainComment(e){
    e.preventDefault();
    const p = document.getElementById('maincomment');

    data.comments.forEach(function(comment){
        let dataa = pollData;
        dataa.labels.push(comment.teksti);
        dataa.datasets[0].data.push(comment.votes);



        //console.log(comment.votes);



        const commentVotes = document.createTextNode(comment.votes);


        const newLi  = document.createElement('div');
        

        newLi.className = 'd-flex justify-content-center py-2';


        const newSpan = document.createElement('div');
        newSpan.className = 'second py-2 px-2';
        newSpan.setAttribute("style", "border-style: solid; border-color: rgb(234 234 234);")


        const row = document.createElement('div');
        row.className = 'row';

        const joku = document.createElement('div');
        joku.className = 'd-flex justify-content-between py-1 pt-2';

        const jokuvaa = document.createElement('div');
        jokuvaa.className = 'div';

        const jokuvaaa = document.createElement('div');
        jokuvaaa.className = 'div';
        jokuvaaa.classStyle = 'hello';

        // const liText = document.createTextNode(vaihtoehto.name);
        const liTeksti = document.createElement('span');
        liTeksti.setAttribute("style", "margin-top: 30px; margin-left: 10px;");


        const liText = document.createTextNode(comment.teksti);

        const jokuteksti = document.createElement('span');
        jokuteksti.setAttribute("style", "margin-right:10px; margin-left: 38px;");
        jokuteksti.innerHTML = "Anonymous | ";

        const vote = document.createElement('span');
        vote.setAttribute("style", "margin-left: -5px; cursor: pointer;");
        vote.setAttribute("tabindex", "1");

        vote.innerHTML = "Upvote  ";
        vote.className = 'voted';

        const peukku = document.createElement('i');
        peukku.className = 'fa fa-thumbs-o-up voted';

        peukku.setAttribute("style", "");
        peukku.dataset.commentid = comment.id;
        vote.dataset.commentid = comment.id;

        
        const hr = document.createElement('hr');
        hr.setAttribute("style", "border-top: 1px solid #eeeeee; margin-top: 0px; margin-bottom: 0px; max-width: 95%;");





        const liKuva =  document.createElement('img');

        liKuva.src = '../assets/images/question.png';
        liKuva.setAttribute("width", "70px")
        liKuva.setAttribute("style", "padding-top: 5px; padding-left: 5px;")





        newLi.appendChild(newSpan);
        newSpan.appendChild(joku);

        joku.appendChild(jokuvaa);
        joku.appendChild(hr);
        joku.appendChild(jokuteksti);
        joku.appendChild(vote);
        joku.appendChild(peukku);
        joku.appendChild(commentVotes);





        liTeksti.appendChild(liText);

        jokuvaa.appendChild(liKuva);
        jokuvaa.appendChild(liTeksti);

        p.appendChild(newLi);
    });
} 







function giveVoteComment(event){
    let jokuid = event.target.dataset[Object.keys(event.target.dataset)[0]];
        
    if (jokuid == null){
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
        
        ajax.open("GET", "./backend/givecomment.php?id=" + id);
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
        } else {

        }
    }
    ajax.open('POST', 'comment.php', true);
    //ajax.setRequestHeader("Content-type: application/json;charset=utf-8");

    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(postDataa);

    


    console.log(postDataa)


    console.log(postDataa.responseText)

}; 
