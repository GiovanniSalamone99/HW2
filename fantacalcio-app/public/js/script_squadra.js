function addGiocatori(event){
    id=event.currentTarget.parentNode.parentNode.dataset.idSquadra;
    nome=event.currentTarget.parentNode.parentNode.firstChild.textContent;
    window.location="modifica_squadra?id_squadra="+id+"&nome="+nome;

}
function addSquadra(event){
    event.preventDefault();
    if(form.nome_squadra.value!=""){
    fetch(route('add_squadra',form.nome_squadra.value)).then(fetchResponse)
    .then(function (json){ return aggiungi_squadra(json) });
    }else{
        alert("Inserire un nome valido per la squadra");
    }
}
function aggiungi_squadra(json){
    if(json.length>0){
        document.querySelector(".error").classList.add("hidden");
        fetchSquadreJson(json);
    }else{
        document.querySelector(".error").classList.remove("hidden");
    }
}
function eliminaSquadra(event){
    button = event.currentTarget;
    fetch(route('elimina_squadra',button.parentNode.parentNode.dataset.idSquadra)).then(fetchResponse)
    .then(function (json){ return aggiorna(json,button) });
}
function aggiorna(json,button){
    console.log(json.ok);
    if (json.ok) return null;
    button.parentNode.parentNode.remove();
    numSquadre=numSquadre-1;
    if(numSquadre==0)
    {
        document.getElementById("risultato").classList.remove("hidden");
    }
}
function fetchSquadreJson(json)
{
    console.log(json);
    document.querySelector(".error").classList.add("hidden");
    if(json.length>0){
        for(let i in json)
        {
            const tabella= document.querySelector(".squadre table");
            const riga=document.createElement("tr");
            riga.dataset.idSquadra=json[i].id;
            const nome=document.createElement("td");
            nome.textContent=json[i].nome;
            const lega=document.createElement("td");
            if(json[i].lega!=null)
            {
                fetch(route('get_lega',json[i].lega)).then(fetchResponse).then(function (json){ 
                    console.log(json);
                    lega.textContent=json.Nome;
                });
                
            }else{
                lega.textContent="-";
            }
            
            const add=document.createElement("td");
            const imgadd=document.createElement("img");
            imgadd.src="img/addgiocatore.png";
            const elimina=document.createElement("td");
            const imgelimina=document.createElement("img");
            imgelimina.src="img/cestino.png";
            add.appendChild(imgadd);
            elimina.appendChild(imgelimina);
            tabella.appendChild(riga);
            riga.appendChild(nome);
            riga.appendChild(lega);
            riga.appendChild(add);
            riga.appendChild(elimina);   
            imgadd.addEventListener("click", addGiocatori);
            imgelimina.addEventListener("click", eliminaSquadra);
            imgadd.classList.add("pointer");
            imgelimina.classList.add("pointer");
            numSquadre=numSquadre+1;
        }
    }
    else
    {
    document.getElementById("risultato").classList.remove("hidden");
    }
}

function fetchResponse(response){
    if (!response.ok) {return null};
    return response.json();
}
const form=document.forms['search_content'];
form.addEventListener("submit", addSquadra);
fetch(route('carica_squadre')).then(fetchResponse).then(fetchSquadreJson);
let numSquadre=0;






