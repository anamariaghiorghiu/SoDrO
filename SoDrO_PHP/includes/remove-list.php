<?php 

session_start();

if(isset($_POST["listId"])){

	if(isset($_SESSION["userid"])){
		include "../classes/DatabaseHandler.php";
		include "../classes/Lists.php";
		include "../classes/ListsView.php";
		include "../classes/ListsController.php";

		$listsView = new ListsView();
		if(empty($listsView->getListById($_POST["listId"]))){
		}
		else{
			$listsController = new ListsController();
			$listsController->deleteListById($_POST["listId"]);
		}
        $result = $listsView->getAllLists($_SESSION["userid"]);
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
              <td><p>Please login first!</p></td>
              </tr>";
	}
}
else{
	header("location: ../lists.php?error=restrictedAcces");
	exit();
}