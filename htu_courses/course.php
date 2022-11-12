<?php include './header.php';
$course_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($course_id)) :
    $courses = json_decode(file_get_contents('./api_data/courses.json'));
    $courses_arr = array_filter($courses, function ($item) use ($course_id) {
        return $item->id == $course_id;
    });

    // $arr = [1, 2, 3, 4, 5, 6];
    // $filtered_arr = array_filter($arr, function ($num) {
    //     return $num % 2 == 0;
    // });
    // foreach ($courses as $course) {
    //     if ($course->id == $course_id) {
    //         $courses_arr[] = $course;
    //     }
    // }
    $course = !empty($courses_arr) ? $courses_arr[array_key_first($courses_arr)] : null;
    if (empty($course))
        die('you are trying to access a course that is not existed');
?>
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col">
                <img src="./assets/images/c1.jpeg" alt="Course">
            </div>
            <div class="col">
                <h2><?= $course->title ?></h2>
                <p><?= $course->description ?></p>
                <p><?= $course->featured ? "Featured Course" : "Unfeatured Course"; ?></p>
            </div>
        </div>
    </div>
<?php

else :
    echo "There is no course with this id, or id is empty";
endif;
include './footer.php'; ?>