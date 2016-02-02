<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class shoppingcart
{
	private function curl($url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            
            $response = curl_exec($ch);
            curl_close($ch);
            
            return $response;
        }
        
        public function getData($id) {
            $return_array = array();
            $data = $this->curl('http://www.hermo.my/test/api.html?list=best-selling');
            
            if ($data) {
                if ($data_array = json_decode($data, true)) {
                    foreach ($data_array['items'] as $idx => $arr) {
                        if ($arr['id'] == $id) {
                            $return_array = $arr;
                            break;
                        }
                    }
                }
            }
            
            return $return_array;
        }
}