<?php
    include "classes/DatabaseHandler.php";
    include "classes/Lists.php";
    include "classes/ListsView.php";
    include_once 'header.php';
?>

<div class="lists-content">
    <h2>Soft Drinks Organizer</h2>
    <h3>a sip of ingeniosity.</h3>
        <button class="add-list"> Add new list </button>
        <div class="create-new-list">
        <form class="add-list-form" action="includes/create-list-inc.php" method="post" style="display: none">
            <input id="add-text" type="text" name="list-name" placeholder="List Name..." required>
            <button class="add-button" name="add-button" type="submit">Add</button>
            <button id="cancel-button" type="submit">Cancel</button>
        </form>
    

    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "notLoggedIn"){
                echo "<p> Please log in before you create a list! </p>";
                }
            else if($_GET["error"] == "stmtFailed"){
                echo "<p> Something went wrong, try again! </p>";
                }

        }
    ?>
    </div>
    <table class="lists"> 
        <?php
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
                        <td> <a class='view' href='./viewList.php?id=".$result[$i]['id']."'> View</td>
                        <td> <a class='remove' href='includes/remove-list.php?id=".$result[$i]['id']."'>Remove</td>
                        </tr>";
                }
             }
         ?>
    </table>

    
</div>
<script>
    $(document).ready(function(){
        $(".add-list").click(function(){
            document.getElementById('add-text').value = "";
            $(".add-list-form").toggle();
        });
        $("#cancel-button").click(function(){
            $(".add-list-form").hide();
        })
    });
</script>
<?php
 include_once 'footer.php';
?>