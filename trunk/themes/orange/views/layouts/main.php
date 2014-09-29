
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="es"> <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />

        <script>
            var baseUrl = "<?php print Yii::app()->baseUrl . '/'; ?>";
            var themeUrl = "<?php print Yii::app()->theme->baseUrl . '/'; ?>";
            var user_id = "<?php print Yii::app()->user->id; ?>";
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body >
        <div class="">
            <div class="row">
                <div class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?php echo Yii::app()->homeUrl ?>" class="navbar-brand">
                                <img height="30" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/Logo.png" alt="">
                            </a>
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse" id="navbar-main">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="color:black" href="#" id="download"><?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu"  aria-labelledby="download">
                                        <?php if (!Yii::app()->user->isGuest): ?>
                                            <?php if (Yii::app()->user->checkAccess('admin')): ?>
                                                <li><?php echo CHtml::link('<i class="icon-user"></i>&nbsp;&nbsp;Mi Cuenta', array('/cruge/ui/editprofile')) ?></a></li>
                                                <li><?php echo CHtml::link('<i class="icon-cog"></i>&nbsp;&nbsp;Administración', Yii::app()->user->ui->userManagementAdminUrl) ?></li>
                                            <?php endif; ?>
                                            <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Cerrar Sesión', Yii::app()->user->ui->logoutUrl) ?></a></li>
                                        <?php else: ?>
                                            <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Iniciar Sesión', Yii::app()->user->ui->loginUrl) ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <div id="maiMessages" class="flash-messages">
                        <?php
                        $messages = Yii::app()->user->getFlashes();
                        if ($messages) {
                            foreach ($messages as $key => $message) {
                                echo '<div class="alert alert-' . $key . '">'
                                . '<button data-dismiss="alert" class="close" type="button">×</button>'
                                . $message . "</div>\n";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if (!Yii::app()->user->isGuest) : ?>
                    <div class="col-sm-3 col-md-3">
                        <div class="panel-group" id="accordion">
                            <?php if (Yii::app()->user->isSuperAdmin): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a   href="<?php echo Yii::app()->user->ui->userManagementAdminUrl ?>"><span class="glyphicon glyphicon-wrench">
                                                </span>Administración</a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#"><span class="glyphicon glyphicon-tasks">
                                            </span>Cat&aacute;logo</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <ul class="list-group">
                                        <li class="list-group-item"><span class="glyphicon glyphicon-usd"></span><a href="<?php print Yii::app()->baseUrl . '/crm/sector'; ?>">Sectores Econ&oacute;micos</a></li>

                                        <li class="list-group-item"><span class="glyphicon glyphicon-pushpin"></span><a href="<?php print Yii::app()->baseUrl . '/crm/subsector'; ?>">Subsectores</a></li>

                                        <li class="list-group-item"> <span class="glyphicon glyphicon-briefcase"></span><a href="<?php print Yii::app()->baseUrl . '/crm/ramaActividad'; ?>">Rama de actividades</a></li>
                                        <li class="list-group-item"> <span class="glyphicon glyphicon-leaf"></span><a href="<?php print Yii::app()->baseUrl . '/crm/actividad'; ?>">Actividades</a></li>

                                    </ul>
                                </div>
                            </div> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a   href="<?php print Yii::app()->baseUrl . '/crm/participante'; ?>"><span class="glyphicon glyphicon-user">
                                            </span>Participantes</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a   href="<?php print Yii::app()->baseUrl . '/eventos/evento'; ?>"><span class="glyphicon glyphicon-calendar">
                                            </span>Eventos</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a   href="<?php print Yii::app()->baseUrl . '/eventos/reporte'; ?>"><span class="glyphicon glyphicon-stats">
                                            </span>Reportes</a>
                                    </h4>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-sm-9 col-md-9">
                    <?php echo $content; ?>

                </div>
            </div>

        </div>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mask.js"></script>
    </body>
    <!-- END BODY -->
</html>