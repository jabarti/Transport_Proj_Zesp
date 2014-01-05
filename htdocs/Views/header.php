<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Author" content="Bartosz M. Lewiński" />
	<meta http-equiv="Creation-Date" content="Fri, 27 Dec 2013 23:29:28 GMT" />
        <!--link rel="shortcut icon" href="<?php echo PICTURES_PATH.DIRECTORY_SEPARATOR.'favicon_no_euro.ico';?>" type="image/x-icon"/><!---->
        <link rel="shortcut icon" href="pictures/favicon_no_euro.ico" type="image/x-icon"/><!---->
        <!--<link rel="shortcut icon" href="C:/xampp/htdocs/Transport_Proj_Zesp/files/pictures/favicon_no_euro.ico" type="image/x-icon"/><!---->
	<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script><!---->
	<script src="<?php echo SCRIPT_PATH.DIRECTORY_SEPARATOR.'jQuery v1.8.3';?>"></script>
        <script type="text/javascript" src="<?php echo SCRIPT_PATH.DIRECTORY_SEPARATOR.'whcookies.js';?>"></script>
        <!--<script type="text/javascript" src="scripts/whcookies.js"></script>-->
	<link rel="Stylesheet" type="text/css" href="Styles/style.css" />
        
        <title><?php echo $title ?></title>
        <?php
        echo SCRIPT_PATH.DIRECTORY_SEPARATOR."jQuery v1.8.3".'<br>';
        echo SCRIPT_PATH.DIRECTORY_SEPARATOR."whcookies.js";
        echo "<br>START header.php<br>=================================<br>";
        if (isset($_SESSION)){
            echo 'session set';
                echo '<br>linia: '.__LINE__.'$_SESSION[\'count\']: '.$_SESSION['count'].'<br>';
            foreach ($_SESSION as $key => $value){
            echo '<br>$_SESSION['.$key.'] => '. $value;
            }
        }else{
            echo 'WTF?';
        }
        ?>
    </head>
    <body>