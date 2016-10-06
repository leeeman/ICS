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
	<div id="overlay">
		<table width="100%" height="100%">
			<tr>
				<td valign="middle">
					<img src="images/preloader.gif" />
					<p style="font-weight: 600; font-family: monospace; font-size: 20px; color: #777">Processing</p>
				</td>
			</tr>
		</table>
	</div>

	<nav class="navigation-bar dark">
	    <div class="navigation-bar-content">
	        <a href="#" class="element" onclick="location.reload();"><span class="icon-grid-view"></span> Dashboard</a>
	        <span class="element-divider"></span>

	        <a class="pull-menu" href="#"></a>
	        <ul class="element-menu">
	            <li>
	                <a class="dropdown-toggle" href="#">Stock</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                    <li><a href="#" class="nav" data-link="stock/manage-stock">Stock Register</a></li>
	                    <li><a href="#" class="nav" data-link="stock/new-stock">Add New Stock</a></li>
	                    <!-- 
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
	                    -->
	                </ul>
	            </li>
	            <li>
	                <a class="dropdown-toggle" href="#">Suppliers</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                    <li><a href="#" class="nav" data-link="supplier/manage-supplier">Manage Suppliers</a></li>
	                    <li><a href="#" class="nav" data-link="supplier/new-supplier">Add New Supplier</a></li>
	                </ul>
	            </li>

	            <li>
	                <a class="dropdown-toggle" href="#">Customer</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                    <li><a href="#" class="nav" data-link="customer/manage-customer">Manage Customers</a></li>
	                    <li><a href="#" class="nav" data-link="customer/new-customer">Add New Customer</a></li>
	                </ul>
	            </li>

	            <li>
	                <a class="dropdown-toggle" href="#">Purchase Order</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                	<li><a href="#" class="nav" data-link="order/manage-rfq">Manage RFQ</a></li>
	                	<li><a href="#" class="nav" data-link="order/new-rfq">New RFQ</a></li>
	                    <li><a href="#" class="nav" data-link="order/manage-purchase-orders">Purchase Order Register</a></li>
	                    <li><a href="#" class="nav" data-link="order/new-purchase-order">New Purchase Order</a></li>
	                    <li><a href="#" class="nav" data-link="order/goods-received">Goods Received</a></li>
	                </ul>
	            </li>

	            <li>
	                <a class="dropdown-toggle" href="#">Sale Order</a>
	                <ul class="dropdown-menu dark" data-role="dropdown">
	                    <li><a href="#" class="nav" data-link="order/manage-sale-orders">Sale Order Register</a></li>
	                    <li><a href="#" class="nav" data-link="order/new-sale-order">New Sale Order</a></li>
	                    <li><a href="#" class="nav" data-link="order/issue-products">Products Issued</a></li>
	                </ul>
	            </li>

	            <li>
	                <a class="dropdown-toggle" href="#">Accounts</a>
	            </li>

	            <li>
	                <a class="dropdown-toggle" href="#">Reports</a>
	            </li>
	        </ul>

	        <div class="no-tablet-portrait">
	            <div class="element place-right">
	                <a class="dropdown-toggle" href="#" style="padding-left: 10px">
	                    <span class="icon-cog"></span>
	                </a>
	                <ul class="dropdown-menu dark place-right" data-role="dropdown">
	                    <li><a href="#">General Settings</a></li>
	                    <li><a href="#">User Details</a></li>
	                    <li><a href="#">Access Control List</a></li>
	                </ul>
	            </div>
	            <button class="element image-button image-left place-right">
	            	User: {{session('username')}}
	            </button>
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

