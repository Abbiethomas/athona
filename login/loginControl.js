var attempt = 4;

window.onload = function(){
	var store = localStorage.getItem("text");
	if(store){
		document.getElementById("userError").innerHTML = store;
	}
	localStorage.removeItem("text");
}