<div class="container">
    <div class="row">
        <div class="span3 well">
            <div class="navbar navbar-inner block-header">
                <h4 class="fa fa-pencil-square-o fa-lg col-lg-offset-5"> Editar datos Generales</h4></br>
                <?php
                echo form_open();
                echo form_hidden('idusuario', $idusuario);
                ?>
            </div>
            <form class="form-horizontal">
                <div class="alert alert-success valor" role="alert" style="width: 80%; margin-left:10%;">Datos Personales  
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-3"> 

                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $lista_por_id[0]['nombre'] ?>" placeholder="Nombre" autofocus></div>

                        <label class="col-md-2 control-label">Apellido</label>
                        <div class="col-md-3"> 
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $lista_por_id[0]['apellido'] ?>" placeholder="Apellido"></div>
                    </div>
                </div>
                <div class="alert alert-success valor" role="alert" style="width: 80%; margin-left:10%;">Datos de Usuario  
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Usuario</label>
                        <div class="col-md-3"> 
                            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $lista_por_id[0]['usuario'] ?>" placeholder="Usuario"></div>

                        <label class="col-md-2 control-label">Tipo Usuario</label>
                        <div class="col-md-2">

                            <input id="idtipo_usuario" class="tipo_usuario" name="idtipo_usuario"   type="hidden" value="<?php echo $lista_por_id[0]['tipo_usuario'] ?>">
                            <?= form_dropdown('idtipo_usuario', $idtipo_usuario); ?>
                        </div><br>
                        
                        <a href="#" type="hidden" class="btn btn-success" id="permiso">Permisos</a>


                    </div>

                </div> 
                <button type="submit" id="editar" class="btn btn-success fa fa-pencil-square-o fa-lg col-lg-offset-4">Editar</button>
                <a href="<?php echo base_url(); ?>index.php/administracion/usuario/usuario_procesar/index/1" class="btn btn-success fa fa-close fa-lg col-lg-offset-1">Cancelar</a>

            </form>
            <?= form_close(); ?>
            <?= validation_errors(); ?>


        </div>
    </div>
