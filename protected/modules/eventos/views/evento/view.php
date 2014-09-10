<?php
/** @var EventoController $this */
/** @var Evento $model */
?>
<div class="panel panel-default">
    <div class="panel-body">

        <div class="timeline-centered">

            <article class="timeline-entry">

                <div class="timeline-entry-inner">

                    <div class="timeline-icon bg-success">
                        <i class="entypo-feather"></i>
                    </div>
                    <div class="timeline-label">
                        <h2><?php echo $model->nombre ?></h2>
                        <blockquote><?php echo $model->descripcion ?>
                            <footer>Inicio: <cite title="Source Title"><?php echo Util::FormatDate($model->fecha_inicio, 'd/m/Y') ?></cite></footer>
                            <footer>Fin: <cite title="Source Title"><?php echo Util::FormatDate($model->fecha_fin, 'd/m/Y') ?></cite></footer>
                        </blockquote>
                        <div class="input-group input-group-sm col-lg-8 col-md-8 col-sm-12">
                            <span class="input-group-addon">Link</span>
                            <input type="text" class="form-control" placeholder="" value="<?php print Yii::app()->baseUrl . '/crm/register/participant/ie/' . $model->id; ?>">
                        </div>                  
                    </div>
                </div>
            </article>
            <article class="timeline-entry begin">

                <div class="timeline-entry-inner">

                    <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                        <i class="entypo-flight"></i> +
                    </div>

                </div>

            </article>

        </div>
    </div>
</div>
