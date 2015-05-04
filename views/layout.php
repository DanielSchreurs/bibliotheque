<!DOCTYPE html>
<html lang="<?php echo($language); ?>">
<?php include(VIEW_DIR . 'parts/head.php'); ?>
<body>
<?php include(VIEW_DIR . 'parts/'.$controller->header.'.php'); ?>
<?php include($controller->view); ?>
<?php include(VIEW_DIR . 'parts/footer.php'); ?>
<script type="text/javascript" src="./js/app.js"></script>
</body>
</html>
