var ofertas = [];
function guardar(){
    var oferta = document.getElementById('categoria').value;
    
    
    alert(oferta);
    
}


function initEvents() {  
    document.getElementById('guardarTemp').addEventListener('click', guardar);



}

document.addEventListener('DOMContentLoaded', initEvents);
