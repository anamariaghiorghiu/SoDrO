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
							<input type="checkbox" value="Acidic" id="acidic">Acidic
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Alcoholic" id="alcoholic">Alcoholic
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Dairy" id="dairy">Dairy
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Coffee" id="coffee">Coffee
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Energy" id="energy">Energy Drinks
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Natural" id="natural">Natural Drinks
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Syrups" id="syrups">Syrups
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Teas" id="teas">Teas
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Water" id="water">Waters
						</label>
					</li>
				</ul>
				</div>
				
				<div class="categ">
				<h6>Filter by price</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter0-5" id="priceFilter0-5">0.5-5
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter5-10" id="priceFilter5-10">5-10
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter10-20" id="priceFilter10-20">10-20
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter20-30" id="priceFilter20-30">20-30
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter30-40" id="priceFilter30-40">30-40
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter40-50" id="priceFilter40-50">40-50
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="priceFilter50+" id="priceFilter50+">50+
						</label>
					</li>
				</ul>
				</div>

				<div class="categ">
				<h6>Available in</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Carrefour" id="carrefour">Carrefour
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Flux" id="flux">Flux
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Kaufland" id="kaufland">Kaufland
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Lidl" id="lidl">Lidl
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Mega Image" id="megaImage">Mega Image
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Profi" id="profi">Profi
						</label>
					</li>
				</ul>
				</div>

				<div class="categ">
				<h6>Alergens</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Dairy Alergen" id="dairyAlergen">Dairy
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Nuts" id="nuts">Nuts
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Soybeans" id="soybeans">Soybeans
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Sugar" id="sugar">Sugar
						</label>
					</li>
					<li class="list-group-item">
						<label>
							<input type="checkbox" value="Wheat" id="wheat">Wheat
						</label>
					</li>
				</ul>
				</div>
			</div>
			<div class="products">
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
<?php
 include_once 'footer.php';
?>