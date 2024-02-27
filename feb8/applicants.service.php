<?php
//this file  mocks an applicanst service that is responsible for all methods relating to 
//fetching, filtering, and modifying applicants;

//this is a safety feature.  ABS_PATH is defined in the index.php file.  Once defined a global
//is available everywhere.  If someone gets to this file without having ABS_PATH set, it means
//they tried to access it directly.  Which is a no no.
if(!defined('ABS_PATH')){die;}

require_once('./db.service.php');

function get_users_from_database():array{
	//simply returns an unfiltered list of users from applicants.json
	return get_users();
}

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
	private $dbService;

	public function __construct(DBService $dbService)
	{
		$this->dbService = $dbService;
	}

	public function get_users_from_database(): array {
		return $this->dbService->get_users();
	}
	public function get_users_by_level(string $level): array {
		$users = $this->get_users_from_database();
		return array_filter($users, fn($user) => $user->level === $level);
	}
}