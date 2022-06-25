<?php
    include_once 'header.php';
    include "classes/DatabaseHandler.php";
    include "classes/Products.php";
    include "classes/ProductsView.php";

    $productsView = new ProductsView();
    if(isset($_GET['chart'])){
        if($_GET['chart'] == 'category'){
            $acidic = $productsView->getProductsCountByCategory("Acidic");
            $alcoholic = $productsView->getProductsCountByCategory("Alcoholic");
            $dairy = $productsView->getProductsCountByCategory("Dairy");
            $coffee = $productsView->getProductsCountByCategory("Coffee");
            $energy = $productsView->getProductsCountByCategory("Energy");
            $natural = $productsView->getProductsCountByCategory("Natural");
            $syrups = $productsView->getProductsCountByCategory("Syrups");
            $teas = $productsView->getProductsCountByCategory("Teas");
            $waters = $productsView->getProductsCountByCategory("Water");
        }
        else if($_GET['chart'] == 'price'){
            $priceRange1 = $productsView->getProductsCountByPrice(0,5);
            $priceRange2 = $productsView->getProductsCountByPrice(5,10);
            $priceRange3 = $productsView->getProductsCountByPrice(10,20);
            $priceRange4 = $productsView->getProductsCountByPrice(20,30);
            $priceRange5 = $productsView->getProductsCountByPrice(30,40);
            $priceRange6 = $productsView->getProductsCountByPrice(40,50);
            $priceRange7 = $productsView->getProductsCountByPrice(50,10000);
        }
        else if($_GET['chart'] == 'availability'){
            $carrefour = $productsView->getProductsCountByAvailability("Carrefour");
            $flux = $productsView->getProductsCountByAvailability("Flux");
            $kaufland = $productsView->getProductsCountByAvailability("Kaufland");
            $lidl = $productsView->getProductsCountByAvailability("Lidl");
            $megaImage = $productsView->getProductsCountByAvailability("Mega Image");
            $profi = $productsView->getProductsCountByAvailability("Profi");
        }
        else if($_GET['chart'] == 'restrictions'){
            $dairyAlergen = $productsView->getProductsCountByRestrictions("Dairy");
            $nuts = $productsView->getProductsCountByRestrictions("Nuts");
            $soybeans = $productsView->getProductsCountByRestrictions("Soybeans");
            $sugar = $productsView->getProductsCountByRestrictions("Sugar");
            $wheat = $productsView->getProductsCountByRestrictions("Wheat");
        }
        else{
            header("location: homePageLogin.php");
            exit();
        }
    }
    else{
        header("location: homePageLogin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SoDrO</title>
	<link rel="stylesheet" href="style.css">
	<title></title>
	<script src="jquery.js"></script>

<body>
    <div class="statisticContent">
        <h2>Soft Drinks Organizer</h2>
        <h3>a sip of ingeniosity.</h3>
        <div class="background">
            <div class="pie-charts">
                <div class="pieID--micro-skills pie-chart-wrapper">
                    <?php
                    if($_GET['chart'] == 'category'){
                        echo "<p>Statistic of chosen products so far by category</p>";
                    }
                    else if($_GET['chart'] == 'price'){
                        echo "<p>Statistic of chosen products so far by price</p>";
                    }
                    else if($_GET['chart'] == 'availability'){
                        echo "<p>Statistic of chosen products so far by availability</p>";
                    }
                    else if($_GET['chart'] == 'restrictions'){
                        echo "<p>Statistic of chosen products so far by restrictions</p>";
                    }
                    ?>
                    <div class="pie-chart">
                        <div class="pie-chart__pie">
                            
                        </div>
                        <ul class="pie-chart__legend">
                            <?php
                            if($_GET['chart'] == 'category'){
                            echo "<li>Acidic: <span>".$acidic['count']."</span></li>
                                <li>Alcoholic: <span>".$alcoholic['count']."</span></li>
                                <li>Dairy: <span>".$dairy['count']."</span></li>
                                <li>Coffee: <span>".$coffee['count']."</span></li>
                                <li>Energy Drinks: <span>".$energy['count']."</span></li>
                                <li>Natural Drinks: <span>".$natural['count']."</span></li>
                                <li>Syrups: <span>".$syrups['count']."</span></li>
                                <li>Teas: <span>".$teas['count']."</span></li>
                                <li>Waters: <span>".$waters['count']."</span></li>";
                            }
                            else if($_GET['chart'] == 'price'){
                            echo "<li>Between 0 and 5: <span>".$priceRange1['count']."</span></li>
                                <li>Between 5 and 10: <span>".$priceRange2['count']."</span></li>
                                <li>Between 10 and 20: <span>".$priceRange3['count']."</span></li>
                                <li>Between 20 and 30: <span>".$priceRange4['count']."</span></li>
                                <li>Between 30 and 40: <span>".$priceRange5['count']."</span></li>
                                <li>Between 40 and 50: <span>".$priceRange6['count']."</span></li>
                                <li>Over 50: <span>".$priceRange7['count']."</span></li>";
                            }
                            else if($_GET['chart'] == 'availability'){
                            echo "<li>Carrefour: <span>".$carrefour['count']."</span></li>
                                <li>Flux: <span>".$flux['count']."</span></li>
                                <li>Kaufland: <span>".$kaufland['count']."</span></li>
                                <li>idl: <span>".$lidl['count']."</span></li>
                                <li>Mega Image: <span>".$megaImage['count']."</span></li>
                                <li>Profi: <span>".$profi['count']."</span></li>";
                            }
                            else if($_GET['chart'] == 'restrictions'){
                            echo "<li>Dairy: <span>".$dairyAlergen['count']."</span></li>
                                <li>Nuts: <span>".$nuts['count']."</span></li>
                                <li>Soybeans: <span>".$soybeans['count']."</span></li>
                                <li>Sugar: <span>".$sugar['count']."</span></li>
                                <li>Wheat: <span>".$wheat['count']."</span></li>";
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="chart.js"></script>
</body>
</html>

<?php
 include_once 'footer.php';
?>