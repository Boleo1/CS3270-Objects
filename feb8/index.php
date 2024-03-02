<?php
define('ABS_PATH', __DIR__);
require_once('./applicants.service.php');

$applicantService = new ApplicantService();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['jobTitle'])) {
    $level = $_GET['positionLevel'] ?? '';
    $experienceNeeded = $_GET['experienceNeeded'] ?? 0;
    $skills = [
        $_GET['skill1'] ?? null,
        $_GET['skill2'] ?? null,
        $_GET['skill3'] ?? null,
    ];

    // Filter out empty skill entries
    $skills = array_filter($skills, function($skill) { return !empty($skill); });

    // Fetch and filter applicants based on the form criteria
    $applicants = $applicantService->show_all_stats($level, $experienceNeeded, $skills);
} else {
    // If the form hasn't been submitted, fetch all applicants or a default set
    $applicants = $applicantService->get_users_from_database();
}
$maxApplicants = isset($_GET['maxApplicants']) && $_GET['maxApplicants'] ? (int)$_GET['maxApplicants'] : null;

if ($maxApplicants > 0) {
    $applicants = array_slice($applicants, 0, $maxApplicants);
}
include_once(ABS_PATH . '/views/head.view.php');
include_once(ABS_PATH . '/views/welcome.view.php');
include_once(ABS_PATH . '/views/form.view.php');
include_once(ABS_PATH . '/views/applicant-summary.view.php');
include_once(ABS_PATH . '/views/footer.view.php');
?>