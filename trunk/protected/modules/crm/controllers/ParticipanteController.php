<?php

class ParticipanteController extends AweController {

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
        $this->admin = false;
        $model = new Participante;
        $model->estado = Participante::ESTADO_ACTIVO;
        $this->performAjaxValidation($model, 'participante-form');
        if (isset($_POST['Participante'])) {
            $model->attributes = $_POST['Participante'];
            if ($model->save()) {
                $model->saveManyMany('eventos', array($model->evento_id));
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
    public function actionUpdate($id, $r = null) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'participante-form');

        if (isset($_POST['Participante'])) {
            $model->attributes = $_POST['Participante'];
            if ($model->save()) {
                if ($r != null) {
                    $this->redirect(array('admin'));
                } else {
                    $this->redirect(array('view', 'id' => $model->id));
                }
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
            $participante = $this->loadModel($id);
            Participante::model()->updateByPk($id, array('estado' => Participante::ESTADO_INACTIVO));
            echo '<div class = "alert alert-success"><button data-dismiss = "alert" class = "close" type = "button">×</button>Borrado Exitosamente.</div>';
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
        $model = new Participante('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Participante']))
            $model->attributes = $_GET['Participante'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Participante::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
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
