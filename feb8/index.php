<?php
define('ABS_PATH', __DIR__);

require_once('./applicants.service.php');
$applicantService = new ApplicantService();
$users = $applicantService->get_users_from_database();


include_once(ABS_PATH . '/views/head.view.php');
include_once(ABS_PATH . '/views/welcome.view.php');
include_once(ABS_PATH . '/views/form.view.php');
include_once(ABS_PATH . '/views/applicant-summary.view.php');
include_once(ABS_PATH . '/views/footer.view.php');

foreach ($users as $user) {
    $applicant = [
        'firstName' => $user['firstName'],
        'lastName' => $user['lastName'],
        'experience' => $user['experience'],
        'level' => $user['level'],
        'skills' => implode(', ', $user['skills']),
    ];
}

?>