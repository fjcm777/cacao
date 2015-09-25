var url1 = "http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/index/1";
var url2 = "http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/index/0";
var url_actual = window.location.href;
if (url_actual === url1) {
    var controlador = "usuario_listar";
} else if (url_actual === url2) {
    var controlador = "usuario_listar_inactivos";
}


function ocultar_boton_permisos() {
    var admin = $("#tipo_usuario").val();
    if (admin == 1) {
        $("#permiso").show();
    } else {
        $("#permiso").hide();
    }
}
;



function guardar_permisos_usuario() {
    var usuario = $("#usuario").val();
    $("input:checkbox:checked").each(function () {
        $.ajax({
            url: 'http://localhost/cacao/index.php/administracion/permisos/permisos/permisos',
            type: 'POST',
            data: "usuario=" + usuario + "&codigo_permiso=" + $(this).val(),
            success: function () {
                $("#permisos_usuario_administrador_crear").hide();
            },
            error: function () {
                $("#permisos_usuario_administrador_crear").hide();
                alert("error");
            }
        });
    });

}
;


$(document).on("ready", function () {
    $("#permiso").on("click", function () {
        var usuario = $("#usuario").val();
        
        if (usuario === '' || usuario.length === 0) {
            $("#permisos_usuario_administrador_crear").hide();
            alert("Llenar el campo usuario");
        } else {
            $("#permisos_usuario_administrador_crear").show();
        }
    });

    $("#cancelar").on("click", function () {
        $("#permisos_usuario_administrador_crear").hide();
    });

    $("#tipo_usuario").on("change", function () {
        ocultar_boton_permisos();
    });

    $("select[name='idtipo_usuario']").on("change", function () {
        ocultar_boton_permisos_editar();
    });

    $("#guardar").on("click", function () {
        guardar_permisos_usuario();
    });

});