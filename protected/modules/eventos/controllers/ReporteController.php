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
        $model = new Reporte;
        $evento_id = null;
        $sector_id = null;
        $subsector_id = null;
        $rama_actividad_id = null;
        $actividad_id = null;
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_GET['ajax']) && $_GET['ajax'] == 'reporte-grid') {
                if (isset($_GET['Reporte'])) {
                    $evento_id = $_GET['Reporte']['evento_id'];
                    $sector_id = $_GET['Reporte']['sector_id'];
                    $subsector_id = $_GET['Reporte']['subsector_id'];
                    $rama_actividad_id = $_GET['Reporte']['rama_actividad_id'];
                    $actividad_id = $_GET['Reporte']['actividad_id'];
                }
            }
        }
        $data = $model->search($evento_id, $sector_id, $subsector_id, $rama_actividad_id, $actividad_id);
        $this->render('index', array('model' => $model, 'data' => $data));
    }

}
