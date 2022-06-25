<?php

    include "../classes/DatabaseHandler.php";
    include "../classes/Products.php";
    include "../classes/ProductsView.php";

if(isset($_POST['action'])){
	
	$productsView = new ProductsView();

    $result = $productsView->getAllProducts();
    $delimiter = ",";
    $filename = "export".".csv";

    $f = fopen('../export.csv', 'w');

    $fields = array('ID', 'NAME', 'PRICE', 'QUANTITY', 'CATEGORIES', 'INGREDIENTS', 'RESTRICTIONS', 'AVAILABILITY', 'IMAGE SOURCE');
    fputcsv($f, $fields, $delimiter);

    for($i=0;$i<count($result);$i++){
        $lineData = array($result[$i]['id'], $result[$i]['name'], $result[$i]['price'], $result[$i]['quantity'], $result[$i]['categories'], $result[$i]['ingredients'], json_encode($result[$i]['restrictions']), json_encode($result[$i]['availability']), $result[$i]['imageSrc']);
        fputcsv($f, $lineData, $delimiter);
    }

    fseek($f,0);

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename='".$filename."';");

}
else{
	header("location: ../homepageLogin.php?error=restrictedAcces");
    exit();
}