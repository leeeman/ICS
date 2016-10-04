<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Inventory Control System</title>
	<!-- <link rel="stylesheet" href="css/metro.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/metro-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/metro-bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/iconFont.min.css">
	<link rel="stylesheet" type="text/css" href="css/application.css">
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.widget.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="js/metro.min.js"></script>
</head>
<body class="metro">
<div data-role="preloader" id="overlay" data-type="cycle" data-style="color"></div>
	<nav class="navigation-bar dark">
	    <div class="navigation-bar-content">
	        <a href="/" class="element"><span class="icon-grid-view"></span> METRO UI CSS <sup>2.0</sup></a>
	        <span class="element-divider"></span>

	        <a class="pull-menu" href="#"></a>
	        <ul class="element-menu">
	            <li>
	                <a class="dropdown-toggle" href="#">Base CSS</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                    <li><a href="requirements.html">Requirements</a></li>
	                    <li>
	                        <a href="#" class="dropdown-toggle">General CSS</a>
	                        <ul class="dropdown-menu dark" data-role="dropdown">
	                            <li><a href="global.html">Global styles</a></li>
	                            <li><a href="grid.html">Grid system</a></li>
	                            <div class="divider"></div>
	                            <li><a href="typography.html">Typography</a></li>
	                            <li><a href="tables.html">Tables</a></li>
	                            <li><a href="forms.html">Forms</a></li>
	                            <li><a href="buttons.html">Buttons</a></li>
	                            <li><a href="images.html">Images</a></li>
	                        </ul>
	                    </li>
	                    <li class="divider"></li>
	                    <li><a href="responsive.html">Responsive</a></li>
	                    <li class="disabled"><a href="layouts.html">Layouts and templates</a></li>
	                    <li class="divider"></li>
	                    <li><a href="icons.html">Icons</a></li>
	                </ul>
	            </li>
	            <li>
	                <a class="dropdown-toggle" href="#">Community</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                    <li class="disabled"><a href="http://blog.metroui.net">Blog</a></li>
	                    <li class="disabled"><a href="http://forum.metroui.net">Community Forum</a></li>
	                    <li class="divider"></li>
	                    <li><a href="https://github.com/olton/Metro-UI-CSS">Github</a></li>
	                    <li class="divider"></li>
	                    <li><a href="https://github.com/olton/Metro-UI-CSS/blob/master/LICENSE">License</a></li>
	                </ul>
	            </li>
	        </ul>

	        <div class="no-tablet-portrait">
	            <span class="element-divider"></span>
	            <a class="element brand" href="#"><span class="icon-spin"></span></a>
	            <a class="element brand" href="#"><span class="icon-printer"></span></a>
	            <span class="element-divider"></span>

	            <div class="element place-right">
	                <a class="dropdown-toggle" href="#">
	                    <span class="icon-cog"></span>
	                </a>
	                <ul class="dropdown-menu place-right" data-role="dropdown" style="display: block;">
	                    <li><a href="#">Products</a></li>
	                    <li><a href="#">Download</a></li>
	                    <li><a href="#">Support</a></li>
	                    <li><a href="#">Buy Now</a></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</nav>
	<div class="container">
		<div id="dashboard_content">
		@include('dasboard')
		</div>
	</div>
</body>
<script type='text/javascript' src="js/application.js"></script>
</html>

