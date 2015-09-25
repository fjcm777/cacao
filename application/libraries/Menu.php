<?php

class Menu {
    
 public function menu_usuario($menu_inicio,$submenu_transacciones,$submenu_catalogos,$submenu_operaciones,$submenu_gestion) {


       

        $menu = '';
       

        foreach ($menu_inicio as $mn) {
            $menu .=' <ul class="nav navbar-nav">';
            $menu .='<li class = "dropdown">';
            $menu .= '<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">' . $mn['descripcion'] . '<b class = "caret"></b></a>';
            $menu .= '<ul class = "dropdown-menu">';

            switch ($mn['nivel0']) {
                case '02':
                    foreach ($submenu_transacciones as $sm) {
                        if ($sm['descripcion'] == 'Divider') {
                           
                            $menu .= '<li class="divider"></li>';
                          
                        } else {
                            $menu .= '<li><a href = "' . $sm['enlace'] . '">' . $sm['descripcion'] . '</a></li>';
                        }
                    }
                    break;
                case '03':
                    foreach ($submenu_catalogos as $sm) {
                        if ($sm['descripcion'] == 'Divider') {
                            $menu .= '<li class="divider"></li>';
                        } else {
                            $menu .= '<li><a href = "' . $sm['enlace'] . '">' . $sm['descripcion'] . '</a></li>';
                        }
                    }
                    break;
                case '04':
                    foreach ($submenu_operaciones as $sm) {
                        if ($sm['descripcion'] == 'Divider') {
                            $menu .= '<li class="divider"></li>';
                        } else {
                            $menu .= '<li><a href = "' . $sm['enlace'] . '">' . $sm['descripcion'] . '</a></li>';
                        }
                    }
                    break;
                case '05':
                    foreach ($submenu_gestion as $sm) {
                        if ($sm['descripcion'] == 'Divider') {
                            $menu .= '<li class="divider"></li>';
                        } else {
                            $menu .= '<li><a href = "' . $sm['enlace'] . '">' . $sm['descripcion'] . '</a></li>';
                        }
                    }
                    break;
            }
            $menu .= '</ul>
    </li>
    </ul>';
        }
        return $menu;
   
    }

}
