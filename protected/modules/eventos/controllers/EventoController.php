<?php

class EventoController extends AweController
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
    public $defaultAction = 'admin';

    public function filters()
    {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Evento;
        $model->estado = Evento::ESTADO_ACTIVO;
        $this->performAjaxValidation($model, 'evento-form');

        if (isset($_POST['Evento'])) {
            $model->attributes = $_POST['Evento'];
            if ($model->fecha_fin != '') {
                $model->fecha_fin = Util::FormatDate($model->fecha_fin, 'Y-m-d');
                $model->fecha_fin = $model->fecha_fin . ' 23:59:59';
            } else {
                $model->fecha_fin = Util::FormatDate($model->fecha_inicio, 'Y-m-d');
                $model->fecha_fin = $model->fecha_fin . ' 23:59:59';
            }
            $model->fecha_inicio = Util::FormatDate($model->fecha_inicio, 'Y-m-d H:i:s');

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
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->fecha_inicio = Util::FormatDate($model->fecha_inicio, 'd/m/Y');
        $model->fecha_fin = Util::FormatDate($model->fecha_fin, 'd/m/Y');
        $this->performAjaxValidation($model, 'evento-form');

        if (isset($_POST['Evento'])) {
            $model->attributes = $_POST['Evento'];
            if ($model->fecha_fin != '') {
                $model->fecha_fin = Util::FormatDate($model->fecha_fin, 'Y-m-d');
                $model->fecha_fin = $model->fecha_fin . ' 23:59:59';
            } else {
                $model->fecha_fin = Util::FormatDate($model->fecha_inicio, 'Y-m-d');
                $model->fecha_fin = $model->fecha_fin . ' 23:59:59';
            }
            $model->fecha_inicio = Util::FormatDate($model->fecha_inicio, 'Y-m-d H:i:s');

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
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Evento::model()->updateByPk($id, array('estado' => Evento::ESTADO_INACTIVO));
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Evento('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Evento']))
            $model->attributes = $_GET['Evento'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionGenerateUrl()
    {
        $model = new Evento('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Evento']))
            $model->attributes = $_GET['Evento'];

        $this->render('_form_generateUrl', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__)
    {
        $model = Evento::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evento-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
