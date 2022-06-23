<?php
	include "classes/DatabaseHandler.php";
	include "classes/Products.php";
	include "classes/ProductsView.php";
 	include_once 'header.php';
?>
	<div class="productsContent">
		<form class="products-search" action='includes-products-search.php' method="POST">
			<input type="search" placeholder="Search by name of product...">
		</form>
		<div class="rows">
			<div class="filters">
				<div class="categ">
				<h6>Select category</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Acidic" id="categories">Acidic
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Alcoholic" id="categories">Alcoholic
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Dairy" id="categories">Dairy
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Coffee" id="categories">Coffee
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Energy" id="categories">Energy Drinks
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Natural" id="categories">Natural Drinks
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Syrups" id="categories">Syrups
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Teas" id="categories">Teas
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Water" id="categories">Waters
						</label>
					</li>
				</ul>
				</div>
				
				<div class="categ">
				<h6>Filter by price</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter0-5" id="price">0.5-5
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter5-10" id="price">5-10
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter10-20" id="price">10-20
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter20-30" id="price">20-30
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter30-40" id="price">30-40
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter40-50" id="price">40-50
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="priceFilter50+" id="price">50+
						</label>
					</li>
				</ul>
				</div>

				<div class="categ">
				<h6>Available in</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Carrefour" id="availability">Carrefour
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Flux" id="availability">Flux
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Kaufland" id="availability">Kaufland
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Lidl" id="availability">Lidl
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Mega Image" id="availability">Mega Image
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Profi" id="availability">Profi
						</label>
					</li>
				</ul>
				</div>

				<div class="categ">
				<h6>Alergens</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Dairy Alergen" id="restrictions">Dairy
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Nuts" id="restrictions">Nuts
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Soybeans" id="restrictions">Soybeans
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Sugar" id="restrictions">Sugar
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" class="product_check" value="Wheat" id="restrictions">Wheat
						</label>
					</li>
				</ul>
				</div>
			</div>
			<div class="products" id="result">
				<?php
					$products = new ProductsView();
					$result = $products->getProductsList();

					for($i = 0; $i<count($result); $i++){
						//print_r($result[$i]['name']);

						echo "<div class='product'>";
						echo "<img src=".$result[$i]['imageSrc']." alt='product_img' class='product_img'>";
						echo "<p>".$result[$i]['name']."</p>";
						echo "<p>".$result[$i]['quantity']." L</p>";
						echo '</div>';

					}
				?>
			</div>
		</div>
	</div>
		<script>
		$(document).ready(function(){

			$(".product_check").click(function(){

				var action = 'data';
				var categories = get_filter_text('categories');
				var price = get_filter_text('price');
				var availability = get_filter_text('availability');
				var restrictions = get_filter_text('restrictions');

				$.ajax({
					url:'includes/products-inc.php',
					method:'POST',
					data:{action:action, categories:categories, price:price, availability:availability, restrictions:restrictions},
					success:function(response){
						$("#result").html(response);
					}
				});

			});

			function get_filter_text(text_id){
				var filterData = [];
				$('#'+text_id+':checked').each(function(){
					filterData.push($(this).val());
				});
				return filterData;
			}
		});
	</script>
<?php
 include_once 'footer.php';
?>