<?php

class RegisterController extends CController {

    public $layout = '//layouts/register';
    public $admin = false;
    public $defaultAction = 'participant';

    public function actionParticipant($ie) {
        $model = new Participante;
        $model->evento_id = $ie;
        $model->estado = Participante::ESTADO_ACTIVO;
        $this->performAjaxValidation($model, 'participante-form');
        if (isset($_POST['Participante'])) {
            $model->attributes = $_POST['Participante'];
//            die(var_dump($_POST['Participante']['evento']));
            if ($model->save()) {
//                die(var_dump($model->attributes));
                $model->saveManyMany('eventos', array($ie));
                die(var_dump('registrado bien'));
            } {
                die(var_dump('mal'));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionSuccess($id) {
        
    }

    public function actionAjaxGetSubsectorBySector() {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['sector_id']) && $_POST['sector_id'] != '') {
                $data = Subsector::model()->activos()->findAll(array(
                    "condition" => "sector_id =:sector_id",
                    "order" => "nombre",
                    "params" => array(':sector_id' => $_POST['sector_id'],)
                ));
                if ($data) {
                    $data = CHtml::listData($data, 'id', 'nombre');
                    echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Subsectores -', true);
                    foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    }
                } else {
                    echo CHtml::tag('option', array('value' => null), '- No existen opciones -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Seleccione un sector -', true);
            }
        }
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
                    echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- No existen opciones -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Seleccione un subsector -', true);
            }
        }
    }

    public function actionAjaxGetActividadByRama() {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['rama_actividad_id']) && $_POST['rama_actividad_id'] != '') {
                $data = Actividad::model()->activos()->findAll(array(
                    "condition" => "rama_actividad_id =:rama_actividad_id",
                    "order" => "nombre",
                    "params" => array(':rama_actividad_id' => $_POST['rama_actividad_id'],)
                ));
                if ($data) {
                    $data = CHtml::listData($data, 'id', 'nombre');
                    echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Actividades -', true);
                    foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    }
                } else {
                    echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- No existen opciones -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => null, 'id' => 'p'), '- Seleccione una rama de actividad -', true);
            }
        }
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'participante-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
