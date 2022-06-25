<?php

session_start();

if(isset($_POST["listName"])){
	if(isset($_SESSION["userid"])){

		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsController.php";
		include "../classes/ListsView.php";

        $listsController = new ListsController();
        if($_POST["listName"] != null){
    		$listsController->createList($_POST["listName"], $_SESSION["userid"]);
        }
        else{
            $listsController->createList("Unnamed list", $_SESSION["userid"]);
        }
        $lists=new ListsView();
        $result = $lists->getAllLists($_SESSION["userid"]);
        if($result == null){
            echo "<tr>
                <td><p>No lists to show, create a list by pressing the 'Add new list' button.</p></td>
                </tr>";
        }
        else{
            for($i=0;$i<count($result);$i++){
                echo "<tr>
                    <td> ".($i+1)." </td>
                    <td> ".$result[$i]['name']." </td>
                    <td> 
                        <form method='get' action='./viewList.php'>
                            <button type='submit' name='id' value=".$result[$i]['id']." class='view'>View</button>
                        </form>
                    </td>
                    <td>
                    <span>
                        <button value='".$result[$i]['id']."' class='remove'>Remove</button>
                     </span>
                </td>
                    </tr>";
            }
         }
	}
	else{
		echo "<tr>
		      <td><p>Please login before attempting to create a list!</td>
		      </tr>";
	}
}
else {
	if(!isset($_SESSION["userid"])){
		header("location: ../lists.php?error=notLoggedIn");
		exit();
	}
	header("location: ../lists.php?error=restrictedAcces");
	exit();
}