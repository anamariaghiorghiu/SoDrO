<?php 

	include "../classes/DatabaseHandler.php";
	include "../classes/Products.php";
	include "../classes/ProductsView.php";

	$products = new ProductsView();
	if(isset($_POST['action'])){
		$categories = "";
		$price = "";
		$availability = "";
		$restrictions = "";

		if(isset($_POST['categories'])){
			$categories=$_POST['categories'];
		}
		if(isset($_POST['price'])){
			$price=$_POST['price'];
		}
		if(isset($_POST['availability'])){
			$availability=$_POST['availability'];
		}
		if(isset($_POST['restrictions'])){
			$restrictions=$_POST['restrictions'];
		}
		if(isset($_POST['searchValue'])){
			$searchValue=$_POST['searchValue'];
		}
		$result = $products->getProductsByFilters($categories, $price, $availability, $restrictions, $searchValue);

		if(!empty($result)){
			for($i = 0; $i<count($result); $i++){
				echo "<div class='product'>";
				echo "<img src=".$result[$i]['imageSrc']." alt='product_img' class='product_img'>";
				echo "<p>".$result[$i]['name']."</p>";
				echo "<p>".$result[$i]['quantity']." L</p>";
				echo "<a class='details-button' href='./productPage.php?id=".$result[$i]['id']."' target='_blank' style='display:none'> <img src='images/details.png' id='details' class='details_size' alt='details'></a>";
				echo '</div>';
			}
		}
		else{
			echo '<p>No products found.</p>';
		}

	}
	else{
		header("location: ../products.php");
		exit();
	}
	