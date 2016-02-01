<?php

class SiteController extends CController implements IWebServiceProvider {

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
        
    }

    /**
     * This method is required by IWebServiceProvider.
     * It makes sure the user is logged in before making changes to data.
     * @param CWebService the currently requested Web service.
     * @return boolean whether the remote method should be executed.
     */
    public function beforeWebMethod($service) {
        
    }

    /**
     * This method is required by IWebServiceProvider.
     * @param CWebService the currently requested Web service.
     */
    public function afterWebMethod($service) {
        
    }

}
