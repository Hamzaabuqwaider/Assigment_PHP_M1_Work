<?php
$informations = json_decode(file_get_contents('./information.json'));


$search_term = !empty($_GET['search']) ? $_GET['search'] : null;

foreach ($informations as $item) {
    if (strpos($item->full_name, $search_term) !== false) {
        $final_item[] = (object) $item;
    }
}
$encode_item = json_encode($final_item);
file_put_contents('./search.json', $encode_item);
$items = json_decode(file_get_contents('./search.json'));


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_Cv.css">
    <title>My Cv</title>
</head>

<body>
    <button class="button-1">
        <a href="./index.php">Create New Cv</a>
    </button>
    <header>
        <section>
            <h1><?= $items[0]->Job_Name ?></h1>

            <div class="parent">
                <div class="colorsection">
                    <div class="cvimg">
                        <img class="img-s" src="./assets/images/<?= $items[0]->image ?>" alt="My Image" width="250" height="250">
                    </div>
                    <div class="section1">
                        <div class="contact-me">
                            <h2 class="h-contact">Contact Me</h2>
                            <p><strong>Email : </strong><a href="mailto:<?= $items[0]->Email_address ?>" target="_blank"><?= $items[0]->Email_address ?></a></p>
                            <p><strong>Linkedin : </strong><a href="<?= $items[0]->Linked_In ?>" target="_blank"><?= $items[0]->full_name ?></a></p>
                            <p><strong>Github : </strong><a href="<?= $Github ?>" target="_blank"><?= $items[0]->full_name ?></a></p>
                            <p><strong>Phone : </strong><a href="tel:<?php $Phone ?>" target="_blank"><?= $items[0]->Phone ?></a></p>
                        </div>

                        <div class="technical">
                            <h2 class="h-technical">Technical Skills</h2>
                            <?php for ($i = 0; $i < count($items[0]->technical_skills); $i++) { ?>

                                <p>- <?= strtoupper($items[0]->technical_skills[$i]) ?></p>

                            <?php } ?>
                        </div>


                        <div class="personal">
                            <h2 class="h-personal">Personal Skills</h2>
                            <?php for ($i = 0; $i < count($items[0]->personal_skills); $i++) { ?>
                                <p>- <?= strtoupper($items[0]->personal_skills[$i]) ?> </p>
                            <?php } ?>
                        </div>

                        <div class="intership">
                            <h2 class="h-intership">Intership</h2>
                            <p>- <?php $items[0]->Intership ?> <time class="time" datetime="10-10-2022"><?= $items[0]->date_intership ?></time> </p>
                        </div>
                    </div>
                </div>

                <div class="section2">
                    <div class="summary">
                        <h2 class="h-summary">Summary</h2>
                        <p class="p-summary"><?= $items[0]->Summary ?></p>
                    </div>

                    <div class="project">
                        <h2 class="h-project">Projects</h2>
                        <h3>KHIDMATUK</h3>
                        <p class="p-project"><?= $items[0]->Projects ?></p>
                    </div>

                    <div class="experiance">
                        <h2 class="h-experiance">Experiance</h2>
                        <p>- <?= $items[0]->Experiance ?></p>
                    </div>


                    <div class="education">
                        <h2 class="h-education">Education</h2>
                        <p><?= $items[0]->Education ?></p>
                    </div>

                    <div class="languages">
                        <h2 class="h-languages">Languages</h2>
                        <?php for ($i = 0; $i < count($items[0]->languages); $i++) {  ?>
                            <p>- <?= $items[0]->languages[$i] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </header>
</body>

</html>