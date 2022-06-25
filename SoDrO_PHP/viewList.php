<?php
    include_once 'header.php';
    include "classes/DatabaseHandler.php";
    include "classes/Lists.php";
    include "classes/ListsView.php";

    $listsView = new ListsView();

    if(!isset($_SESSION['userid'])){
        header("location: login.php?error=notLoggedIn");
        exit();
    }

    if(isset($_GET['id'])){
        $result = $listsView->getListProductsById($_GET['id']);
        if($result == null){
            header("location: lists.php?error=listDoesNotExist");
            exit();
        }
        else{
        }
    }
    else{
        header("location: lists.php?error=restrictedAcces");
        exit();
    }

?>
<div class="viewListContent">
        <h2>Soft Drinks Organizer</h2>
        <h3>a sip of ingeniosity.</h3>
        <div class="replaceName">
            <ul>
                <?php
                echo "<li> <h9>List Name:</h9><h10> <input type='text' id='nameOfTheList' name='nameOfTheList' value='".$result[0]['listName']."' readonly></h10> <button id='editName'>Edit</button><button id='saveEdit' style='display:none' value='".$_GET['id']."'>Save</button><button id='cancelEdit' style='display:none'>Cancel</button></li>

                    <li> <h9>Created on:</h9><h10>".$result[0]['createdAt']."</h10></li>"
                ?>
            </ul>
        </div>
        <div class="background">

            <?php
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
                                    <button class='plus-button'value='".$result[$i]['productId']."'> + </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>";
            }
            ?>

        </div>
    </div>
    <script src="script.js"></script>
    <script>
        $(document).ready(function(){

            var oldVal=$("input:text#nameOfTheList").val();
            var readOnly=true;

            $(document).on({
                click: function(){
                    $("#nameOfTheList").removeAttr("readonly");
                    readOnly=false;
                    oldVal = $("input:text#nameOfTheList").val();
                     $("input:text#nameOfTheList").val("");
                     $("input:text#nameOfTheList").attr("placeholder","Edit here...");
                     $("#saveEdit").show();
                     $("#cancelEdit").show();
                     $("#editName").hide();
                }
            }, "#editName");

            $(document).on({
                click: function(){
                    $("#nameOfTheList").attr("readonly", true);
                    readOnly=true;
                    $("input:text#nameOfTheList").val(oldVal);
                    $("#saveEdit").hide();
                    $("#cancelEdit").hide();
                    $("#editName").show();
                }
            }, "#cancelEdit");

            $(document).on({
                click: function(){
                    var listId = $(this).val();
                    var newListName = $("input:text#nameOfTheList").val();
                    if(newListName == ""){
                        $("input:text#nameOfTheList").val("Unnamed List");
                    }
                    $.ajax({
                        url:'includes/update-list-name-inc.php',
                        method:'POST',
                        data:{listId:listId, newListName:newListName},
                        success:function(response){
                            $("#saveEdit").hide();
                            $("#cancelEdit").hide();
                            $("#editName").show();
                            $("#nameOfTheList").attr("readonly", true);
                            $("input:text#nameOfTheList").removeAttr("placeholder");
                        }
                    });
                }
            }, "#saveEdit");

            $(document).on({
                keyup: function(e){
                    var code = e.which;
                    if(code == 13){
                        //e.preventDefault();
                        var listId = $(this).val();
                        var newListName = $("input:text#nameOfTheList").val();
                        if(newListName == ""){
                        $("input:text#nameOfTheList").val("Unnamed List");
                        }
                        if(readOnly==false) {
                            $.ajax({
                                url:'includes/update-list-name-inc.php',
                                method:'POST',
                                data:{listId:listId, newListName:newListName},
                                success:function(response){
                                    $("#saveEdit").hide();
                                    $("#cancelEdit").hide();
                                    $("#editName").show();
                                    $("#nameOfTheList").attr("readonly", true);
                                    readOnly=true;
                                    $("input:text#nameOfTheList").removeAttr("placeholder");
                                }
                            });
                        }
                    }
                }
            }, "input:text#nameOfTheList");

            $(document).on({
                click: function(){
                    var listItemsId = $(this).val();
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    const listId = urlParams.get('id');
                    $.ajax({
                        url:'includes/remove-list-item-inc.php',
                        method:'POST',
                        data:{listItemsId:listItemsId, listId:listId},
                        success:function(response){
                            $(".background").html(response);
                        }
                    });
                }
            }, ".minus-button");

            $(document).on({
                click: function(){
                    var productId = $(this).val();
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    const listId = urlParams.get('id');
                    $.ajax({
                        url:'includes/add-list-item-inc.php',
                        method:'POST',
                        data:{listId:listId, productId:productId},
                        success:function(response){
                            $(".background").html(response);
                        }
                    });
                }
            }, ".plus-button");

        });
    </script>

<?php
 include_once 'footer.php';
?>