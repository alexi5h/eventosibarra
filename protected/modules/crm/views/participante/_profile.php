<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-1 toppad" >
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $model->nombres . ' ' . $model->apellidos ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                        <tbody>
                            <?php
                            echo "<tr><td>Nombres:</td><td>$model->nombres</td></tr>"
                            . "<tr><td>Apellidos:</td><td>$model->apellidos</td></tr>"
                            . "<tr><td>Tipo:</td><td>$model->tipo</td></tr>"
                            . "<tr><td>Teléfono:</td><td>$model->telefono</td></tr>"
                            . "<tr><td>E-mail:</td><td><a href=\"mailto:$model->email\">$model->email</a></td></tr>"
                            . "<tr><td>Dirección:</td><td>$model->direccion</td></tr>"
                            . "<tr><td>Sector:</td><td>$model->sector</td></tr>"
                            . "<tr><td>Subsector:</td><td>$model->subsector</td></tr>"
                            . "<tr><td>Rama de Actividad:</td><td>$model->ramaActividad</td></tr>"
                            . "<tr><td>Actividad:</td><td>$model->actividad</td></tr>"
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
