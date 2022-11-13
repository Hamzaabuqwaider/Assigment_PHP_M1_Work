<?php include('header.php'); ?>
<?php $result = json_decode(file_get_contents('./animal.json')); ?>
<div class="container p-5">
    <h1 class="text-center mb-5">Animals API App</h1>
    <div id="add-row" class="row">
        <?php foreach ($result as $item) : ?>
            <div class="col-3 m-5">
                <div class="card-img card m-auto" style="width: 18rem;">
                    <img id="a-img" src="<?= $item->image_link ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 id="a-name" class="card-title"><?= $item->name ?> </h5>
                        <p id="a-diet" class="card-text"><?= $item->diet ?></p>
                    </div>
                    <a href="animal.php?id=<?= $item->id ?>" class="a-hamza btn btn-primary">Click</a>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php include('footer.php'); ?>