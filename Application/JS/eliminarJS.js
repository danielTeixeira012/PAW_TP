/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function results(data,id){
    alert(data);
    document.querySelector('tr[id="'+id+'"]').remove();
    
}

function eliminarAJAX() {  
    var id = this.parentNode.parentNode.getAttribute('id');
    $.get('../Application/Service/EliminarService.php', {idPrestador: id},
            function (data) {
                results(data,id);
            }
    );
}

function initEvents() {
    var x = document.getElementsByClassName('eliminar');
    var i = 0;
    for (i = 0; i < x.length; ++i) {
        x[i].addEventListener('click', eliminarAJAX);
    }
}

document.addEventListener('DOMContentLoaded', initEvents);