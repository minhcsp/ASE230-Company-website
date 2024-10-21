<?php

$file = 'team.csv';

// Function to retrieve all team members
function getAllTeamMembers() {
    global $file;
    $team = [];
    
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $team[] = $data;
        }
        fclose($handle);
    }
    return $team;
}

// Function to retrieve a specific team member by ID
function getTeamMemberById($id) {
    $team = getAllTeamMembers();
    return isset($team[$id]) ? $team[$id] : null;
}

// Function to create a new team member
function createTeamMember($memberData) {
    global $file;
    $handle = fopen($file, 'a');
    fputcsv($handle, $memberData);
    fclose($handle);
}

// Function to update an existing team member
function updateTeamMember($id, $updatedData) {
    global $file;
    $team = getAllTeamMembers();
    $team[$id] = $updatedData;

    $handle = fopen($file, 'w');
    foreach ($team as $member) {
        fputcsv($handle, $member);
    }
    fclose($handle);
}

// Function to delete a team member
function deleteTeamMember($id) {
    global $file;
    $team = getAllTeamMembers();
    unset($team[$id]);

    $handle = fopen($file, 'w');
    foreach ($team as $member) {
        fputcsv($handle, $member);
    }
    fclose($handle);
}
?>
