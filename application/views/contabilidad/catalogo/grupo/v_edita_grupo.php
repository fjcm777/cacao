<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span3 well">
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo base_url();?>index.php/contabilidad/catalogo/categoria/C_Categoria/leer/1" class="btn btn-success">Volver a lista de Cuentas</a>
                    </div>
                    <div class="block-content collapse in">
                        <?php 
                            echo form_open();
                            echo form_hidden('idgrupo_cuenta',$idgrupo);
                        ?>
                        
                        <table class="table table-striped table-bordered ">
                            <tr>
                                <th>Nombre del Grupo</th>
                                <th><?php echo form_input('grupo_cuenta',$lista_por_id[0]['grupo_cuenta']).validation_errors('grupo_cuenta');?></th>
                            </tr>
                            <tr>
                                <th>Nivel</th>
                                <th><?=form_dropdown('nivel',$nivel);?></th>
                            </tr>
                            <tr>
                                <th>Titulo superior</th>
                                <th><?=form_dropdown('nivel_anterior',$titulo_superior);?></th>
                            </tr>
                            <tr>
                                <th>Categoria</th>
                                <th><?=form_dropdown('idcategoria_cuenta',$categoria);?></th>
                            </tr>
                        </table>
                        
                        <?php 
                            echo form_submit('botonSubmit', '  Editar  ');
                            echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url();?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/ajax-select.js"></script>
    </body>
</html>