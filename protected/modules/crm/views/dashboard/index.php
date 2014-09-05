<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="row">       
    <div class="col-lg-10 col-lg-offset-1">
        <h1>Bienvenidos al Primer prototipo </h1>

        <?php
        if (Yii::app()->user->isGuest) {

            $this->widget(
                    'ext.booster.widgets.TbButton', array(
                'label' => 'Entrar',
                'buttonType' => 'link',
                'url' => Yii::app()->user->ui->loginUrl
                    )
            );
        }   
        ?>
    </div>
</div>