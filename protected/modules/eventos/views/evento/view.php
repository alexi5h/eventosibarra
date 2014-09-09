<?php
/** @var EventoController $this */
/** @var Evento $model */
?>
<div class="panel panel-default">
    <!--<div class="panel-heading"><?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Evento::label(2) ?> </div>-->
    <div class="panel-body">
        <div class="timeline-centered">

            <article class="timeline-entry">

                <div class="timeline-entry-inner">

                    <div class="timeline-icon bg-info">
                        <i class="entypo-feather"></i>
                    </div>
                </div>

            </article>
            <article class="timeline-entry left-aligned">

                <div class="timeline-entry-inner">
                    <time class="timeline-time" datetime="<?php echo $model->fecha_inicio ?>"><span><?php echo Util::FormatDate($model->fecha_inicio, 'd/m/Y'); ?></span> <span></span></time>

                    <div class="timeline-icon bg-success">
                        <i class="entypo-suitcase"></i>
                    </div>

                    <div class="timeline-label">
                        <h2><?php echo $model->nombre ?></h2>
                        <blockquote><?php echo $model->descripcion ?></blockquote>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">Link</span>
                            <input type="text" class="form-control" placeholder="" value="<?php print Yii::app()->baseUrl . '/crm/register/participant/ie/' . $model->id; ?>">
                        </div> 
                    </div>
                </div>

            </article>



            <article class="timeline-entry begin">

                <div class="timeline-entry-inner">

                    <div class="timeline-icon bg-secondary" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                        <i class="entypo-flight"></i>
                    </div>

                </div>

            </article>

        </div>
    </div>
</div>
