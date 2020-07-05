function toggleNewsBody(num) {
	let element = document.getElementsByClassName("news_body")[num];
	
	if(element.hidden == "") {
		element.hidden = "true";
	} else {
		element.hidden = "";
	}
}

function toggleButtonLabel(num) {
	let element = document.getElementsByClassName("show_buttons")[num];
	if(element.innerHTML == "Показать") {
		element.innerHTML = "Скрыть";
	} else {
		element.innerHTML = "Показать";
	}
}

window.onload = function() {
	let buttons = document.getElementsByClassName("show_buttons");

	for (let i = 0; i < buttons.length; ++i) {
		buttons[i].onclick = function() {
			toggleNewsBody(i);
			toggleButtonLabel(i);
		}
	}
}