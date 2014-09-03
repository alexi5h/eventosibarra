<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body >
        <div class="container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="well">
                    <?php echo $content ?>

                </div>
                <div class="col-md-4">

                </div>
            </div>
    </body>
    <!-- END BODY -->
</html>