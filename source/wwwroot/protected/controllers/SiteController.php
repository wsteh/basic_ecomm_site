<?php

class SiteController extends CController {

    public $layout = 'column1';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionStep2() {
        $model = new shoppingcartForm();
        $model->attributes = $_POST;

        if ($model->validate()) {
            $this->render('index2', array(
                'model' => $model
            ));
        } else {
            $this->redirect('site/index');
        }
    }

    public function actionStep3() {
        $model = new shoppingcartForm();
        $model->scenario = 'process_step2';
        $model->attributes = $_POST;

        if ($model->validate()) {
            $this->render('index3', array(
                'model' => $model
            ));
        } else {
            $this->redirect('site/index');
        }
    }

}
