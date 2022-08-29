<?php 

namespace App\Helpers;

class SerialNumber {
    public static function get_serial_number($id, $length=4) {
        $num_of_zeros = $length - strlen($id);
        if ($num_of_zeros < 0) {
            $num_of_zeros = 0;
        }
        return str_repeat('0', $num_of_zeros).$id;
    }
}

?>