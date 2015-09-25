<?= form_open('administracion/permisos/permisos'); ?>
<div class="overlay-container container-fluid" style="display: none; font-size:14px;" id="permisos_usuario_administrador_crear"> 
    <div class="container-fluid poppermiso valor" style="margin: 90px;">
        <div class="span3 well">
            <h4 class="col-lg-offset-5"> Configuración de Permisos</h4><br><br> 
            <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Permisos Modulo Contabilidad
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <!--  INPUTS NECESARIOS PARA LOS PROCESOS -->
                            <form class="form-horizontal" role="form"><br>
                                <div class="row">
                                   <?php 
                                  $i = 0;
                                   foreach ($campos_contabilidad as $c){   ?>
                                       <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input type="checkbox" id="" value="<?php echo $campos_contabilidad[$i]['codigo_menu'] ?>" aria-label="...">
                                                </span>
                                                <label class="form-control-2"><?php echo $campos_contabilidad[$i]['descripcion'] ?></label>
                                            </div><br><!-- /input-group -->
                                        </div><!-- /.col-lg-4 -->
                                        
                                  <?php $i++; } ?>
                                   
                                    </form>
                                </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Permisos Modulo Bancos
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <!--  INPUTS NECESARIOS PARA LOS PROCESOS -->
                                <form class="form-horizontal" role="form"><br>
                                  <div class="row">
                                   <?php 
                                  $i = 0;
                                   foreach ($campos_banco as $c){   ?>
                                       <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input type="checkbox" id="" value="<?php echo $campos_banco[$i]['codigo_menu'] ?>" aria-label="...">
                                                </span>
                                                <label class="form-control-2"><?php echo $campos_banco[$i]['descripcion'] ?></label>
                                            </div><br><!-- /input-group -->
                                        </div><!-- /.col-lg-4 -->
                                        
                                  <?php $i++; } ?>
                                   
                                    </form>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-lg-offset-4"> 
                    <button type="button" id="guardar" class="btn btn-success fa fa-save fa-lg col-lg-offset-4"> Guardar</button>
                    <a class="btn btn-success fa fa-close fa-lg col-lg-offset-1" id="cancelar">Cancelar</a>        
                </div>
                <?= form_close(); ?>
                <?= validation_errors(); ?>
            </div>
        </div>
    </div>