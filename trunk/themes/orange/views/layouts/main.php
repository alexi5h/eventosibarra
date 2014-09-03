
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!-- CSS FILES -->

        <script>
            var baseUrl = "<?php print Yii::app()->baseUrl . '/'; ?>";
            var themeUrl = "<?php print Yii::app()->theme->baseUrl . '/'; ?>";
            var user_id = "<?php print Yii::app()->user->id; ?>";
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body >
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
        <br/>
        <br/>
        <br/>

        <div class="container">
            <div class="row-fluid">
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
            <div class="row-fluid">
                <?php echo $content; ?>
            </div>

        </div>

    </body>
    <!-- END BODY -->
</html>