const form = document.querySelector('#search_content');
form.addEventListener('submit', search)

function search(event)
{
	
	event.preventDefault();
  
	const content = document.querySelector('#cerca').value;
  
	if(content) {
	    const text = encodeURIComponent(content);
		console.log('Eseguo ricerca elementi riguardanti: ' + text);
  
		rest_url= 'https://www.scorebat.com/video-api/v1/';
		fetch(rest_url).then(onResponse).then(onJson);
        
	}
	else {
		alert("Inserisci il testo per cui effettuare la ricerca");
	}
}
function onResponse(response)
{
	console.log('Risposta ricevuta');
 	return response.json();
}

function onJson(json){
	const highlight = document.querySelector('.highlights');
	highlight.innerHTML='';
	const content = document.querySelector('#cerca').value;
	console.log('JSON ricevuto');
	console.log(json);
	let a=0;
	if (json.status == 400) {
		const errore = document.createElement("h1"); 
		const messaggio = document.createTextNode(json.detail); 
		errore.appendChild(messaggio); 
		library.appendChild(errore);
		return
	  }
	for(let i=0;i<json.length;i++)
	{
		if(json[i].title.toLowerCase().includes(content.toLowerCase()))
	  	{
			const contenuto=document.createElement("div");
			const intestazione=document.createElement("span");
			const title=document.createElement("h1");
			title.textContent=json[i].title;
			title.dataset.textTitolo=json[i].title;
			const pref=document.createElement("img");
			pref.src="img/star.png";
			pref.classList.add("pointer");
			const img=document.createElement("img");
			img.src=json[i].thumbnail;
			const url=document.createElement("a");
			url.href=json[i].url;
			url.target="_blank";
			url.textContent="Clicca qui";
			intestazione.appendChild(title);
			intestazione.appendChild(pref);
			contenuto.appendChild(intestazione);
			contenuto.appendChild(img);
			contenuto.appendChild(url);
			highlight.appendChild(contenuto);
			a=1;
			document.getElementById("risultato").classList.add("hidden");
			pref.addEventListener("click", addPref);
		}
	}
	if(!a)
	  {
		document.getElementById("risultato").classList.remove("hidden");
	  }
}

function addPref(event){
	target=event.currentTarget;
	let titolo=target.parentNode.firstChild.dataset.textTitolo;
	let img=target.parentNode.nextSibling.src;
	let url=target.parentNode.nextSibling.nextSibling.href;
	fetch(route('add_pref',[titolo,encodeURIComponent(img),encodeURIComponent(url)])).then(onResponse).then(addPrefJson);
}
function addPrefJson(json){
	console.log(json);
	if(json[0].ok==false){
		alert("Questo highlights è già tra i tuoi preferiti");
	}else{
		if(json[0].ok=='not logged'){
			alert("Esegui l'accesso per poter aggiungere questo elemento ai tuoi preferiti");
		}else{
		alert("Highlights aggiunto tra i preferiti");
		}
	}
}