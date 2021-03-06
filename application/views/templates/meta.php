<?php echo doctype("html5"); ?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo $title; ?></title>

    <?php echo link_tag('img/icon/favicon.ico', 'shortcut icon', 'image/ico'); ?>

    <?php echo link_tag('css/main.css'); ?>
    <?php echo link_tag('http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css'); ?>

    <?php echo link_tag('http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css'); ?>
    <?php echo link_tag('http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'); ?>
    <?php echo link_tag('css/summernote.css'); ?>
    <?php echo link_tag('css/jquery.ui.rotatable.css'); ?>

    <!-- Libraries import -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/libraries/knockout-3.0.0.js'></script>

    <!-- Data file import -->
    <script type='text/javascript' src='<?php echo base_url(); ?>js/classes/models/data.js'></script>
</head>