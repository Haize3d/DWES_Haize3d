<?php
    if(isset($_REQUEST["categoria"]))
    {
        $categoria = $_REQUEST["categoria"];
        if($categoria == "F4")
        {
            $F4->otorgarPuntos($posicionParrilla, $vueltaRapida);
        }else if($categoria == "F3")
        {
            $F3->otorgarPuntos($posicionParrilla, $vueltaRapida);
        }else if($categoria == "F2")
        {
            $F2->otorgarPuntos($posicionParrilla, $vueltaRapida);
        }else if($categoria == "F1")
        {
            $F1->otorgarPuntos($posicionParrilla, $vueltaRapida);
        }else if($categoria == "FA")
        {
            $FAcademy->otorgarPuntos($posicionParrilla, $vueltaRapida);
        }
    }



    abstract class Monoplaza
    {
        public $nombre_piloto;
        public $nacionalidad;
        public $escuderia;
        public $puntos;
        //public $categoria;

    }

    class F4 extends Monoplaza
    {
        public $pais_categoria;

        function posicionValida($posicion_parrilla)
        {
            $valida = false;
            if($posicion_parrilla > 0 && $posicion_parrilla <= 30)
            {
                $valida = true;
            }

            return $valida;
        }

        function otorgarPuntos($posicion_parrilla, $vuelta_rapida)
        {
            if($this->posicionValida($posicion_parrilla))
            {
                switch($posicion_parrilla)
                {
                    case 1:
                        $this->puntos += 25;
                        break;
                    case 2:
                        $this->puntos += 18;
                        break;
                    case 3:
                        $this->puntos += 15;
                        break;
                    case 4:
                        $this->puntos += 12;
                        break;
                    case 5:
                        $this->puntos += 10;
                        break;
                    case 6:
                        $this->puntos += 8;
                        break;
                    case 7:
                        $this->puntos += 6;
                        break;
                    case 8:
                        $this->puntos += 4;
                        break;
                    case 9:
                        $this->puntos += 2;
                        break;
                    case 10:
                        $this->puntos += 1;
                        break;
                    default:
                        break;
                }
                $this->subirCategoria();
            }
        }

        public function subirCategoria() //https://es.wikipedia.org/wiki/Superlicencia_de_la_FIA
        {
            if($this->puntos >= 40)
            {
                $subido_f3 = new F3();
            }
        }
    }

    class F3 extends Monoplaza
    {
        public $nombre_academia;

        public function posicionValida($posicion_parrilla)
        {
            $valida = false;
            if($posicion_parrilla > 0 && $posicion_parrilla <= 30)
            {
                $valida = true;
            }

            return $valida;
        }

        public function otorgarPuntos($posicion_parrilla, $vuelta_rapida)
        {
            if($this->posicionValida($posicion_parrilla))
            {
                switch($posicion_parrilla)
                {
                    case 1:
                        $this->puntos += 10;
                        break;
                    case 2:
                        $this->puntos += 8;
                        break;
                    case 3:
                        $this->puntos += 7;
                        break;
                    case 4:
                        $this->puntos += 6;
                        break;
                    case 5:
                        $this->puntos += 5;
                        break;
                    case 6:
                        $this->puntos += 4;
                        break;
                    case 7:
                        $this->puntos += 3;
                        break;
                    case 8:
                        $this->puntos += 2;
                        break;
                    case 9:
                        $this->puntos += 1;
                        break;
                    default:
                        break;
                }
                $this->subirCategoria();
            }
        }

        public function subirCategoria() //https://es.wikipedia.org/wiki/Superlicencia_de_la_FIA
        {
            if($this->puntos >= 40)
            {
                $subido_f2 = new F2();
            }
        }
    }

    class F2 extends Monoplaza
    {
        public $pts_superlicencia;

        public function posicionValida($posicion_parrilla)
        {
            $valida = false;
            if($posicion_parrilla > 0 && $posicion_parrilla <= 24)
            {
                $valida = true;
            }

            return $valida;
        }

        public function otorgarPuntos($posicion_parrilla, $vuelta_rapida)
        {
            if($this->posicionValida($posicion_parrilla))
            {
                if($vuelta_rapida && $posicion_parrilla <= 10)
                {
                    $this->puntos++;
                }

                switch($posicion_parrilla)
                {
                    case 1:
                        $this->puntos += 10;
                        break;
                    case 2:
                        $this->puntos += 8;
                        break;
                    case 3:
                        $this->puntos += 7;
                        break;
                    case 4:
                        $this->puntos += 6;
                        break;
                    case 5:
                        $this->puntos += 5;
                        break;
                    case 6:
                        $this->puntos += 4;
                        break;
                    case 7:
                        $this->puntos += 3;
                        break;
                    case 8:
                        $this->puntos += 2;
                        break;
                    case 9:
                        $this->puntos += 1;
                        break;
                    default:
                        break;
                }
                $this->subirCategoria();
            }
        }

        public function subirCategoria() //https://es.wikipedia.org/wiki/Superlicencia_de_la_FIA
        {
            if($this->puntos >= 40)
            {
                $subido_f1 = new F1();
            }
        }
    }

    class F1 extends Monoplaza
    {
        public $nombre_patrocinador;

        public function posicionValida($posicion_parrilla)
        {
            $valida = false;
            if($posicion_parrilla > 0 && $posicion_parrilla <= 22)
            {
                $valida = true;
            }

            return $valida;
        }

        public function otorgarPuntos($posicion_parrilla, $vuelta_rapida)
        {
            if($this->posicionValida($posicion_parrilla))
            {
                if($vuelta_rapida && $posicion_parrilla <= 10)
                {
                    $this->puntos++;
                }

                switch($posicion_parrilla)
                {
                    case 1:
                        $this->puntos += 25;
                        break;
                    case 2:
                        $this->puntos += 18;
                        break;
                    case 3:
                        $this->puntos += 15;
                        break;
                    case 4:
                        $this->puntos += 12;
                        break;
                    case 5:
                        $this->puntos += 10;
                        break;
                    case 6:
                        $this->puntos += 8;
                        break;
                    case 7:
                        $this->puntos += 6;
                        break;
                    case 8:
                        $this->puntos += 4;
                        break;
                    case 9:
                        $this->puntos += 2;
                        break;
                    case 10:
                        $this->puntos += 1;
                        break;
                    default:
                        break;
                }
                $this->subirCategoria();
            }
        }

        public function subirCategoria() //https://es.wikipedia.org/wiki/Superlicencia_de_la_FIA
        {
            if($this->puntos >= 40)
            {
                $subido_facademy = new FAcademy();
            }
        }
    }

    class FAcademy extends Monoplaza
    {
        public $potencia; //(CV)

        public function posicionValida($posicion_parrilla)
        {
            $valida = false;
            if($posicion_parrilla > 0 && $posicion_parrilla <= 18)
            {
                $valida = true;
            }

            return $valida;
        }

        public function otorgarPuntos($posicion_parrilla, $vuelta_rapida)
        {
            if($this->posicionValida($posicion_parrilla))
            {
                if($vuelta_rapida && $posicion_parrilla <= 10)
                {
                    $this->puntos++;
                }

                switch($posicion_parrilla)
                {
                    case 1:
                        $this->puntos += 18;
                        break;
                    case 2:
                        $this->puntos += 15;
                        break;
                    case 3:
                        $this->puntos += 12;
                        break;
                    case 4:
                        $this->puntos += 10;
                        break;
                    case 5:
                        $this->puntos += 8;
                        break;
                    case 6:
                        $this->puntos += 6;
                        break;
                    case 7:
                        $this->puntos += 4;
                        break;
                    case 8:
                        $this->puntos += 2;
                        break;
                    case 9:
                        $this->puntos += 1;
                        break;
                    default:
                        break;
                }
                $this->subirCategoria();
            }
        }

        public function subirCategoria()
        {
            echo "Máxima categoría";
        }
    }
?>