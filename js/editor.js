//complete cod for js/editor.js
function init(){
	var editorForm = document.querySelector("form#editor");
	editorForm.addEventListener("submit",checkTitle,false);
	
	console.log('your browser understands DOMContentLoaded');
}

function checkTitle(event){
	var title = document.querySelector("input[name='title']");
	var warning = document.querySelector("p#title-warning");
	//if title is empty....
	if(title.value === ""){
		//preventDefault, ie don't submit the form
		event.preventDefault();
		//display a warning
		warning.innerHTML = "*You umust write a title for the entry";
	}
}

document.addEventListener("DOMContentLoaded",init,false);

