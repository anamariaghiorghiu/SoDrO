<?php

if(isset($_POST['action'])){
	
	$productsView = new ProductsView();

    $acidic = $productsView->getProductsCountByCategory("Acidic");
    $alcoholic = $productsView->getProductsCountByCategory("Alcoholic");
    $dairy = $productsView->getProductsCountByCategory("Dairy");
    $coffee = $productsView->getProductsCountByCategory("Coffee");
    $energy = $productsView->getProductsCountByCategory("Energy");
    $natural = $productsView->getProductsCountByCategory("Natural");
    $syrups = $productsView->getProductsCountByCategory("Syrups");
    $teas = $productsView->getProductsCountByCategory("Teas");
    $waters = $productsView->getProductsCountByCategory("Water");

    $priceRange1 = $productsView->getProductsCountByPrice(0,5);
    $priceRange2 = $productsView->getProductsCountByPrice(5,10);
    $priceRange3 = $productsView->getProductsCountByPrice(10,20);
    $priceRange4 = $productsView->getProductsCountByPrice(20,30);
    $priceRange5 = $productsView->getProductsCountByPrice(30,40);
    $priceRange6 = $productsView->getProductsCountByPrice(40,50);
    $priceRange7 = $productsView->getProductsCountByPrice(50,10000);

    $carrefour = $productsView->getProductsCountByAvailability("Carrefour");
    $flux = $productsView->getProductsCountByAvailability("Flux");
    $kaufland = $productsView->getProductsCountByAvailability("Kaufland");
    $lidl = $productsView->getProductsCountByAvailability("Lidl");
    $megaImage = $productsView->getProductsCountByAvailability("Mega Image");
    $profi = $productsView->getProductsCountByAvailability("Profi");

    $dairyAlergen = $productsView->getProductsCountByRestrictions("Dairy");
    $nuts = $productsView->getProductsCountByRestrictions("Nuts");
    $soybeans = $productsView->getProductsCountByRestrictions("Soybeans");
    $sugar = $productsView->getProductsCountByRestrictions("Sugar");
    $wheat = $productsView->getProductsCountByRestrictions("Wheat");
}
else{
	echo "nah";
}