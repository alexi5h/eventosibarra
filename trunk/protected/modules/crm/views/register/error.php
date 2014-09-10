
<!-- Boxes de Acoes -->
<div class="col-md-12 ">
    <div class="box">							
        <div class="icon">
            <div class="image"><i class="glyphicon glyphicon-thumbs-down"></i></div>
            <div class="info">
                <blockquote>
                    <p>Ha ocurrio un error intentelo nuevamente porfavor.</p>
                </blockquote>
                <?php
                $this->widget('ext.booster.widgets.TbButton', array(
                    'label' => Yii::t('AweCrud.app', 'Registrarse'),
                    'buttonType' => 'link',
                    'url' => Yii::app()->baseUrl . '/crm/register/participant/ie/' . $evento->id
                ));
                ?>
            </div>

        </div>

    </div> 
</div>

