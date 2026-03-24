<?php

return [

    "name" => [
        "required" => "The name field is required.",
        "string" => "The name must be a valid string.",
        "min" => "The name must be at least :min characters.",
        "max" => "The name must not exceed :max characters.",
    ],

    "email" => [
        "required" => "Email is required.",
        "email" => "Please enter a valid email address.",
        "unique" => "This email already exists.",
    ],

    "phone" => [
        "required" => "Phone number is required.",
        "digits_between" => "Phone number must be between :min and :max digits.",
        "unique" => "This phone number already exists.",
    ],

    "password" => [
        "required" => "Password is required.",
        "string" => "Password must be a valid string.",
        "min" => "Password must be at least :min characters.",
        "max" => "Password must not exceed :max characters.",
        "confirmed" => "Password confirmation does not match.",
    ],

    "login" => [
        "required" => "failed email / phone is required to login",
    ]

];
