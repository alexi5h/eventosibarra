
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="es"> <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
                    <?php echo $content; ?>
                </div>
            </div>

        </div>
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>-->
    </body>
    <!-- END BODY -->
</html>