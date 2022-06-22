<?php 

	include "../classes/DatabaseHandler.php";
	include "../classes/Products.php";
	include "../classes/ProductsView.php";

	$products = new ProductsView();

	$result = $products->getProductsList();
	print_r($result);