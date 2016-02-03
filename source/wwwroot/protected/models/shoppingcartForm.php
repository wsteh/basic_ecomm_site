<?php

class shoppingcartForm extends CFormModel {

    public $id;
    public $qty;
    public $area;
    public $code;
    public $data;
    public $discount;
    public $shipping = 0;

    public function rules() {
        return array(
            array('id, qty', 'required'),
            array('area', 'required', 'on' => 'process_step2'),
            array('id', 'validateID'),
            array('qty', 'validateQty'),
            array('code', 'validateCode', 'on' => 'process_step2'),
            array('data, discount, shipping', 'safe'),
        );
    }

    public function validateID() {
        if ($data = $this->getData($this->id)) {
            $this->data = $data;
        } else {
            $this->addError('ID', 'Invalid ID.');
        }
    }

    public function validateQty() {
        if ($qty = (int) $this->qty) {
            $this->qty = $qty;
        } else {
            $this->qty = 1; // default to 1
        }
    }

    public function validateCode() {
        if ($this->code) {
            switch ($this->code) {
                case 'OFF5PC':
                    if ($this->qty >= 2) {
                        $this->discount['%'] = 5;
                    }
                    break;
                case 'GIVEME15':
                    if ($this->getTotal() > 100) {
                        $this->discount['CASH'] = 15;
                    }
                    break;
                default :
                    $this->addError('ID', 'Invalid Promotion Code.');
            }
        }
    }

    public function getTotal() {
        return ($this->data['selling_price'] * $this->qty);
    }

    public function getDiscount() {
        $ttl_disc = 0;
        $ttl = $this->getTotal();

        if ($this->discount) {
            if (isset($this->discount['CASH'])) {
                $ttl_disc = $this->discount['CASH'];
            } else if (isset($this->discount['%'])) {
                $ttl_disc = $ttl * ($this->discount['%'] / 100);
            }
        }

        return $ttl_disc;
    }

    public function getPaymentTotal() {
        $ttl = $this->getTotal();
        $ttl_disc = $this->getDiscount();
        $ttl_ship = $this->getShipping();

        return ($ttl - $ttl_disc + $ttl_ship);
    }

    public function getShipping() {
        $ttl = $this->getTotal();

        switch ($this->area) {
            case 'Malaysia':
                if ($this->qty == 2 || $ttl > 150) {
                    $this->shipping = 0;
                } else {
                    $this->shipping = 100;
                }
                break;
            case 'Singapore':
                if ($ttl > 300) {
                    $this->shipping = 0;
                } else {
                    $this->shipping = 20;
                }
                break;
            case 'Brunei':
                if ($ttl > 300) {
                    $this->shipping = 0;
                } else {
                    $this->shipping = 25;
                }
                break;
        }

        return $this->shipping;
    }

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
