<?php include './functions/connect.php';

function get_information()
{
    $connection = connect();
    $sql = "SELECT * FROM informations";
    $result = mysqli_query($connection, $sql);
    $informations = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) {
            $informations[] = $row;
        }
    }
    return $informations;
    mysqli_close($connection);
}
