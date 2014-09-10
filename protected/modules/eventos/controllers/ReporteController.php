<?php

class ReporteController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
    public $defaultAction = 'index';

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

}
