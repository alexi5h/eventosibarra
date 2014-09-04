
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
        <div class="container">
            <div class="row">
                <div class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?php echo Yii::app()->homeUrl ?>" class="navbar-brand">
                                Bootswatch
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
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download"><?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu" aria-labelledby="download">
                                        <?php if (!Yii::app()->user->isGuest): ?>
                                            <li><?php echo CHtml::link('<i class="icon-user"></i>&nbsp;&nbsp;Mi Cuenta', array('/cruge/ui/editprofile')) ?></a></li>
                                            <?php if (Yii::app()->user->checkAccess('admin')): ?>
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
            <br/>
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
                <?php if ($this->admin) : ?>
                    <div class="col-md-3">
                        <div class="well">
                            <div>
                                <ul class="nav">
                                    <li>    
                                        <label label-default="" class="tree-toggle nav-header"><a href="<?php echo Yii::app()->homeUrl ?>"> Regresar a la App</a></label>
                                    </li>
                                    <li>
                                        <label label-default="" class="tree-toggle nav-header">Cat&aacute;logo</label>
                                        <ul class="nav tree">
                                            <li><a href="<?php print Yii::app()->baseUrl . '/crm/sector/admin'?>">Sector</a>
                                            </li>
                                            <li><a href="<?php print Yii::app()->baseUrl . '/crm/subsector/admin'?>">Subsector</a>
                                            </li>
                                            <li><a href="<?php print Yii::app()->baseUrl . '/crm/ramaActividad/admin'?>">Rama Actividad</a>
                                            </li>
                                            <li><a href="<?php print Yii::app()->baseUrl . '/crm/actividad/admin'?>">Actividad</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class=" <?php echo $this->admin ? "col-md-9 " : "col-md-10 col-lg-offset-1" ?>  ">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
    </body>
    <!-- END BODY -->
</html>