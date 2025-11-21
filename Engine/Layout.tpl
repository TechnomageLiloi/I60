<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" href="/Signum.png">
        <!-- @todo: add function to link scripts and styles -->
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-api/Client/API.js"></script>

        <link href="<?php echo ROOT_URL; ?>/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo ROOT_URL; ?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>
        <link href="<?php echo ROOT_URL; ?>/Engine/Style.css" rel="stylesheet" />
        <link href="<?php echo ROOT_URL; ?>/Engine/API/Style.css" rel="stylesheet" />

        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>

        <title>Interstate 60</title>
    </head>
    <body>
        <div id="menu">
            <a class="butn" href="javascript:void(0)" onclick="window.location.reload();">Refresh</a>
        </div>

        <div id="page" class="stylo">
            <script>
                //Requests.Maps.show();
            </script>
        </div>
    </body>
</html>