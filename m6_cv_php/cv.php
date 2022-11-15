<?php
$informations = json_decode(file_get_contents('./information.json'));
// add the new course to the all courses array.
if (isset($_POST['save_data'])) {
    $Full_Name = isset($_POST['full_name']) ? $_POST['full_name'] : null;
    $personal_skills = isset($_POST['personal_skills']) ? $_POST['personal_skills'] : null;
    $Job_Name = isset($_POST['job_name']) ? $_POST['job_name'] : null;
    $Email_address = isset($_POST['email']) ? $_POST['email'] : null;
    $Linked_In = isset($_POST['linked']) ? $_POST['linked'] : null;
    $Github = isset($_POST['github']) ? $_POST['github'] : null;
    $Phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $Intership = isset($_POST['intership']) ? $_POST['intership'] : null;
    $Summary = isset($_POST['summary']) ? $_POST['summary'] : null;
    $languages = isset($_POST['languages']) ? $_POST['languages'] : null;
    $technical_skills = isset($_POST['technical_skills']) ? $_POST['technical_skills'] : null;
    $Projects = isset($_POST['projects']) ? $_POST['projects'] : null;
    $Experiance = isset($_POST['experiance']) ? $_POST['experiance'] : null;
    $Education = isset($_POST['education']) ? $_POST['education'] : null;
    $Date_intership = isset($_POST['date_intership']) ? $_POST['date_intership'] : null;
    $image = $_FILES['upload'];
    $imageName   = $image['name'];
    $imageSize   = $image['size'];
    $imageTemp   = $image['tmp_name'];
    $imageType   = $image['type'];
    $imageAllowedExtentions = array("jpeg", "jpg", "png", "gif");
    $image = rand(0, 100000) . '_' . $imageName;
    move_uploaded_file($imageTemp, './assets/images/' . $image);
    $informations[] = (object) array(
        'id' => count($informations) + 1,
        'full_name' => $Full_Name,
        'Job_Name' => $Job_Name,
        'Email_address' => $Email_address,
        'Linked_In' => $Linked_In,
        'Github' => $Github,
        'Phone' => $Phone,
        'Intership' => $Intership,
        'Summary' => $Summary,
        'languages' => $languages,
        'technical_skills' => $technical_skills,
        'Projects' => $Projects,
        'Education' => $Education,
        'Experiance' => $Experiance,
        'personal_skills' => $personal_skills,
        'date_intership' => $Date_intership,
        'image' => $image
    );
    // convert the new array (courses) to JSON string.
    $json_courses = json_encode($informations);
    // rewrite the courses.json file with the new courses array. 
    file_put_contents('./information.json', $json_courses);
} else {
    die("Cannot save data");
}
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
            <h1><?= $Job_Name ?></h1>

            <div class="parent">
                <div class="colorsection">
                    <div class="cvimg">
                        <img class="img-s" src="./assets/images/<?= $image ?>" alt="My Image" width="250" height="250">
                    </div>
                    <div class="section1">
                        <div class="contact-me">
                            <h2 class="h-contact">Contact Me</h2>
                            <p><strong>Email : </strong><a href="mailto:<?= $Email_address ?>" target="_blank"><?= $Email_address ?></a></p>
                            <p><strong>Linkedin : </strong><a href="<?= $Linked_In ?>" target="_blank"><?= $Full_Name ?></a></p>
                            <p><strong>Github : </strong><a href="<?= $Github ?>" target="_blank"><?= $Full_Name ?></a></p>
                            <p><strong>Phone : </strong><a href="tel:<?php $Phone ?>" target="_blank"><?= $Phone ?></a></p>
                        </div>

                        <div class="technical">
                            <h2 class="h-technical">Technical Skills</h2>
                            <?php for ($i = 0; $i < count($technical_skills); $i++) { ?>

                                <p>- <?= strtoupper($technical_skills[$i]) ?></p>

                            <?php } ?>
                        </div>


                        <div class="personal">
                            <h2 class="h-personal">Personal Skills</h2>
                            <?php for ($i = 0; $i < count($personal_skills); $i++) { ?>
                                <p>- <?= strtoupper($personal_skills[$i]) ?> </p>
                            <?php } ?>
                        </div>

                        <div class="intership">
                            <h2 class="h-intership">Intership</h2>
                            <p>- <?php $Intership ?> <time class="time" datetime="10-10-2022"><?= $Date_intership ?></time> </p>
                        </div>
                    </div>
                </div>

                <div class="section2">
                    <div class="summary">
                        <h2 class="h-summary">Summary</h2>
                        <p class="p-summary"><?= $Summary ?></p>
                    </div>

                    <div class="project">
                        <h2 class="h-project">Projects</h2>
                        <h3>KHIDMATUK</h3>
                        <p class="p-project"><?= $Projects ?></p>
                    </div>

                    <div class="experiance">
                        <h2 class="h-experiance">Experiance</h2>
                        <p>- <?= $Experiance ?></p>
                    </div>


                    <div class="education">
                        <h2 class="h-education">Education</h2>
                        <p><?= $Education ?></p>
                    </div>

                    <div class="languages">
                        <h2 class="h-languages">Languages</h2>
                        <?php for ($i = 0; $i < count($languages); $i++) {  ?>
                            <p>- <?= $languages[$i] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </header>
</body>

</html>