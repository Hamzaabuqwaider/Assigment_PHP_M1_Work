<?php include 'header.php';
$seat_id = isset($_GET['id']) ? $_GET['id'] : null;
$seat_name = seat($seat_id);
$name_reserve = get_name_revserve((int) $seat_name['user_id']);
$session = (int) $_SESSION['user_id'];
?>
<div class="container my-5">
    <div class="row">
        <div class="col-3 ms-3 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $seat_name['seat_num'] ?></h5>
                    <h6 class="card-subtitle mb-4 text-muted text-center"><?= $seat_name['seat_name'] ?></h6>
                    <?php if (($seat_name['avalible'] == 1) && ($seat_name['user_id'] == $session)) { ?>
                        <a href="./reserve.php?id=<?= $seat_name['id'] ?>&action=back_reserve" class="card-link btn btn-danger">back reserved</a>
                    <?php } elseif (($seat_name['avalible'] == 1)) {  ?>
                        <div class="text-center">
                            <p class="text-danger">reserved by <?= $name_reserve['first_name'] ?></p>
                        </div>
                    <?php } else { ?>
                        <a href="./reserve.php?id=<?= $seat_name['id'] ?>&action=reserve" class="card-link btn btn-primary">reservation</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php' ?>