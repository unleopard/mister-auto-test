<?php

namespace App\Http\Controllers;

use App\Models\Occurrence;
use Illuminate\Http\Request;


class OccurrenceController extends Controller
{

    public function index(String $param = null)
    {
        try {
            if (!is_null($param) && !empty($param)) {

                // get max occurenced char
                $maxChars = $this->getMaxOccurring($param);

                // insert data
                $inserted = $this->saveData($param, $maxChars[0], $maxChars[1]);

                if ($inserted)
                    return response()->json(['success' => true, 'status' => 200, 'date' => time(), 'string' => $param, 'message' => 'parametre must be numeric', 'detail' => ['char' => $maxChars[0], 'max' => $maxChars[1]]]);
                else
                    return response()->json(['success' => false, 'status' => 500, 'date' => time(), 'message' => "Une erreur se produite lors de l'insertion"], 500);

            } else {
                return response()->json(['success' => false, 'status' => 500, 'date' => time(), 'message' => 'Merci de passer un string'], 500);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'status' => 500, 'date' => time(), 'message' => "Une erreur se produite"], 500);
        }
    }

    public function listTentatives()
    {
        $listTentatives = Occurrence::orderBy('id', 'desc')->paginate(2);
        return view('tentatives', ['listTentatives' => $listTentatives]);
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

    private function saveData($string, $char, $max)
    {
        return Occurrence::insert([
            "string" => $string,
            "char" => $char,
            "max_occurenced" => $max,
        ]);
    }
}
