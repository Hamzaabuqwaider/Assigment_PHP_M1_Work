<?php
session_start();
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "seats";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // var_dump($conn);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function get_users()
{
    $sql = "SELECT * FROM user";
    $result = mysqli_query(connect(), $sql);
    $users = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    return $users;
}

function get_user($id)
{
    $sql = "SELECT * FROM user where id = $id";
    $result = mysqli_query(connect(), $sql);
    return mysqli_fetch_assoc($result);
}

function seat($id)
{
    $sql = "SELECT * FROM seat where id = $id";
    $result = mysqli_query(connect(), $sql);
    return mysqli_fetch_assoc($result);
}


function Reg_user($firstname, $lastname, $email, $password)
{
    $connection = connect();
    $sql = "INSERT INTO user (first_name, last_name , email , password) VALUES ('$firstname', '$lastname', '$email', '$password')";
    $result = mysqli_query($connection, $sql);
}


function create_seat($seat_name, $seat_num)
{
    $connection = connect();
    $sql = "INSERT INTO seat (seat_name, seat_num) VALUES ('$seat_name', '$seat_num')";
    $result = mysqli_query($connection, $sql);
}

function update_resrve_seat($id, $user_id)
{
    $sql = "UPDATE seat SET avalible=1, user_id=$user_id WHERE id = $id";
    $result = mysqli_query(connect(), $sql);
}

function update_resrve_back($id)
{
    $sql = "UPDATE seat SET avalible=0, user_id=null WHERE id = $id";
    $result = mysqli_query(connect(), $sql);
}

function get_name_revserve($user_id)
{
    $sql = "SELECT user_id,user.first_name
    FROM seat
    INNER JOIN user
    ON seat.user_id=user.id WHERE seat.user_id = $user_id";
    $result = mysqli_query(connect(), $sql);
    return mysqli_fetch_assoc($result);
}

function delete_seat($id)
{
    $sql = "DELETE FROM seat WHERE id=$id";
    $result = mysqli_query(connect(), $sql);

    header('Location: ./home.php');
}

function get_seats_all()
{
    $sql = "SELECT * FROM seat ORDER BY seat_num asc";
    $result = mysqli_query(connect(), $sql);
    $seats = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $seats[] = $row;
        }
    }
    return $seats;
}


// function update_customer($firstname, $lastname, $email, $phone, $sales, $id)
// {
//     $sales = !empty($sales) ? (int) $sales : 0;
//     $sql = <<<EOD
//     UPDATE Customers
//         SET firstname='$firstname',
//             lastname='$lastname',
//             email='$email',
//             phone='$phone',
//             sales=$sales
//         WHERE id=$id;
//     EOD;
//     $result = mysqli_query(connect(), $sql);
// }
