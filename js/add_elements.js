

function addRadioButtonsRequest(element){

	documents

}

$(function(){
    $("#filter").click(function(){
        alert('clicked!');
    });
});

function loadDocument() {
	var codeHTML = document.innerHTML;
	var code = document.getElementById("products");
	var line1 = firstTagChild(code);
	var select = firstNamedChild(line1,"SELECT");
	//window.alert(line1);
	//window.alert(select);
	//loadProducts(select);
}

window.addEventListener("load", loadDocument);