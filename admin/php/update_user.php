<?php
include_once('../../phpScripts/db_config.php');

if(isset($_POST["userid"])){
    if($_POST["action"]== 'Update'){
        $id = $_POST["userid"];
        $type = $_POST["usertype"];
        $status = $_POST["userstatus"];
        
        $query_UpdateUser->bind_param("sii", $id, $type, $status );
        $query_UpdateUser->execute();
    }
    if($_POST["action"]== 'Delete'){
        $id = $_POST["userid"];
        
        $query_DeleteUser->bind_param("s", $id );
        $query_DeleteUser->execute();
    }
}

?>