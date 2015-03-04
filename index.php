<?php
	require_once('vendor/autoload.php');
	$kss = new \Scan\Kss\Parser('css');

	$reference = (isset($_GET['ref'])) ? $_GET['ref'] : 'Buttons';

    try {
        $section = $kss->getSection($reference);
    } catch (UnexpectedValueException $e) {
        $reference = 'Buttons';
        $section = $kss->getSection($reference);
    }
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Styleguide Alma CSS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!--date-->
		<!--cssStart-->
		<link rel="stylesheet" href="vendor/components/normalize.css/normalize.css">
        <link rel="stylesheet" href="css/base.css" />
        <link rel="stylesheet" href="css/layout.css" />
	    <link rel="stylesheet" href="css/styleguide.css" />
	    <!--cssEnd-->
       	<link rel="stylesheet" href="css/buttons.css" />
        <link rel="stylesheet" href="css/grids.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/typography.css" />
        <link rel="stylesheet" href="css/forms.css" />
        <link rel="stylesheet" href="css/alerts.css" />
        <link rel="stylesheet" href="css/tables.css" />
        <link rel="stylesheet" href="css/pagination.css" />
        <!--[if lt IE 9]>
			<script src="vendor/afarkas/html5shiv/dist/html5shiv.js"></script>
		<![endif]-->
    </head>
    <body>
    	<div id="container">
            <section id="col1">
        		<header id="header" class="center">
    				<h1>Styleguide Alma CSS</h1>
    			</header>
    			<nav id="nav" class="alma-menu">
    				<ul>
    					<?php
    			            foreach ($kss->getTopLevelSections() as $topLevelSection) {
    			                echo '<li>
    			                    <a href="?ref='.$topLevelSection->getReference().'" title="'.$topLevelSection->getDescription().'">' .
    			                        $topLevelSection->getTitle() .
    			                    '</a>' .
    			                '</li>';
    			            }
    			        ?>
    				</ul>
    			</nav>
    			<footer id="footer">
    				<p><!--link.css--></p>
    				<p><!--link.css.min--></p>
				</footer>
            </section>
            <section id="col2">
    			<article id="content">
    				<?php
                        foreach ($kss->getSectionChildren($reference) as $section) {
                            require('includes/block.inc.php');
                        }
                    ?>
    			</article>
            </section>
    	</div>

    	<!--scriptStart-->
        <script src="js/kss.js"></script>
        <!--scriptEnd-->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>