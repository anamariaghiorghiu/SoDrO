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
        <span class="add-list-form" style="display: none">
            <input id="add-text" type="text" name="list-name" placeholder="List Name" required>
            <button class="add-button">Add</button>
            <button class="cancel-button">Cancel</button>
        </span>
    

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
            $result="";
            if(!isset($_SESSION["userid"])){
            }
            else{
            $result = $lists->getAllLists($_SESSION["userid"]);
            }
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
         ?>
    </table>

    
</div>
<script>
    $(document).ready(function(){
            $(".add-list").click(function(){
                document.getElementById('add-text').value = "";
                $(".add-list-form").toggle();
            });
            $(".cancel-button").click(function(){
                $(".add-list-form").hide();
            });

        $(document).on({
                click: function(){
                    var listName = $("#add-text").val();
                    $.ajax({
                        url:'includes/create-list-inc.php',
                        method:'POST',
                        data:{listName:listName},
                        success:function(response){
                            $(".lists").html(response);
                            $(".add-list-form").hide();
                        }
                    });
                }
            }, ".add-button");

        $(document).on({
                keyup: function(e){
                    var code = e.which;
                    if(code == 13){
                        var listName = $("#add-text").val();
                        e.preventDefault();
                        $.ajax({  
                            url:'includes/create-list-inc.php',
                            method:'POST',
                            data:{listName:listName},
                            success:function(response){
                                $(".lists").html(response);
                                $(".add-list-form").hide();
                            }
                        });
                    }
                }
            }, "#add-text");

        $(document).on({
                click: function(){
                    var listId = $(this).val();
                    $.ajax({
                        url:'includes/remove-list.php',
                        method:'POST',
                        data:{listId:listId},
                        success:function(response){
                            $(".lists").html(response);
                        }
                    });
                }
            }, ".remove");

    });
</script>
<?php
 include_once 'footer.php';
?>