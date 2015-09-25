
    function confirmar() {
        var res = confirm("¿Esta seguro que desea eliminar la configuracion de la empresa?. \n\ Se perdera las configuraciones de periodos fiscales y asientos de diario");
        if (res === true) {
            window.location.href = "http://localhost/cacao/index.php/administracion/configuracion_empresa/configuracion_empresa/eliminar_configuracion/";
        } else if (res === false) {
             window.location.href = "http://localhost/cacao/index.php/administracion/administracion";
        }

    }

$(document).ready(function () {
   
    $("#periodo_fiscal").datepicker();
      
    var valor_origen = $("#id_moneda").val();
    $("select[name=idmoneda]").find("option[value=" + valor_origen + "]").attr("selected", "selected");

    $("#eliminar_configuracion").on("click", function(){
        confirmar();
    });

});







