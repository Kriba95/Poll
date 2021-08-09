//const pollQueryString = window.location.search;
console.log(pollQueryString);


//const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){

    getPollData(pollParams.get('id'));

}

const colors = [

    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)'
    
]
const borderColor = [
    
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)',
    'rgba(255, 255, 255, 0.9)',
    'rgb(139, 98, 254)'
    ]


function getPollData(id){
    console.log(id);//kerää sen datan
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        showResults(data);

    }
    ajax.open("GET", "Kirjaudu/backend/getPoll.php?id=" + id);
    ajax.send();
} //lähettää sen getPolliin.php
function showResults(data){



    document.querySelector('h1').innerHTML = data.aihe;
    document.getElementById('Description').innerHTML = data.viesti;


    //const ul = document.getElementById('vaihtoehdotUl');
    const ul = document.getElementById('aanetUl');


    let pollData = { 
        datasets: [{
            data: [],
            backgroundColor:[],
            borderColor:[]

        }],
        labels: []
    };
    

    // Jos ei ole ääniä älä näytä donitsia
    let i = data.vaihtoehdot.reduce((acc, i) => acc += i.votes, 0);
    let vahyks = parseInt(i, 10);
    if (vahyks == 0) {
        document.getElementById("chartti").style.display = "none";
        let vasenikkuna = document.getElementById('vasenikkuna');
        vasenikkuna.setAttribute('class', 'col-');
    } else if (vahyks >= 0) {
        document.getElementById("chartti").style.display = "block";
        let vasenikkuna = document.getElementById('vasenikkuna');
        vasenikkuna.setAttribute('class', 'col-xs-12 col-md-6');
    } 

    let index = 0;

    data.vaihtoehdot.forEach(function(vaihtoehto){
        pollData.labels.push(vaihtoehto.name);
        pollData.datasets[0].data.push(vaihtoehto.votes);
        pollData.datasets[0].backgroundColor.push(colors[index]);
        pollData.datasets[0].borderColor.push(borderColor[index]);
        index++;




        const newLi  = document.createElement('li');
        newLi.className = 'list-group-item';


        const newSpan = document.createElement('span');
        newSpan.className = 'badge-primary';

        const spanText = document.createTextNode(vaihtoehto.votes);
       // const liText = document.createTextNode(vaihtoehto.name);


       const liText = document.createTextNode(vaihtoehto.name + " : " + vaihtoehto.votes);


        newLi.appendChild(liText);
    
        newLi.appendChild(newSpan);

        ul.appendChild(newLi);


        


        
        



        

    });


    


    var ctx = document.getElementById('myChart').getContext('2d');
    console.log(pollData.vaihtoehto);

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: pollData,

        
      });


      // Kommentit
const p = document.getElementById('kommentUl');

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

        liKuva.src = './assets/images/question.png';
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

        /* <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2">
                <div class="d-flex justify-content-between py-1 pt-2">
                    <div><img src="https://i.imgur.com/tPvlEdq.jpg" width="18"><span class="text2">Curtis</span></div>
                    <div><span class="text3">Upvote?</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span><span class="text4">3</span></div>
                </div>
            </div>
        </div> */

        });
} 


