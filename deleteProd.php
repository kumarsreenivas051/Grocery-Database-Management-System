<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 3/10/18
 * Time: 6:02 PM
 *
 */
include ('connection.php');
function deleteRec(mysqli $db,$id)
{
    $sql = "delete from product where prodID='.$id.'";
    $result=$db->query($sql);
    if(!$result)
    {
       throw new Exception('Cannot delete record');
    }
}
$id = 1515;
deleteRec($db,$id);
?>