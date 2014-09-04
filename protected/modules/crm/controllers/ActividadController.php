<?php

class ActividadController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
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
        $model = new Actividad;
        $model->estado = Actividad::ESTADO_ACTIVO;

        $this->performAjaxValidation($model, 'actividad-form');

        if (isset($_POST['Actividad'])) {
            $model->attributes = $_POST['Actividad'];
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

        $this->performAjaxValidation($model, 'actividad-form');

        if (isset($_POST['Actividad'])) {
            $model->attributes = $_POST['Actividad'];
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
            $this->loadModel($id)->delete();

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
        $model = new Actividad('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Actividad']))
            $model->attributes = $_GET['Actividad'];

        $this->render('admin', array(
            'model' => $model,
        ));
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Actividad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'actividad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
