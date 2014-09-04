<?php

class RamaActividadController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = true;
    public $defaultAction = 'admin';

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new RamaActividad;
        $model->estado = RamaActividad::ESTADO_ACTIVO;
        $this->performAjaxValidation($model, 'rama-actividad-form');

        if (isset($_POST['RamaActividad'])) {
            $model->attributes = $_POST['RamaActividad'];
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'rama-actividad-form');

        if (isset($_POST['RamaActividad'])) {
            $model->attributes = $_POST['RamaActividad'];
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $rama_Actividad= $this->loadModel($id);
            $participantes=$rama_Actividad->participantes;
            $actividades=$rama_Actividad->actividads;
            if (count($participantes) == 0 && count($actividades)==0) {
                $rama_Actividad->estado= RamaActividad::ESTADO_INACTIVO;
                $rama_Actividad->save();
                echo '<div class = "alert alert-success"><button data-dismiss = "alert" class = "close" type = "button">×</button>Borrado Exitosamente.</div>';
            }else{
                echo '<div class = "alert alert-error"><button data-dismiss = "alert" class = "close" type = "button">×</button>Imposible eliminar la Rama de Actividad, existen Actividades o Participantes que dependen de ésta.</div>';
            }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new RamaActividad('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['RamaActividad']))
            $model->attributes = $_GET['RamaActividad'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAjaxGetRamaActiBySubSector() {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['subsector_id']) && $_POST['subsector_id'] != '') {
                $data = RamaActividad::model()->activos()->findAll(array(
                    "condition" => "subsector_id =:subsector_id",
                    "order" => "nombre",
                    "params" => array(':subsector_id' => $_POST['subsector_id'],)
                ));
                if ($data) {
                    $data = CHtml::listData($data, 'id', 'nombre');
                    echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Ramas -', true);
                    foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    }
                } else {
                    echo CHtml::tag('option', array('value' => null), '- No existen opciones -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Seleccione un subsector -', true);
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = RamaActividad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'rama-actividad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionAjaxGetRamaActividadBySubsector() {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['subsector_id']) && $_POST['subsector_id'] !='') {
                $data = RamaActividad::model()->activos()->findAll(array(
                    "condition" => "subsector_id =:subsector_id",
                    "order" => "nombre",
                    "params" => array(':subsector_id' => $_POST['subsector_id'],)
                ));
                if ($data) {
                    $data = CHtml::listData($data, 'id', 'nombre');
                    echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Ramas de Actividad -', true);
                    foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    }
                } else {
                    echo CHtml::tag('option', array('value' => null), '- No existen opciones -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Seleccione un subsector -', true);
            }
        }
    }

}
