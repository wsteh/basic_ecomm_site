<?php

class SiteController extends CController 
{
    public $layout='column1';

    /**
     * This is the default action that displays the phonebook Flex client.
     */
    public function actionIndex() {
        $this->render('index');
    }

    /**
     * This action serves as a SOAP client to test the phonebook Web service.
     */
    public function actionShoppingcart() {
        $data = array();

        $model = new shoppingcartForm();
        $model->attributes = $_POST;
                
        if ($model->validate()) {
            $this->render('index2', $data);
        }
        
//        $this->redirect('site/index');
    }

    public function actionValidateStep2() {
        $data = array();
        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        
        $sc = new shoppingcart();
    }
}
