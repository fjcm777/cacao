<!DOCTYPE html>
<html>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/estilo.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/smoke.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/font-awesome-4.3.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/leaf.ico"> 
        <meta charset="UTF-8">
        <title><?php echo $titulo; ?></title>
    </head>
    <nav class="navbar navbar-fixed-top" role="navigation">
            <!-- El logotipo y el icono que despliega el menú se agrupan
                 para mostrarlos mejor en los dispositivos móviles -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <select id="modulo" class="navbar-brand" style="border: none; background: none">
                    <option value="1" selected>Contabilidad</option>
                    <option value="2">Administración</option>
                    <option value="3">Bancos</option>
                </select>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                    <li class=""><a href="contabilidad">Inicio</a></li>
                </ul>
    
                 <?php echo $menu;?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>&nbsp;&nbsp;<?= $this->session->userdata('user') ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/administracion/usuario/usuario/salir"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Salir</a></li>
                        </ul>
                    </li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </nav>

