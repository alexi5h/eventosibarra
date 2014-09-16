<?php
$eventos_id = ParticipanteHasEvento::model()->getEventosParticipante($model->id);
$eventos = Evento::model()->findAllByPk($eventos_id);
$array_nombres_eventos = array();
foreach ($eventos as $ev) {
    array_push($array_nombres_eventos, $ev['nombre']);
}
$nombres_eventos = implode(', ', $array_nombres_eventos);
?>
<div class="col-md-12 col-sm-12 col-lg-12 toppad" >
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $model->nombres . ' ' . $model->apellidos ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                        <tbody>
                            <?php
                            echo "<tr><td>Nombres:</td><td>$model->nombres</td></tr>"
                            . "<tr><td>Apellidos:</td><td>$model->apellidos</td></tr>"
                            . "<tr><td>Cédula:</td><td>$model->cedula</td></tr>"
                            . "<tr><td>Tipo:</td><td>" . $model->tipoParticipante($model->tipo) . "</td></tr>"
                            . "<tr><td>Teléfono:</td><td>"
                            ?><?php echo $model->telefono ? $model->telefono : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">No asignado</span>" ?><?php
                            echo "</td></tr>"
                            . "<tr><td>Celular:</td><td>"
                            ?><?php echo $model->celular ? $model->celular : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">No asignado</span>" ?><?php
                            echo "</td></tr>"
                            . "<tr><td>E-mail:</td><td>"
                            ?><?php echo $model->email ? "<a href=\"mailto:$model->email\">$model->email</a>" : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">No asignado</span>" ?><?php
                            echo "</td></tr>"
                            . "<tr><td>Dirección:</td><td>"
                            ?><?php echo $model->direccion ? $model->direccion : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">No asignado</span>" ?><?php
                            echo "</td></tr>"
                            . "<tr><td>Sector:</td><td>$model->sector</td></tr>"
                            . "<tr><td>Subsector:</td><td>$model->subsector</td></tr>"
                            . "<tr><td>Rama de Actividad:</td><td>"
                            ?><?php echo $model->ramaActividad ? $model->ramaActividad : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">No asignado</span>" ?><?php
                            echo "</td></tr>"
                            . "<tr><td>Actividad:</td><td>"
                            ?><?php echo $model->actividad ? $model->actividad : "<span style=\"color:#EBBBAA; font-style:italic\" class=\"vacios\">No asignado</span>" ?><?php
                            echo "</td></tr>"
                            . "<tr><td>Eventos:</td><td>$nombres_eventos</td></tr>"
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <a style="float: right; margin-right: 15px" href="<?php echo Yii::app()->createUrl("crm/participante/update", array("id" => $model->id)) ?>" data-original-title="Actualizar Participante" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"> Actualizar</i></a>
            </div>

        </div>
    </div>
</div>
