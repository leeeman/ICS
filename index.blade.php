<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inventory Control System</title>
	<!-- <link rel="stylesheet" href="css/metro.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/metro-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/metro-bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/iconFont.min.css">
	<link rel="stylesheet" type="text/css" href="css/application.css">
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/metro.min.js"></script>
</head>
<body class="metro">
	<nav class="navigation-bar dark">
    <nav class="navigation-bar-content">
        <div class="element">
            <a class="dropdown-toggle" href="#">Store Name</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Main</a></li>
                <li><a href="#">File Open</a></li>
                <li class="divider"></li>
                <li><a href="#">Print...</a></li>
                <li class="divider"></li>
                <li><a href="#">Exit</a></li>
            </ul>
        </div>
 
        <span class="element-divider"></span>
        <a class="element brand" href="#"><span class="icon-spin"></span></a>
        <a class="element brand" href="#"><span class="icon-printer"></span></a>
        <span class="element-divider"></span>
 
        <!-- <div class="element input-element">
            <form>
                <div class="input-control text">
                    <input type="text" placeholder="Search...">
                    <button class="btn-search"></button>
                </div>
            </form>
        </div> -->
 
        <div class="element place-right">
            <a class="dropdown-toggle" href="#">
                <span class="icon-cog"></span>
            </a>
            <ul class="dropdown-menu place-right" data-role="dropdown">
                <li><a href="#">Products</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Buy Now</a></li>
            </ul>
        </div>
        <span class="element-divider place-right"></span>
        <a class="element place-right" href="#"><span class="icon-locked-2"></span></a>
        <span class="element-divider place-right"></span>
        <button class="element image-button image-left place-right">
            Sergey Pimenov
        </button>
    </nav>
</nav>
	<br>
	<div class="grid fluid" id="dashboard">
    	<div class="tile bg-darkPink double">
    		<div class="tile-content icon">
		        <i class="icon-cart-2"></i>
		    </div>
		    <div class="brand">
		        <span class="label fg-white">Category Name</span>
		        <!-- <span class="badge bg-orange">12</span> -->
		    </div>
    	</div>
    	<div class="tile bg-cyan double"></div>
    	<div class="tile "></div>
    	<div class="tile triple"></div>
    	<div class="tile "></div>
    	<br>
    	<div class="tile bg-cyan double"></div>
    	<div class="tile bg-green"></div>
    	<div class="tile triple"></div>
    	<div class="tile bg-green"></div>
    	<div class="tile double"></div>
    	<div class="tile bg-darkPink double">
    		<div class="tile-content icon">
		        <i class="icon-cart-2"></i>
		    </div>
		    <div class="brand">
		        <span class="label fg-white">Category Name</span>
		        <!-- <span class="badge bg-orange">12</span> -->
		    </div>
    	</div>
    	<div class="tile bg-cyan double"></div>
    	<div class="tile "></div>
    	<div class="tile triple"></div>
    	<div class="tile "></div>
	</div>
</body>
</html>