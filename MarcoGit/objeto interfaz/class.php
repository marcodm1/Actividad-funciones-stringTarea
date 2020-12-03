<?php
    interface UserInterface { 
        public function setMenu( $menu_array );
        public function getContent($page);
    }

    // define clase que implementa la interface
    class WebApp implements UserInterface { 
        public function setMenu( $menu_array ){ 
            $elmenu="<table><tr>";
            foreach($menu_array as $k=> $v){ 
                $elmenu.="<td><a href='" . $menu_array[$k]['enlace'] . "'>" . $menu_array[$k]['etiqueta'] . "</a></td>"; 
                }
                $elmenu.="</tr></table>";
            return $elmenu;
    }

    public function getContent($page){ 
        $content = "<h1>Bienvenido a " . ucwords($page) . " </h1>"; return $content; }
    }

    // otra clase que implementa la interface si se usa includo es para implementar las interfaces de otros archivos
    class WebApp2 implements UserInterface { 
        public function setMenu($menu_array){
            $elmenu="<table><tr>";
            foreach($menu_array as $k=> $v){ 
                $elmenu.="<td><a href='" . $menu_array[$k]['enlace'] . "'>" . $menu_array[$k]['etiqueta'] . "</a></td>"; 
                }
                $elmenu.="</tr></table>";
            return $elmenu;
        }
        public function getContent($page){ 
            $content = date(‘d-m-Y’) . "<h3>$page</h3>"; return $content; 
        }
    }

    // ---------------------- proceso principal --------------------------
    // carga array con opciones de menu
    for ($i=1; $i<5; $i++){ 
        $menu[$i]['enlace'] = "enlace$i.php" ; $menu[$i]['etiqueta'] ="etiqueta$i" ; 
    }
    $miWeb = new WebApp; // creación y uso de objetos
    echo $miWeb->setMenu($menu);
    echo $miWeb->getContent('LA WEB');
?>
       

 