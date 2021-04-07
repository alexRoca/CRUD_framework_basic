//$(window).ready(captura);
//no se coloca esto para que no se ejecute al cargar la pagina ni tampoco se condiciona q carge al presionar un boton sino
//q se carga al colocar en el form el atributo onsubmit el nombre de la funcion js ("captura()")

function captura() {
    
        $("#divActionForm").html(
        '<input type="hidden" name="actionForm" value="'+$('#pruebaJeje').attr('action')+'">'
        );/*esto codigo es para capturar atributo action del formulario y crear codigo html y colocarlo en la vista*/
    
}


