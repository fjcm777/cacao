var url1 = "http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/index/1";
var url2 = "http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/index/0";
var url_actual = window.location.href;
if (url_actual === url1) {
    var controlador = "usuario_listar";
} else if (url_actual === url2) {
    var controlador = "usuario_listar_inactivos";
}


function valor_edicion_usuario() {
    var tipo_usuario = $("#idtipo_usuario").val();

    if (tipo_usuario !== "") {
        $("select[name=idtipo_usuario] option").each(function () {
            var text_option = $(this).text();
            if (text_option === tipo_usuario) {
                $(this).attr("selected", "selected");
            }
        });
    }
}

function mostrar_permiso() {
    $("#permisos_usuario_administrador").show();
}
;

function ocultar_boton_permisos_editar() {
    var admin = $("select[name='idtipo_usuario']").val();
    if (admin == 1) {
        $("#permiso").show();
    } else {
        $("#permiso").hide();
    }
}
;


function permiso_asignar_valores() {
    var usuario = $("#usuario").val();

    $.ajax({
        url: 'http://localhost/cacao/index.php/administracion/permisos/permisos/mostrar_permisos',
        type: 'POST',
        data: "usuario=" + usuario,
        success: function (data) {

            var dividido = data.split(",");
            for (x = 0; x < dividido.length - 1; x++) {

                var valor = dividido[x];
                $("input.permiso").each(function () {

                    var text_option = $(this).val();

                    if (text_option === valor) {
                        $(this).attr("checked", true).attr("class", 'activo');
                    }
                });
            }
        }

    });
}

function inactivar(){
    var usuario = $("#usuario").val();
     $("input.activo").each(function () {
         if($(this).prop("checked") === false){
                $.ajax({
            url: 'http://localhost/cacao/index.php/administracion/permisos/permisos/inactivar_permiso',
            type: 'POST',
            data: "usuario=" + usuario + "&codigo_permiso=" + $(this).val(),
            success: function () {
                 $("#permisos_usuario_administrador").hide();
                },
            error: function () {
                 $("#permisos_usuario_administrador").hide();
                 alert("error");
            }
        });
         }
//     
    });
}

function edita_guarda() {
    var usuario = $("#usuario").val();
 $("input:checkbox:checked").each(function () {
        $.ajax({
            url: 'http://localhost/cacao/index.php/administracion/permisos/permisos/editar_permisos',
            type: 'POST',
            data: "usuario=" + usuario + "&codigo_permiso=" + $(this).val(),
            success: function () {
                 $("#permisos_usuario_administrador").hide();
                },
            error: function () {
                 $("#permisos_usuario_administrador").hide();
                 alert("error");
            }
        });
    });


       
};

function prueba_guardar(){
     $("input:checkbox:checked").each(function () {
        alert('lo voy a guardar');
    });
}

$(document).on("ready", function () {

    $.ajax({
        url: 'http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/' + controlador,
        type: 'POST',
        success: function (data) {
            $("#resultado").html(data);
        }

    });

    function confirmar(val) {
        var res = confirm("¿Esta seguro que desea desactivar este usuario?");
        if (res === true) {
            window.location.href = "http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/usuario_cambiar_estado/" + val + "/0";
        } else if (res === false) {
            return 0;
        }

    }
    ;

    function busqueda(campo, valor) {

        $.ajax({
            url: "http://localhost/cacao/index.php/administracion/usuario/usuario_procesar/usuario_buscar",
            type: "post",
            data: "valor=" + valor + "&campo=" + campo,
            success: function (data) {
                $("#resultado").html(data);
            }
        });
    }

    function validar_busqueda() {

        var valor = $('#valor').val();
        var campo = $('#campo').val();

        if ((!isNaN(valor) || valor === "") && campo === "idusuario") {
            busqueda(campo, valor);

        } else if ((isNaN(valor) || valor === "") && (campo === "nombre" || campo === "apellido" || campo === "usuario")) {
            busqueda(campo, valor);
        }
    }

    $("#permiso").on("click", function () {
        mostrar_permiso();
    });

    $("#cancelar").on("click", function () {
        $("#permisos_usuario_administrador").hide();
    });

    $("#editar_usuario").on("click", function () {
        edita_guarda();
        inactivar();
    });

    $("select[name='idtipo_usuario']").on("change", function () {
        ocultar_boton_permisos_editar();
    });

    $("#buscar").on('click', function () {
        validar_busqueda();
    });

    $("#valor").on('keyup', function () {
        validar_busqueda();
    });

    $("#campo").on('change', function () {
        validar_busqueda();
    });

    $("#resultado").on('click', ".inactivar", function () {
        confirmar($(this).attr("value"));
    });

    valor_edicion_usuario();

    permiso_asignar_valores();




});

