<?php
Util::tsRegisterAssetJs('view.js');
/** @var EventoController $this */
/** @var Evento $model */
?>
<link href="//cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.1.6/ZeroClipboard.swf">
<script src="//cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.1.6/ZeroClipboard.min.js"></script>
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
                            <input type="text" id="text_value" class="form-control" readonly="" placeholder="" value="<?php print Yii::app()->baseUrl . '/crm/register/participant/ie/' . $model->id; ?>">
                            <span class="input-group-btn" >
                                <button type="button" id="btn-copy"  class="btn btn-default" ><span class="glyphicon glyphicon-link"></span> Copiar</button>
                            </span>
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
