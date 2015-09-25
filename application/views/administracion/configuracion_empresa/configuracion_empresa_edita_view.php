<input type="hidden" id="id_moneda" name="idmoneda" value="<?php echo $lista_por_id[0]['idmoneda'] ?>">


<?= form_open('administracion/configuracion_empresa/configuracion_empresa/edita_configuracion_empresa/'); ?>

<div class="container">
    <div class="row">
        <div class="span3 well">
            <div class="navbar navbar-inner block-header">
                <h4 class="fa fa-pencil-square-o fa-lg col-lg-offset-5"> Configuracion de Empresa</h4></br>
            </div>
            <form class="form-horizontal">
                 
                <div class="alert alert-success valor" role="alert" style="width: 80%; margin-left:10%;"> Datos de Empresa
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-6"> 
                            <input type="text" class="form-control" value="<?php echo $lista_por_id[0]['nombre_empresa'] ?>" autocomplete="off" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre" autofocus></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Direccion</label>
                        <div class="col-md-6"> 
                            <input type="text" class="form-control" value="<?php echo $lista_por_id[0]['direccion'] ?>" autocomplete="off" id="direccion" name="direccion" placeholder="Direccion"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Telefono</label>
                        <div class="col-md-2"> 
                            <input type="text" class="form-control" value="<?php echo $lista_por_id[0]['telefono'] ?>" id="telefono" autocomplete="off" name="telefono" placeholder="Telefono"></div>
                    </div>
                </div>
                <div class="alert alert-success valor" role="alert" style="width: 80%; margin-left:10%;"> Datos de Moneda
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Nº R.U.C.</label>
                        <div class="col-md-2"> 
                            <input type="text" class="form-control" value="<?php echo $lista_por_id[0]['ruc'] ?>" id="ruc" name="ruc" autocomplete="off" placeholder="R.U.C."></div>

                        <label class="col-md-2 control-label">Moneda</label>
                        <div class="col-md-2"> 
                            <?php echo form_dropdown('idmoneda', $idmoneda); ?></div>
                        
                        <label class="col-md-2 control-label">Fecha Fiscal</label>
                   <input type="text" class="col-md-2 form-group" id="periodo_fiscal" name="periodo_fiscal" value="<?php echo $lista_por_id[0]['periodo_fiscal'] ?>" autocomplete="off" placeholder="Fecha Fiscal"></div>
                   
                </div>

                <div class="alert alert-success valor" role="alert" style="width: 80%; margin-left:10%;"> Datos de Region
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Pais</label>
                        <div class="col-md-2"> 
                            <input type="text" class="form-control" value="<?php echo $lista_por_id[0]['pais'] ?>" autocomplete="off" id="pais" name="pais" placeholder="Pais"></div>

                        <label class="col-md-2 control-label">Ciudad</label>
                        <div class="col-md-2"> 
                            <input type="text" class="form-control" value="<?php echo $lista_por_id[0]['ciudad'] ?>" autocomplete="off" id="ciudad" name="ciudad" placeholder="Ciudad"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success fa fa-save fa-lg col-lg-offset-4 guardar"> Editar</button>
                <a href="<?php echo base_url(); ?>index.php/administracion/administracion" class="btn btn-success fa fa-close fa-lg col-lg-offset-1" id="botones">Cancelar</a>
                <a class="btn btn-success fa fa-close fa-lg col-lg-offset-1" id="eliminar_configuracion">Eliminar</a>
            </form>
            <?= form_close(); ?>
            <?= validation_errors(); ?>

        </div>
    </div>
</div>
