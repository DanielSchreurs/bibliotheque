<!DOCTYPE html>
<html  lang="<?php echo($language);?>">
<?php include(VIEW_DIR.'parts/head.php');?>
<body>
<?php include(VIEW_DIR.'parts/header.php'); ?>
<?php //var_dump($controller); ?>
<?php include($controller->view); ?>
<?php include(VIEW_DIR.'parts/footer.php'); ?>
<script type="text/javascript" src="./js/app.js"></script>
</body>
</html>
