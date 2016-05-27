<?php

/**
 * Created by Sublime text.
 * Author: Dilan Wijerathne
 * Date: 1/19/2016   mm/dd//yyy
 * Time: 5:21 PM
 */

namespace App\Model\Customer;

use input;
use DB;
use Illuminate\Database\Eloquent\Model;

class customer extends Model {

    public static function getTokenDetails($customerId) {

        $tokenKey = DB::table('ph_customer')
                ->join('ph_token', 'ph_customer.cus_auto_id', '=', 'ph_token.tk_customer_id')
                ->select('ph_token.*')
                ->where('ph_customer.cus_auto_id', $customerId)
                ->get();
        
        $newval=(array)$tokenKey[0];
        $data = array();
        foreach ($tokenKey as $key => $value) {
            $data[$key]=(array)$tokenKey[$key];
        }

        return $data;
    }

}
