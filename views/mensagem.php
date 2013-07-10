<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_scripts/java_script.js"></script>
</head>
	
<body>

<div id="site">
	
    <?php require "views/view_topo.php"; ?>
    
    <div id="content">
    	<div id="msg">
            <span><?php if (isset($view->titulo)) { echo $view->titulo; } ?></span>
            <p><?php if (isset($view->frase)) { echo $view->frase; } ?></p>
        </div>
    </div>

    <?php require "views/view_rodape.php"; ?>
</div>

</body>
</html>
