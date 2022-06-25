<?php

session_start();
if(isset($_POST["listItemsId"]))
{
		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsView.php";
		include "../classes/ListsController.php";

		$lists = new ListsController();
		$lists->deleteListItemById($_POST["listItemsId"]);

		$listsView = new ListsView();
		$result = $listsView->getListProductsById($_POST["listId"]);

		for($i=0;$i<count($result);$i++){
            $count = $listsView->getItemCountByIds($result[$i]['listId'], $result[$i]['productId']);
            $listItemsId = $listsView->getListItemsId($result[$i]['listId'], $result[$i]['productId']);
            echo 
            "<div class='list'>
                <h11>Product Name:<h11>".$result[$i]['productName']."</h10></h9>
                <div class='listDisplay'>
                    <div class='infoList'>
                        <div class='imageBackground'>
                            <img src='".$result[$i]['imageSrc']."' alt='pic' id='pic' class='pic'>
                        </div>
                        <ul class='data'>
                                <li><h9>Quantity:</h9><h10>".$result[$i]['quantity']." L (".($result[$i]['quantity']*1000)." ml)</h10></li>
                                <li><h9>Price:</h9><h10>".$result[$i]['price']." RON</h10></li>
                        </ul>
                    </div>
                    <div class='product-numbers'>
                        <ul>
                            <li>
                                <input type='text' id='nr' name='nr' value='".$count['count']."' readonly>
                                <button class='minus-button' value='".$listItemsId['id']."'> - </button>
                                <button class='plus-button'value='".$listItemsId['id']."'> + </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>";
        }
}
else{
	if(!isset($_SESSION["userid"])){
		header("location: ../login.php?error=notLoggedIn");
		exit();
	}
	else{
	header("location: ../viewList.php?id=".$_POST["listId"]."?error=restrictedAcces");
	exit();
	}
}
