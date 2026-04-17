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
        "login.string" => "this failed must enter email or phone number alone"
    ],

    'otp' => [
        'required' => 'The OTP field is required',
        'digits' => 'The OTP must be exactly 6 digits',
        'exists' => 'The provided OTP is invalid or does not exist',
    ],

    "title_ar.required" => "العنوان بالعربية مطلوب",
    "title_ar.string" => "العنوان بالعربية يجب أن يكون نص",
    "title_ar.min" => "العنوان بالعربية يجب ألا يقل عن 3 أحرف",
    "title_ar.max" => "العنوان بالعربية يجب ألا يزيد عن 32 حرف",
    "title_ar.regex" => "العنوان بالعربية يجب أن يحتوي على حروف عربية ومسافات فقط",

    "title_en.required" => "العنوان بالإنجليزية مطلوب",
    "title_en.string" => "العنوان بالإنجليزية يجب أن يكون نص",
    "title_en.min" => "العنوان بالإنجليزية يجب ألا يقل عن 3 أحرف",
    "title_en.max" => "العنوان بالإنجليزية يجب ألا يزيد عن 32 حرف",
    "title_en.regex" => "العنوان بالإنجليزية يجب أن يحتوي على حروف إنجليزية ومسافات فقط",

    "description_ar.required" => "الوصف بالعربية مطلوب",
    "description_ar.string" => "الوصف بالعربية يجب أن يكون نص",
    "description_ar.min" => "الوصف بالعربية يجب ألا يقل عن 3 أحرف",
    "description_ar.max" => "الوصف بالعربية يجب ألا يزيد عن 255 حرف",
    "description_ar.regex" => "الوصف بالعربية يجب أن يحتوي على حروف عربية ومسافات فقط",

    "description_en.required" => "الوصف بالإنجليزية مطلوب",
    "description_en.string" => "الوصف بالإنجليزية يجب أن يكون نص",
    "description_en.min" => "الوصف بالإنجليزية يجب ألا يقل عن 3 أحرف",
    "description_en.max" => "الوصف بالإنجليزية يجب ألا يزيد عن 255 حرف",
    "description_en.regex" => "الوصف بالإنجليزية يجب أن يحتوي على حروف إنجليزية ومسافات فقط",

    "image.image" => "يجب أن يكون الملف صورة",
    "image.mimes" => "يجب أن تكون الصورة من النوع: png, jpg, jpeg, jif",


];
