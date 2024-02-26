<?php
define('ABS_PATH', __DIR__);

require_once('./applicants.service.php');
$users = get_users_from_database();

include_once(ABS_PATH . '/views/head.view.php');
include_once(ABS_PATH . '/views/welcome.view.php');
include_once(ABS_PATH . '/views/form.view.php');
include_once(ABS_PATH . '/views/applicant-summary.view.php');
include_once(ABS_PATH . '/views/footer.view.php');

// if (isset($_GET)){
//     print_r($_GET);
// }

// echo '<pre>';
// print_r($users[0]);
// echo '</pre>';