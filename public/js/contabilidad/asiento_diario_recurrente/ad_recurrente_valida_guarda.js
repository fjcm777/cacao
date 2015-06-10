
function guardar_asiento_diario_recurrente() {

    var idorigen_asiento_diario = $("select#idorigen_asiento_diario").val();
    var descripcion_asiento_diario = $("#descripcion_asiento_diario").val();
    var numero_asiento_diario = $("#numero_asiento_diario").val();
    var usuario_creacion = $("#usuario_creacion").val();
    var balance_credito = $("#total_credito").val();
    var balance_debito = $("#total_debito").val();
    var fecha_creacion = $("#recoge_fecha").val();
    var idtasa_cambio = $("#idtasa_cambio").val();

    var tasa_cambio = $("#tasa_cambio").val();
    var transacciones = validar_transacciones();
    var origen_asiento_diario = $("select#idorigen_asiento_diario").find("option[value=" + idorigen_asiento_diario + "]").text();

    if (descripcion_asiento_diario == null || descripcion_asiento_diario.length == 0) {
        alert('Es necesario el campo de descripcion');
    }
    else if (fecha_creacion == null || fecha_creacion.length == 0) {
        alert('Es necesario el campo de Fecha Creacion');
    }
    else if (tasa_cambio === "ND" || tasa_cambio.length == 0) {
        alert('El tipo de cambio no es valido');
        comfirmar_tasa();

    }
    else if (transacciones[0] > 0 && transacciones[1] === 0) {
        alert("Usted tiene " + transacciones[0] + " transaccion sin monto:\n\-Debe establecer los montos con cualquier numero mayor a cero.");

    }
    else if (transacciones[1] > 0 && transacciones[0] === 0) {
        alert("Usted tiene " + transacciones[1] + " transacciones sin cuentas seleccionadas:\n\-Debe seleccionar una cuenta para cada transaccion.");

    }
    else if (transacciones[1] > 0 && transacciones[0] > 0) {
        alert("Usted tiene " + transacciones[1] + " transacciones sin cuentas seleccionadas:\n\-Debe seleccionar una cuenta para cada transaccion." +
                "\n\ \n\Usted tiene " + transacciones[0] + " transaccion sin monto:\n\-Debe establecer los montos con cualquier numero mayor a cero.");

    }
    else if (balance_credito !== balance_debito) {
        alert("Usted debe balancear el asiento para poder guardarlo");

    } else if ($("#valor_dolar").val() === "0") {
        alert("No se a encontrado tipo de cambio extranjero asociado a esta fecha fiscal");

    }
    else if (transacciones[0] === 0 && transacciones[1] === 0) {

        $.ajax({
            url: 'http://localhost/cacao/index.php/contabilidad/transacciones/asiento_diario_recurrente/asiento_diario_recurrente/ad_recurrente_guardar',
            type: 'POST',
            data: "idorigen_asiento_diario=" + idorigen_asiento_diario + "&descripcion_asiento_diario=" + descripcion_asiento_diario +
                    "&idtasa_cambio=" + idtasa_cambio + "&balance_debito=" + balance_debito + "&balance_credito=" + balance_credito + 
                    "&usuario_creacion="+ usuario_creacion + "&fecha_creacion=" + fecha_creacion,
                   
            success: function (data) {
                guardar_transacciones(data);

            },
            error: function () {
                alert('Error al crear Asiento Diario');
            }

        });
    }
    ;
}

function validar_transacciones() {
    var montos_vacios = 0;
    var idcuenta_contable_not = 0;

    $(".asiento_diario_detalle").each(function () {

        var debito = $(this).find(".campo_debito").val();
        var credito = $(this).find(".campo_credito").val();
        var idcuenta_contable = $(this).find(".idcuenta_contable").val();


        if (debito === "" || credito === "") {
            montos_vacios++;
        }
        else if (idcuenta_contable === "") {
            idcuenta_contable_not++;

        } else if (debito == 0 && credito == 0) {
            montos_vacios++;
        }

    });
    var campos_vacios = [montos_vacios, idcuenta_contable_not];
    return campos_vacios;
}



function guardar_transacciones(idasiento_diario_creado) {
    var numero_transacciones_totales = $(".numero_transaccion:last").val();

    $(".asiento_diario_detalle").each(function () {
        var idasiento_diario = idasiento_diario_creado;

        var numero_transacciones = $(this).find(".numero_transaccion").val();
        var idcuenta_contable = $(this).find(".idcuenta_contable").val();

        var debito = $(this).find(".campo_debito").val();
        var credito = $(this).find(".campo_credito").val();

        var idmoneda = $("#moneda>select").val();

        if (debito === "0.0" && credito !== "0.0") {
            var tipo_transaccion = "c";

            var monto = credito;

        } else if (debito !== "0.0" && credito === "0.0") {
            var tipo_transaccion = "d";

            var monto = debito;

        }

        var valor_dolar = $("#valor_dolar").val();

        if (idmoneda === "1") {
            var monto_moneda_nacional = monto;
            var monto_moneda_extranjera = monto / valor_dolar;

        } else if (idmoneda === "2") {
            var monto_moneda_nacional = monto * valor_dolar;
            var monto_moneda_extranjera = monto;
        }

        $.ajax({
            url: "http://localhost/cacao/index.php/contabilidad/transacciones/asiento_diario_recurrente/asiento_diario_recurrente/ad_detalle_recurrente_guardar",
            type: "post",
            data: "idasiento_diario=" + idasiento_diario + "&numero_transacciones=" + numero_transacciones + "&idcuenta_contable=" + idcuenta_contable + "&tipo_transaccion=" + tipo_transaccion + "&monto_moneda_nacional=" + monto_moneda_nacional + "&monto_moneda_extranjera=" + monto_moneda_extranjera,
            success: function () {
                if (numero_transacciones_totales === numero_transacciones) {
                    alert("Asiento de Diario creado con exito");
                    location.reload(true);
                }
            },
            error: function () {
                alert("Error en el proceso de guradado de transacciones");
            }
        });
    });
}

function comfirmar_tasa() {
    var res = confirm("¿Desea introducir tasa de cambio?");
    if (res === true) {
        $("#intro_tasa_cambio").fadeIn("fast");
    } else if (res === false) {
        return 0;
    }

}



$(document).ready(function () {

    $("#guardar").on("click", function () {

        guardar_asiento_diario_recurrente();

    });



});