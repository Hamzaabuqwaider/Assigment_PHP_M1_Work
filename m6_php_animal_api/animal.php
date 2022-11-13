<?php include('header.php'); ?>

<?php
$animal_id = isset($_GET['id']) ? $_GET['id'] : null;
$xx = json_decode(file_get_contents('./animal.json'));
if (!empty($animal_id)) {
    $animal_arr = array_filter($xx, function ($item) use ($animal_id) {
        return $item->id == $animal_id;
    });

    $animal = !empty($animal_arr) ? $animal_arr[array_key_first($animal_arr)] : null;
    if (empty($animal))
        die('you are trying to access a course that is not existed');
?>
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col">
                <img src="<?= $animal->image_link ?>" alt="Course">
            </div>
            <div class="col">
                <h2><?= $animal->name ?></h2>
                <p><?= $animal->diet ?></p>
                <p><?= $animal->habitat ?></p>
            </div>
        </div>
    </div>
<?php
} else {
    echo 'No such id';
}
?>

<?php include('footer.php'); ?>