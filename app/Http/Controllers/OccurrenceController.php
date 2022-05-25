<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class OccurrenceController extends Controller
{

    public function index(String $param = null)
    {
        if (!is_null($param) && !empty($param)) {

            $maxChars = $this->getMaxOccurring($param);

            return response()->json(['success' => true, 'status' => 200, 'date' => time(), 'string' => $param, 'message' => 'parametre must be numeric', 'detail' => ['char' => $maxChars[0], 'max' => $maxChars[1]]]);

        } else {
            return response()->json(['success' => false, 'status' => 500, 'date' => time(), 'message' => 'Merci de passer un string'], 500);
        }
    }


    private function getMaxOccurring($string)
    {
        $maxChars = 256;

        $arrayChars = array_fill(0, $maxChars, NULL);


        $len = strlen($string); // lenght
        $max = 0; // init max arrayChars

        // loop chars of string
        for ($i = 0; $i < ($len); $i++) {
            $arrayChars[ord($string[$i])]++; // increment

            if ($max < $arrayChars[ord($string[$i])]) { // is max < incremented
                $max = $arrayChars[ord($string[$i])];
                $result = $string[$i];
            }
        }

        /**
         * return Aarray
         *      0 : char
         *      1 : number of Occurring
         */
        return [$result, $max];
    }
}
