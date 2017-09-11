(function(){

	
})();

function ValidateDelete() {
	this.event.preventDefault();
	if(confirm('Desea eliminar esta empresa?'))
		document.getElementById('formDelete').submit()
}