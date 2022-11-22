<?php
session_start();
include './gat_data.php';
$data = get_information();
?>

<!DOCTYPE html>
<html lang="en">

<head>



    <div class="my-5 d-flex justify-content-center align-items-center">
        <?php if (!empty($_SESSION) && isset($_SESSION['insert'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['insert'] ?>
            </div>
        <?php
            unset($_SESSION['insert']);
        endif; ?>


        <div class="my-5 d-flex justify-content-center align-items-center">
            <?php if (!empty($_SESSION) && isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error'] ?>
                </div>
            <?php
                unset($_SESSION['error']);
            endif; ?>


            <title>Home Work Tabel & Form </title>
            <style>
                table,
                th,
                td {
                    border: 1px solid;
                }

                input,
                textarea {
                    border: 2px solid red;
                    border-radius: 4px;
                }

                th {
                    background-color: dimgrey;
                }
            </style>
</head>

<body>
    <section>
        <form action="./store.php" method="POST">
            <fieldset>
                <legend>Registration From</legend>
                <div>
                    <label for="f_name">First Name</label>
                    <input type="text" name="first_name" placeholder="Write the First name">
                </div>
                <br>
                <div>
                    <label for="l_name">Last Name</label>
                    <input type="text" name="last_name" placeholder="Write the Last Name">
                </div>
                <br>

                <div>
                    <label for="u_email">Email</label>
                    <input type="email" name="email" placeholder="Write the Email">
                </div>
                <br>

                <div>
                    <label for="u_password">Password</label>
                    <input type="password" name="password" placeholder="write the password">
                </div>
                <br>

                <div>
                    <label for="u_birth">Date of Birth</label>
                    <input type="date" name="birth" placeholder="Add Birth date">
                </div>
                <br>

                <div>
                    <label for="u_color">Color</label>
                    <label for="">Whate is the favorite color</label>
                    <input type="color" name="color" id="u_color">
                </div>
                <br>

                <div>
                    <label for="u_age">Age</label>
                    <input type="number" name="age" min="18" max="50" placeholder="Add your age">
                </div>
                <br>

                <div>
                    <div>
                        <label for="gender_All">Gender : </label>
                    </div>

                    <div>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="Male">
                    </div>

                    <div>
                        <label for="fmale">Fmale</label>
                        <input type="radio" name="gender" value="Fmale">
                    </div>

                    <br>
                    <div>
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" placeholder="078">
                    </div>
                    <br>
                    <div>
                        <label for="bio">Bio</label>
                        <textarea name="bio"></textarea>
                    </div>

            </fieldset>
            <button type="submit" class="btn btn-primary">Click</button>
        </form>
    </section>

    <hr>
    <section>
        <table width="60%" height="50%">
            <thead>
                <tr>
                    <th><i>id</i></th>
                    <th><i>First Name</i></th>
                    <th><i>Last Name</i></th>
                    <th><i>Email</i></th>
                    <th><i>Password</i></th>
                    <th><i>Date Of Birth</i></th>
                    <th><i>Color</i></th>
                    <th><i>Age</i></th>
                    <th><i>gender</i></th>
                    <th><i>Phone</i></th>
                    <th><i>Bio</i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $info) : ?>
                    <tr>
                        <td><?= $info->id ?></td>
                        <td><?= $info->first_name ?></td>
                        <td><?= $info->last_name ?></td>
                        <td><?= $info->email ?></td>
                        <td><?= $info->password ?></td>
                        <td><?= $info->data_birth ?></td>
                        <td><?= $info->color ?></td>
                        <td><?= $info->age ?></td>
                        <td><?= $info->gender ?></td>
                        <td><?= $info->phone ?></td>
                        <td><?= $info->bio ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>

</html>

<?php
