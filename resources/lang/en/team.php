<?php

return [

   "menu" => [
        "label"   => "Manage Team",
        "setting" => "Team Settings",
        "create"  => "Create New Team",
        "switch"  => "Switch Teams",
   ],
   "label" => [
        "team" => [
            "name"        => "Team",
            "placeholder" => "Your team...",
        ],
        "detail" => [
            "name" => "Team details",
            "info" => "Create a new team to collaborate with others on projects.",
        ],
        "owner" => [
            "name"        => "Team owner",
            "placeholder" => "Your team owner...",
        ],
        "name" => [
            "name"        => "Team name",
            "placeholder" => "Your team name...",
            "info"        => "The team's name and owner information.",
        ],
        "member" => [
            "name"  => "Add Team Member",
            "info"  => "Add a new team member to your team, allowing them to collaborate with you.",
            "email" => "Please provide the email address of the person you would like to add to this team. The email address must be associated with an existing account.",
            "lists" => [
                "name" => "Team Members",
                "info" => "All of the people that are part of this team.",
            ],
        ],
        "delete" => [
            "name"        => "Delete Team",
            "info"        => "Permanently delete this team.",
            "description" => "Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain.",
        ],
    ],
    "alert" => [
        "leave_team" => [
            "name" => "Leave Team",
            "info" => "Are you sure you would like to leave this team?",
        ],
        "remove_team" => [
            "name" => "Remove Team Member",
            "info" => "Are you sure you would like to remove this person from the team?",
        ],
        "delete_team" => [
            "name" => "Delete Team",
            "info" => "Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted.",
        ],
    ]

];
