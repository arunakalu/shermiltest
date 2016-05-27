<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Reception\Origin;
use App\Model\Token\TokenK;
use App\Model\Token\Token;
use App\Model\Token\TokenEloquent;
use Illuminate\Support\Facades\Request;
use App\Model\Logger\Log;
use App\Model\AES256\AES;
use App\Model\POH\UserEloquent;
use App\Model\Token\Item;
use App\Model\D3JSmodel\d3jsDataanalysis;
use Session;
use Input;
use DB;

class D3JSController extends Controller {

    public function index() {
        echo 'hai baba';
    }

    public function chart1() {
         return view('d3js/d3jsChart1');
         
        
    }

    public function createChart1_tsv() {
        $result = d3jsDataanalysis::tbl_token();
        $file = $_SERVER["DOCUMENT_ROOT"] .'/hubv1/ipg/resources/views/d3js/chart1.tsv';
        
        $firstline = "date\tcount\r\n";
        file_put_contents($file, $firstline);
        $otherlines="";
       
            for ($i = 0; $i < sizeof($result); $i++) {

                $file = 'chart1.tsv';
                $otherlines = $result[$i]["date"] . "\t" . $result[$i]["count"] . "\r\n";
                file_put_contents($file, $otherlines, FILE_APPEND | LOCK_EX);
            }
        

    }

}
