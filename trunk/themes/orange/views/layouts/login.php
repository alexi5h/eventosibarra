<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body id="login" >
        <!--<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>-->
        <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please sign in</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $content ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!--<script src="<?php // echo Yii::app()->theme->baseUrl;     ?>/js/script.js"></script>-->

    <!-- END BODY -->
</html>