
<!-- Boxes de Acoes -->
<div class="col-md-12 ">
    <div class="box">							
        <div class="icon">
            <div class="image"><i class="glyphicon glyphicon-thumbs-up"></i></div>
            <div class="info">
                <h3 class="title">Se a registrado con éxito</h3>
                <blockquote>
                    <p>Bienvenido a <?php echo $evento->nombre ?></p>
                    <footer><?php echo $evento->descripcion ?></footer>
                </blockquote>
                <?php
                $this->widget('ext.booster.widgets.TbButton', array(
                    'label' => Yii::t('AweCrud.app', 'Finalizar'),
                    'buttonType' => 'link',
                    'url' => 'http://www.ibarra.gob.ec/'
                ));
                ?>
            </div>

        </div>

    </div> 
</div>

