O PUEDO...
  

Juego de BlackJack en PHP CommandLine
 en: Abril 21, 2013, 09:59:50 pm
Hola a todos me inspire hoy en la tarde y me puse a programar el juego del BlackJack en php, es por consola, para ejecutar ya saben php blackjack.php,
espero qeu a alguien le sirva el codigo y como siempre ya saben miren, corrijan, dañen y vuelvan a arreglar y sobre todo COMPARTAN..!!...

se que puede mejorarse muchisimo mas pero la verdad es algo sencillo para seguir con la practica no es algo serio asi que no le meto tantas ganas jejejej, bueno aca una imagen y enseguida el codigo.



Código: PHP
<?php
 
/*
 * Juego de blackjack en consola
 * programado en php
 * 
 * @author The Bolivar Team
 */
class blackjack 
{
    private $mazo = array();
    protected $cartas_jug;
    protected $carta_lanzar;
    protected $jugador = array("cartas" => array(), "puntos_c" => array(), "puntos_p" => 0, "puntos_t" => 0);
    protected $tallador = array("cartas" => array(), "carta_1", "puntos_c" => array(), "puntos_p" => 0, "puntos_t" => 0);
 
 
    function __construct() {
        $this->iniciar();
    }
    
    private function iniciar() {
        $this->jugador = array("cartas" => array(), "puntos_c" => array(), "puntos_p" => 0, "puntos_t" => 0);
        $this->tallador = array("cartas" => array(), "carta_1", "puntos_c" => array(), "puntos_p" => 0, "puntos_t" => 0);
        $this->cargarCartas();
        
        $rand = rand(0, (count($this->mazo) - 1));
        $this->jugador['cartas'][] = $this->mazo[$rand];
        $this->jugador['puntos_c'][] = $this->puntos($this->mazo[$rand]);
        unset($this->mazo[$rand]);$this->barajar();
        
        $rand = rand(0, (count($this->mazo) - 1));
        $this->tallador['carta_1'] = $this->mazo[$rand];
        $this->tallador['puntos_c'][] = $this->puntos($this->mazo[$rand]);
        unset($this->mazo[$rand]);$this->barajar();
        
        $this->lanzarCarta('jugador');
        $this->lanzarCarta('tallador');
        
        $this->imprimir();
        $this->jugador();
    }
    
    private function lanzarCarta($player) {
        $rand = rand(0, (count($this->mazo) - 1));
        if($player == 'jugador')
        {
            $this->jugador['cartas'][] = $this->mazo[$rand];
            $this->jugador['puntos_c'][] = (int)($this->puntos($this->mazo[$rand]));
        }
        else if($player == 'tallador')
        {
            $this->tallador['cartas'][] = $this->mazo[$rand];
            $this->tallador['puntos_c'][] = (int)($this->puntos($this->mazo[$rand]));
        }
        
        $this->comprobar_ases($player);
        $this->comprobar($player);
        unset($this->mazo[$rand]); 
        
        $this->barajar();
    }
    
    private function comprobar_ases($player) {
        $ases = array();
        $puntos = 0;
        if($player == 'tallador')
        {
            $datos = $this->tallador['puntos_c'];
            
            foreach($datos as $key => $valor)
            {
                if($valor == 11)
                {
                    $ases[] = $key;
                }
                else
                {
                    $puntos += $valor;
                }
            }
            
            foreach ($ases as $pos) {
                if(($puntos + 11) > 21)
                {
                    $this->tallador['puntos_c'][$pos] = 1;
                    $puntos += 1;
                }
                else
                {
                    $this->tallador['puntos_c'][$pos] = 11;
                    $puntos += 11;
                }
            }
            $this->tallador['puntos_t'] = $puntos;
            $this->tallador['puntos_p'] = $puntos - $datos[0];
        }
        else if ($player == 'jugador')
        {
            $datos = $this->jugador['puntos_c'];
            
            foreach($datos as $key => $valor)
            {
                if($valor == 11)
                {
                    $ases[] = $key;
                }
                else
                {
                    $puntos += $valor;
                }
            }
            
            foreach ($ases as $pos) {
                if(($puntos + 11) > 21)
                {
                    $this->jugador['puntos_c'][$pos] = 1;
                    $puntos += 1;
                }
                else
                {
                    $this->jugador['puntos_c'][$pos] = 11;
                    $puntos += 11;
                }
            }
            $this->jugador['puntos_t'] = $puntos;
            $this->jugador['puntos_p'] = $puntos - $datos[0];
            //print_r($datos);die();
        }
    }
    
    private function comprobar($player) {
        if($player == 'tallador')
        {
            if($this->tallador['puntos_t'] > 21)
            {
                $this->fin('jugador');
            }
        }
        else if ($player == 'jugador')
        {
            if($this->jugador['puntos_t'] > 21)
            {
                $this->fin('tallador');
            }
        }
        else
        {
           $this->fin();
        }
    }
 
    private function fin($jug = '') {
        print "\n\n+============================FIN DEL JUEGO=====================================+\n";
        print '';
        print "[[ JUGADOR ]]\n";
        print 'Cartas : ' . implode(', ', $this->jugador['cartas']) . "\n";
        print 'Puntos totales : ' . $this->jugador['puntos_t'] . "\n";
 
        print "\n";
        print "[[ TALLADOR ]]\n";
        print 'Cartas : ' . $this->tallador['carta_1'] . ', ' . implode(', ', $this->tallador['cartas']) . "\n";
        print 'Puntos del tallador : ' . $this->tallador['puntos_t'] . "\n";
        
        if($jug != '')
        {
            if($jug == 'tallador')
            {
                 print "\n[TALLADOR] GANA..!! Intenta de nuevo";
            }
            else
            {
                print "\n[JUGADOR] GANA..!! Felicidades..!!";
            }
        }
        else if($this->tallador['puntos_t'] > $this->jugador['puntos_t'] && $this->tallador['puntos_t'] <= 21)
        {
            print "\n[TALLADOR] GANA..!! Intenta de nuevo";
        }
        else if($this->tallador['puntos_t'] < $this->jugador['puntos_t'] && $this->jugador['puntos_t'] <= 21)
        {
            print "\n[JUGADOR] GANA..!! Felicidades..!!";
        }
        else if($this->tallador['puntos_t'] == $this->jugador['puntos_t'] && $this->tallador['puntos_t'] == 21)
        {
            if(count($this->tallador['cartas']) == 1)
            {
                print "\n[TALLADOR] GANA..!! Intenta de nuevo";
            }
            else if($this->jugador['cartas'])
            {
                print "\n[JUGADOR] GANA..!! Felicidades..!!";
            }
        }
        else
        {
            print "\n[JUGADOR] GANA..!! Felicidades..!!";
        }
        
        print "\n\nby bssanchez (kid_goth), cbriceno -> The Bolivar Team";
        die();
    }
 
    private function puntos($carta)
    {
        $puntos = 0;
        $carta = explode("_", $carta);
        $carta = $carta[0];
        
        switch ($carta) {
            case "K":
            case "Q":
            case "J":
                $puntos = 10;
                break;
            case "A":
                $puntos = 11;
                break;
            default:
                $puntos = (int)$carta;
                break;
        }
        
        return $puntos;
    }
 
 
    private function jugador() {
        do
        {
            if (PHP_OS == 'WINNT') {
                print 'Otra [S/N]? [S]: ';
                $otra = stream_get_line(STDIN, 1);
            }
            else
            {
                $otra = readline('Otra [S/N]? [S]: ');
            }
            $otra = strtolower($otra);
            
            if($otra == 's')
            {
                $this->lanzarCarta('jugador');
                print "\n\n+==============================================================================+\n";
                print '';
                print "[[ JUGADOR ]]\n";
                print 'Cartas : ' . implode(', ', $this->jugador['cartas']) . "\n";
                print 'Puntos vistos por el tallador : ' . $this->jugador['puntos_p'] . "\n";
                print 'Puntos totales : ' . $this->jugador['puntos_t'] . "\n";
 
                print "\n";
                print "[[ TALLADOR ]]\n";
                print 'Cartas : [?_/_?], ' . implode(', ', $this->tallador['cartas']) . "\n";
                print 'Puntos del tallador : ' . $this->tallador['puntos_p'] . "\n";
            }
        }while($otra != "n");
        
        $this->tallador();
    }
    
    private function tallador()
    {
        while(true)
        {
            if($this->tallador['puntos_t'] == 21)
            {
                break;
            }
            else if($this->tallador['puntos_t'] < $this->jugador['puntos_p'] || $this->tallador['puntos_t'] <= 13)
            {
                $this->lanzarCarta('tallador');
            }
            else if($this->tallador['puntos_t'] >= 16 && $this->tallador['puntos_t'] <= 18)
            {
                $rand = rand(0,1);
                if($rand)
                {
                    $this->lanzarCarta('tallador');
                    print "\n\n+==============================================================================+\n";
                    print '';
                    print "[[ JUGADOR ]]\n";
                    print 'Cartas : ' . implode(', ', $this->jugador['cartas']) . "\n";
                    print 'Puntos vistos por el tallador : ' . $this->jugador['puntos_p'] . "\n";
                    print 'Puntos totales : ' . $this->jugador['puntos_t'] . "\n";
 
                    print "\n";
                    print "[[ TALLADOR ]]\n";
                    print 'Cartas : [?_/_?], ' . implode(', ', $this->tallador['cartas']) . "\n";
                    print 'Puntos del tallador : ' . $this->tallador['puntos_p'] . "\n";
                }
                break;
            }
            else
            {
                $rand = rand(0,1);
                if($rand)
                {
                    $this->lanzarCarta('tallador');
                    print "\n\n+==============================================================================+\n";
                    print '';
                    print "[[ JUGADOR ]]\n";
                    print 'Cartas : ' . implode(', ', $this->jugador['cartas']) . "\n";
                    print 'Puntos vistos por el tallador : ' . $this->jugador['puntos_p'] . "\n";
                    print 'Puntos totales : ' . $this->jugador['puntos_t'] . "\n";
 
                    print "\n";
                    print "[[ TALLADOR ]]\n";
                    print 'Cartas : [?_/_?], ' . implode(', ', $this->tallador['cartas']) . "\n";
                    print 'Puntos del tallador : ' . $this->tallador['puntos_p'] . "\n";
                }
                else
                {
                    break;
                }
            }
            
            $this->comprobar('fin');
        }        
    }
 
 
    private function barajar()
    {
        $nuevas_cartas = array();
        
        foreach ($this->mazo as $value) {
            $nuevas_cartas[] = $value;
        }
        
        $this->mazo = $nuevas_cartas;
    }
 
 
    private function cargarCartas() {
        
        $mazo = array();
        
        for ($i = 1; $i <= 13; $i++)
        {
            switch ($i)
            {
                case 1:
                    $carta = "A";
                    break;
                case 11:
                    $carta = "J";
                    break;
                case 12:
                    $carta = "Q";
                    break;
                case 13:
                    $carta = "K";
                    break;
                default :
                    $carta = $i;
                    break;
            }
            $cartas = array("C" => $carta, "P" => $carta, "D" => $carta, "T" => $carta);
            
            array_push($mazo, $cartas);
        }
        
        foreach ($mazo as $num => $array) {
            foreach ($array as $key => $value) {
                $this->mazo[] = $value . "_/_" . $key;
            }
        }
    }
    
    private function imprimir()
    {
        print "+==============================================================================+";
        print "|                                                        |                     |";
        print "|       BBBBBB    LL          A        CCCCC  KK    KK   |  BOLIVAR TEAM       |";
        print "|       B     B   LL         A A      C       KK   KK    |  2013               |";
        print "|       B    B    LL        A   A    C        KK  KK     |                     |";
        print "|       B  BBB    LL       AAAAAAA   C        KKKKK      |  ENJOY IT           |";
        print "|       B     B   LL       A     A   C        KK  KK     |                     |";
        print "|       B    B    LL       A     A    C       KK   KK    |                     |";
        print "|       BBBBB     LLLLLL  AA     AA    CCCCC  KK    KKK  |                     |";
        print "|                                                        |  JACK V 1.0         |";
        print "+===============================Mesa de Juego==================================+\n";
        print '';
        print "[[ JUGADOR ]]\n";
        print 'Cartas : ' . implode(', ', $this->jugador['cartas']) . "\n";
        print 'Puntos vistos por el tallador : ' . $this->jugador['puntos_p'] . "\n";
        print 'Puntos totales : ' . $this->jugador['puntos_t'] . "\n";
        
        print "\n";
        print "[[ TALLADOR ]]\n";
        print 'Cartas : [?_/_?], ' . implode(', ', $this->tallador['cartas']) . "\n";
        print 'Puntos del tallador : ' . $this->tallador['puntos_p'] . "\n";
    }
}
 
/**
 * Controlador 
 */
 
new blackjack();
?>