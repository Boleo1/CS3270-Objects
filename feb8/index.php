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

$skill1 = $_GET['skill1'];
$skill2 = $_GET['skill2'];
$skill3 = $_GET['skill3'];

// foreach ($users as $user) {
//     $applicant = [
//         'firstName' => $user['firstName'],
//         'lastName' => $user['lastName'],
//         'experience' => $user['experience'],
//         'level' => $user['level'],
//         'skills' => implode(', ', $user['skills']),
//     ];
// }
?>
<div class="inputForm">
<?php 
echo "JOB TITLE FORM FIELD input: " . $_GET['jobTitle'] ."<br>" . PHP_EOL;
echo "Position level input: " . $_GET['positionLevel'] . "<br>" . PHP_EOL;
echo "Experience level input: " . $_GET['experienceNeeded'] . "<br>" . PHP_EOL;
echo "========================". "<br>" . PHP_EOL;
echo "SKILL1: " .$_GET['skill1'] . "<br>" . PHP_EOL;
echo "SKILL2: " . $_GET['skill2'] . "<br>" . PHP_EOL;
echo "SKILL3: " . $_GET['skill3'] . "<br>" . PHP_EOL;

// test the get_users_by_skill function
echo "This should be the skills function: " . $applicantService->get_users_by_skill() . PHP_EOL;

// testing if we can return the num_of_applicants properly 
echo "Number of applicants in array: " . $applicantService->num_of_applicants() . PHP_EOL;
echo "<br>" ."========================". "<br>" . PHP_EOL;


// testing get_users_by_experience function.
print_r($applicantService->get_users_by_experience(6));
echo "<br>" ."========================". "<br>" . PHP_EOL;

?>
</div>