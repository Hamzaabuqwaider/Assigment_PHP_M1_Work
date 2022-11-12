<?php

$search_term = isset($_GET['s']) ? $_GET['s'] : null;

$courses = json_decode(file_get_contents('./api_data/courses.json'));
$final_courses = array();

if (!empty($search_term)) {
    foreach ($courses as $course) {
        if (strpos($course->description, $search_term) !== false) {
            $final_courses[] = $course;
        }
    }
}
