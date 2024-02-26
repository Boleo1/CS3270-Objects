<?php
    $userVal = 1;
    $applicant = [
        'firstName' => $users[$userVal]['firstName'],
        'lastName' => $users[$userVal]['lastName'],
        'experienceLevel' => $users[$userVal]['experience'],
        'skills' => ($users[$userVal]['skills']),
    ]
?>

<div class="applicantSummary">
<?php
    echo "<h2>Applicant Summary</h2>";
    echo "This is the applicants first name: " . $applicant['firstName'] . "<br>";
    echo "This is the applicants last name: " . $applicant['lastName'] . "<br>";
    echo "This is the applicants experience level: " . $applicant['experienceLevel'] . "<br>";
    foreach($applicant['skills'] as $skill){
        echo $skill . " " . PHP_EOL;
    };
    
?>
</div>