<?php
 	include_once 'header.php';
 	include "classes/DatabaseHandler.php";
	include "classes/Products.php";
	include "classes/ProductsView.php";
	include "classes/Lists.php";
	include "classes/ListsView.php";

	$productsView = new ProductsView();
	$products = $productsView->getProductById($_GET['id']);
	if($products == null){
		header("location: products.php?error=productNotFound");
		exit();
		}
?>
	<div class="productPageContent">
			<h2>Soft Drink Organizer</h2>
			<h3>a sip of ingeniosity.</h3>
			<div class="background">
				<h7>Product Name: <h8>
					<?php
					echo $products[0]['name'];
					?>
				</h8></h7>
				<div class="productData">
					<div class="imageBackground">
						<?php
						echo "<img src= '".$products[0]['imageSrc']."' id='pic' class='pic' alt='pic'>"
						?>
					</div>
					<ul class="data">
						<li><p>Category:
							<?php
							echo $products[0]['categories'];
							?>
						</p></li>
						<li><p>Price:
							<?php
							echo $products[0]['price'].' RON';
							?>
						</p></li>
						<li><p>Quantity:
							<?php
							echo $products[0]['quantity']." L (".($products[0]['quantity']*1000)." ml)";
							?>
						</p></li>
						<li><p>Restrictions(contains):
							<?php
							if($products[0]['restrictions'] != null){
								echo $products[0]['restrictions'][0];
							for($i=1;$i<count($products[0]['restrictions']);$i++)
								echo ", ".$products[0]['restrictions'][$i];
							}
							else{
								echo "None";
							}
							?>
						</p></li>
						<li><p>Availability:
							<?php
							if($products[0]['availability'] != null){
								echo $products[0]['availability'][0];
							for($i=1;$i<count($products[0]['availability']);$i++)
								echo ", ".$products[0]['availability'][$i];
							}
							else{
								echo "None";
							}
							?>
						</p></li>
						<li><p>Ingredients:<h8>
							<?php
							echo $products[0]['ingredients'].'.';
							?>
					</h8></p></li>
					</ul>
				</div>
			</div>
			<div class="addToList">
			<nav>
				<select class="slide"> 
					<?php
						$listsView = new ListsView();
						if(isset($_SESSION['userid'])){
							$lists = $listsView->getAllLists($_SESSION['userid']);
							if($lists==null){
								echo "<option value='0'>No lists available!<option>";
							}
							else{
							for($i=0;$i<count($lists);$i++)
								echo "<option value='".$lists[$i]['id']."'>".$lists[$i]['name']."</option>";
							}
						}
						else{
							echo "<option value='0'>Log in and add this product to your list!<option>";
						}

					?>
				</select>

				<label id="addToListButton"><span><h7>Add to list!</h7></span></label>
				<div id="ajaxResponse"></div>

			</nav> 
			
			</div>
			
	</div>

	<script>
		$(document).ready(function(){

			$(document).on({
				click: function(){
					var listId = $(".slide").val();
					const queryString = window.location.search;
					const urlParams = new URLSearchParams(queryString);
					const productId = urlParams.get('id')
					$.ajax({
					url:'includes/add-to-list.php',
					method:'POST',
					data:{listId:listId, productId:productId},
					success:function(response){
						$("#ajaxResponse").show();
						$("#ajaxResponse").html("<center>"+response+"<center>");
						$("#ajaxResponse").fadeOut(500);
					}
				});
				}
			}, "#addToListButton");
		});
	</script>
<?php
 include_once 'footer.php';
?>