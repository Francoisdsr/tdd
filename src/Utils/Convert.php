<?php

namespace App\Utils;

class Convert{
    protected $nombre;


    function convert($base_conv = null, $base_dep = null, $base_arr = null){
        if($this->nombre == "0"){
            return "0";
        }
        switch ($base_conv) {
            case '2-10':
                return $this->twoToTen();
                break;
            
            case '10-2':
                return $this->tenToTwo();
                break;

            case 'any-2':
                return $this->anyToTwo($base_dep);
                break;
            
            case '2-any':
                return $this->twoToAny($base_arr);
                break;

            case 'any-any':
                return $this->anyToAny($base_dep, $base_arr);
                break;
                
            default:
                return "Aucune conversion";
                break;
        }
    }
    function twoToTen(){
        $temp = strrev($this->nombre);
        $length = strlen($temp);
        $res = 0;
        for ($i=0; $i<$length; $i++) {
            $res += intval($temp[$i])*pow(2, $i);
        }
        return $res;
    }

    function tenToTwo(){
        $nombre = intval($this->nombre);
        $bin = "";
        while($nombre>=1){
            $reste = $nombre%2;
            $bin = strval($reste).$bin;
            $nombre = floor($nombre/2);
        }
        return $bin;
    }

    function anyToTen($base){
        $base_array = ['0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4,
        '5' => 5, '6' => 6, '7' => 7, '8' => 8,
        '9' => 9, 'A' => 10, 'B' => 11, 'C' => 12,
        'D' => 13, 'E' => 14, 'F' => 15, 'G' => 16,
        'H' => 17, 'I' => 18, 'J' => 19, 'K' => 20,
    ];
        $nombre_reverse = strrev($this->nombre);
        $nombre = $this->nombre;
        $length = strlen($nombre_reverse);
        $pui = 1;
        $res = 0;
        for ($i=0; $i<$length; $i++) {
            $res += intval($base_array[$nombre_reverse[$i]])*pow($base, $i);
        }
        return $res;

    }
    function anyToTwo($base){
        $this->setNombre($this->anyToTen($base));
        $this->setNombre($this->TenToTwo($base));
        return $this->nombre;
    }
    
    function twoToAny($base){
        $this->setNombre($this->TwoToTen($base));
        $this->setNombre($this->tenToAny($base));
        return $this->nombre;
    }

    function anyToAny($base_dep, $base_arr){
        $this->setNombre($this->anyToTen($base_dep));
        $this->setNombre($this->TenToTwo($base_dep));
        $this->setNombre($this->TwoToTen($base_arr));
        $this->setNombre($this->tenToAny($base_arr));
        return $this->nombre;
    }

    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
        return $this->nombre;
    }

    function tenToAny($base){
        $base_array = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        /* $base_array = ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4',
        '5' => '5', '6' => '6', '7' => '7', '8' => '8',
        '9' => '9', '10' => 'A', '11' => 'B', '12' => 'C',
        '13' => 'D', '14' => 'E', '15' => 'F', '16' => 'G',
        '17' => 'H', '18' => 'I', '19' => 'J', '20' => 'K',
    ]; */
        $nombre = intval($this->nombre);
        $bin = "";
        while($nombre>=$base){
            $reste = $nombre%$base;
            $bin = strval($base_array[$reste]).$bin;
            $nombre = floor($nombre/$base);
        }
        $bin = strval($base_array[strval($nombre)]).$bin;
        return $bin;
    }

}

//julien.robert@univ-orleans.fr
//convertisseur - rendu