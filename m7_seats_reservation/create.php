<?php include 'header.php'; ?>

<div class="container my-5 ">
    <div class="d-flex justify-content-center align-items-centers">
        <form class="w-50" action="./store.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Seat Name</label>
                <input type="text" name="seat_name" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Seat Number</label>
                <input type="number" name="seat_num" min="1" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>