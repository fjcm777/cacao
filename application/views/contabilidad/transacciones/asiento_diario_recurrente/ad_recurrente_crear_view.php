<div class="container diario">
    <div class="row">
        <div class="span3 well ">
            <h4 class="fa fa-align-justify fa-lg col-lg-offset-5"> Asiento de Diario Recurrente</h4>
            <div class="row">
                <div class="col-md-4">Origen Asiento Diario</div>
                <div class="col-md-4 col-md-offset-3">Fecha de Creacion </div></br>
                <div class="col-md-4"><?= form_dropdown($idorigen_asiento_diario, $lista_origen_asiento_diario); ?></div></br>
                <div class="col-md-4 col-md-offset-3"  ><?php echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y'); ?></div>
                <input type="hidden" id="recoge_fecha" value="<?php echo date('Y-m-d') ;?>">
                <div class="col-md-4 ">Moneda de Transacción</div></br>
                
            </div>
            <div class="row">
                <div class="col-md-4" id="moneda"><?php echo form_dropdown('idmoneda', $idmoneda); ?></div></div>
            <div class="row">
                <div class="col-md-4">Tipo de Cambio</div></div>
            <div class="row">
                <div class="col-md-4" >
                    <input type="text" readonly id="tasa_cambio" value="1" class="tasa_cambio">
                    <input type="hidden" id="idtasa_cambio" name="idtasa_cambio" value="1">
                </div>
            </div>
            <!--///////////////////divs desordenados con proposito de insertar en db los datos///////////////////--> 
            <input id="valor_dolar" type="hidden" >
            <input id="usuario_creacion" type="hidden" value="cacao">
            <div class="row"> 
                <div class="col-md-4 col-lg-push-4">Descripción de Asiento</div>
            </div>
            <div class="col-md-4 col-md-offset-5"><textarea  placeholder="Descripcion del asiento de diario" id="descripcion_asiento_diario" class="textarea"></textarea></div></br></br></br>
            <div id="add-delete"><a class="btn btn-primary fa fa-plus fa-sm " role="button" id="agregar"></a></div>
            <!---------------------------------------transacciones de asietos de diario------------------------------------------------>        
            <table class="table-striped">
                <thead ><!---style="position: absolute;margin-bottom: 50px;"-->
                    <tr>
                        <th style="padding:15px 15px 15px 10px;">No.</th>
                        <th style="padding:15px 280px 15px 15px;">Cta Contable</th>
                        <th style="padding:15px 240px 15px 15px;">Descripción</th>
                        <th style="padding:15px 100px 15px 15px;">Débito</th>
                        <th style="padding:15px;">Crédito</th>
                    </tr>
                </thead>
            </table>
            <div style="overflow:auto;height: 200px;" class="valor">
                <table class="table table-striped" >
                    <!---------------------------------------elemento a clonar------------------------------------------------>
                    <tr id="clone" style="display: none" class="">
                <td><div class="numero_asiento"></div><input type="hidden" class="numero_transaccion" value=""></td>
                <td> 
                    <div class="input-group"style="width: 150px;" >
                        <input type="text" id="idcuenta_contable_" name="idcuenta_contable_" class="form-control buscar idcuenta_contable" readonly="readonly"  style="background:white;">
                        <span class="input-group-btn">
                            <button id="b_" class="btn btn-default buscar_cuenta" type="button"><i class="fa-search fa flg" ></i></button>
                        </span>
                    </div>
                </td>
                <td><input id="descripcion_cuenta_contable_" name='descripcion_cuenta_contable_' style="background:white;" readonly="readonly" maxlength=120 size=50 class='form-control' placeholder='Descripcion Cta. Contable'></td>
                <td><input id="balance_debito_" name ='balance_debito_'  type="text" value="" maxlength='14' size='10' class='form-control campo_debito' placeholder='0.0'></td>
                <td><input id="balance_credito_" name ='balance_credito_'  type="text" value="" maxlength='14' size='10' class='form-control campo_credito' placeholder='0.0'></td>
                
                <td><a class="btn btn-primary quitar fa fa-ban fa-sm" role="button" style="margin-left:5px;"></a></td>
            </tr> 
            <!--------------------------------------------------------------------------------------------------------->                
            
            <tbody id="campos_agregados">
                <tr id="1" class="asiento_diario_detalle agregado">
                    <td><div class="numero_asiento">1</div><input type="hidden" class="numero_transaccion" value="1"></td>
                    <td><div class="input-group"style="width: 150px;" >
                            <input type="text" id="idcuenta_contable_1" class="form-control buscar idcuenta_contable" readonly="readonly"  style="background:white;">
                            <span class="input-group-btn">
                                <button id="b_1" class="btn btn-default buscar_cuenta"  type="button"><i class="fa-search fa flg" ></i></button>
                            </span>
                        </div>
                    </td>

                    <td><input id="descripcion_cuenta_contable_1" name ='descripcion_cuenta_contable'  style="background:white;" readonly="readonly" maxlength=120 size=50 class='form-control' placeholder='Descripcion Cta. Contable'></td>
                    <td><input id="balance_debito_1" name ='balance_debito_0' type="text" value="" maxlength=14 size=10 class='form-control campo_debito' placeholder='0.0'></td>
                    <td><input id="balance_credito_1" name ='balance_credito_0' type="text" value="" maxlength=14 size=10 class='form-control campo_credito' placeholder='0.0'></td>
                    
                    <td><a class="btn btn-primary quitar fa fa-ban fa-sm" role="button" style="margin-left:5px;"></a></td>
                </tr>
                <tr id="2" class="asiento_diario_detalle agregado">
                    <td><div class="numero_asiento">2</div><input type="hidden" class="numero_transaccion" value="2"></td>
                    <td><div class="input-group"style="width: 150px;" >
                            <input type="text" id="idcuenta_contable_2" class="form-control buscar idcuenta_contable" readonly="readonly"  style="background:white;">
                            <span class="input-group-btn">
                                <button id="b_2" class="btn btn-default buscar_cuenta"  type="button"><i class="fa-search fa flg" ></i></button>
                            </span>
                        </div>
                    </td>

                    <td><input id="descripcion_cuenta_contable_2" name ='descripcion_cuenta_contable'  style="background:white;" readonly="readonly" maxlength=120 size=50 class='form-control' placeholder='Descripcion Cta. Contable'></td>
                    <td><input id="balance_debito_2" name ='balance_debito_1' type="text" value="" maxlength=14 size=10 class='form-control campo_debito' placeholder='0.0'></td>
                    <td><input id="balance_credito_2" name ='balance_credito_1' type="text" value="" maxlength=14 size=10 class='form-control campo_credito' placeholder='0.0'></td>
                   
                    <td><a class="btn btn-primary quitar fa fa-ban fa-sm" role="button" style="margin-left:5px;"></a></td>
                </tr>
            </tbody>
                </table>
            </div> 
            <div class="row divboton col-sm-pull-4"> 
                <div class="row col-md-offset-8">
                    <input id="total_debito" name ='total_debito' value="0.0" type="text" readonly class='col-lg-4 valorDC'>
                    <input id="total_credito" name ='total_credito' value="0.0" readonly class='col-lg-4  col-xs-push-1 valorDC'>
                </div>
                <div style="padding-left: 15px;"> 
                    <button class="btn btn-success btn-lg" id="guardar">Guardar</button>
                    <a href="<?php echo base_url(); ?>index.php/contabilidad/transacciones/asiento_diario_recurrente/asiento_diario_recurrente/index" class="btn btn-success btn-lg " role="button">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>