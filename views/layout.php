<!DOCTYPE html>
<html  lang="<?php echo($language);?>">
<?php include(VIEW_DIR.'parts/head.php');?>
<body>
<h1 class="hidden"><?php echo(TITLE.' | '.$data['title']) ?></h1>
<?php include(VIEW_DIR.'parts/header.php'); ?>
<?php //var_dump($controller); ?>
<?php include($controller->view); ?>
<?php include(VIEW_DIR.'parts/footer.php'); ?>
<script type="text/javascript" src="./js/app.js"></script>
<!--<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-54695745-1']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>-->
</body>
</html>
