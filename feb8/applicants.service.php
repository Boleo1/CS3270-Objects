<?php
//this file  mocks an applicanst service that is responsible for all methods relating to 
//fetching, filtering, and modifying applicants;

//this is a safety feature.  ABS_PATH is defined in the index.php file.  Once defined a global
//is available everywhere.  If someone gets to this file without having ABS_PATH set, it means
//they tried to access it directly.  Which is a no no.
if(!defined('ABS_PATH')){die;}

require_once('./db.service.php');

class Applicant {
	public string $first;
	public string $last;
	public int $experience;
	public string $level;
	public array $skills;

	public function __construct($first, $last, $experience, $level, $skills)
	{
		$this->first = $first;
		$this->last = $last;
		$this->experience = $experience;
		$this->level = $level;
		$this->skills = $skills;
	}
}

class ApplicantService {
	
	public function __construct(){
	}

	// Gets users from JSON file and returns them as an array //
	public function get_users_from_database():array{
		//simply returns an unfiltered list of users from applicants.json
		return get_users();
	}

// 4.) Create a method that gets a user by its level and returns all users from the corresponding array.
	public function get_users_by_level(string $level): array {
		$users = $this->get_users_from_database();
		return array_filter($users, fn($user) => $user->level === $level);
	}

// 5.) in applicant service create a method that takes in int $experience and returns an array of applicants who have at minimum the number of yearh experience passed in.
	public function get_users_by_experience(int $experience): array {
		$users = $this->get_users_from_database();
		return array_filter($users, fn($user) => $user->experience === $experience);
	}

// 6.) in applicant service create a method that takes array $skills as a parameter, and returns a list of applicants who have at least one of those skills.
	public function get_users_by_skill(array $skills){
		$users = $this->get_users_from_database();
		$displayUsers = array_filter($users, function($user) use ($skills){
			foreach ($skills as $skill) {
                if (in_array($skill, $user['skills'])) {
                    return true;
                }
            }
            return false;
        });
        return $displayUsers;
    }

// 7.) In applicant service create a method that takes in string $level, int $experience, and array $skills and returns a list of applicants who match those requirements.
	public function show_all_stats(string $level, int $experience, array $skills){
		$users = $this->get_users_from_database();
		$displayedUsers = array_filter($users, function($user) use ($level, $experience, $skills){
			$levelMatch = isset($user['level']) && strtolower($user['level']) === strtolower($level);

			$experienceMatch = isset($user['experience']) && $user['experience'] >= $experience;

			$skillsMatch = !empty(array_intersect($skills, $user['skills']));

			return $levelMatch && $experienceMatch && $skillsMatch;
		});
		return array_values($displayedUsers);
	}

// 8.) Currently the list of applicants is unsorted.  In applicant service make a method that will take in array $applicants and return a sorted list of applicants.
	public function sort_users(){
		$users = $this->get_users_from_database();
		usort($users, function($a, $b){
			$lastnameCompare = strcmp($a['lastName'], $b['lastName']);
			if($lastnameCompare !== 0) {
				return $lastnameCompare;
			}
			return strcmp($a['firstName'], $b['firstName']);
		});
		return $users;
	}
	
// 9.) In the form view add an optional field for number of applicants.  This field will be the number of applicants shown in the results.
	public function num_of_applicants(){
		$users = $this->get_users_from_database();
		$userCount = 0;
		foreach ($users as $user){
			if(isset($user["id"])){
				$userCount += 1;
			}
			else {
				break;
			}
		}
		return $userCount;
	}
}	