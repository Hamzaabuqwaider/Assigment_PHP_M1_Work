<?php include 'header.php';
?>
<div class="container my-5">
    <div class="row">
        <?php foreach (get_seats_all() as $seat) { ?>
            <div class="col-3 ms-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $seat['seat_num'] ?></h5>
                        <h6 class="card-subtitle mb-4 text-muted text-center"><?= $seat['seat_name'] ?></h6>
                        <a href="./seat.php?id=<?= $seat['id']; ?>" class="card-link btn btn-primary">click</a>
                        <?php if ($user_session['is_admin'] == 1) : ?>
                            <a href="./delete.php?id=<?= $seat['id']; ?>" class="card-link btn btn-danger">Delete</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php include 'footer.php' ?>