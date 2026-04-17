<?php

return [

    "name" => [
        "required" => "حقل الاسم مطلوب.",
        "string" => "يجب أن يكون الاسم نصًا صحيحًا.",
        "min" => "يجب ألا يقل الاسم عن :min أحرف.",
        "max" => "يجب ألا يزيد الاسم عن :max حرف.",
    ],

    "email" => [
        "required" => "البريد الإلكتروني مطلوب.",
        "email" => "يرجى إدخال بريد إلكتروني صحيح.",
        "unique" => "هذا البريد الإلكتروني مستخدم بالفعل.",
    ],

    "phone" => [
        "required" => "رقم الهاتف مطلوب.",
        "digits_between" => "يجب أن يكون رقم الهاتف بين :min و :max رقم.",
        "unique" => "رقم الهاتف مستخدم بالفعل.",
    ],

    "password" => [
        "required" => "كلمة المرور مطلوبة.",
        "string" => "يجب أن تكون كلمة المرور نصًا.",
        "min" => "يجب ألا تقل كلمة المرور عن :min أحرف.",
        "max" => "يجب ألا تزيد كلمة المرور عن :max حرف.",
        "confirmed" => "تأكيد كلمة المرور غير متطابق.",
    ],

    "login" => [
        "required" => "يجب ادخال حقل الايميل او رقم الهاتف لتتمكن من تسجيل الدخول",
        'login.string' => 'يجب ادخال ايميل او رقم هاتف فقط لا يسمح ب اي شيئ اخر'
    ],

    "otp" => [
        "required" => 'حقل رمز التحقق مطلوب',
        'digits' => 'يجب أن يتكون رمز التحقق من 6 أرقام',
        'exists' => 'رمز التحقق غير صحيح أو غير موجود',
    ],

    
    "title_ar.required" => "Arabic title is required",
    "title_ar.string" => "Arabic title must be a string",
    "title_ar.min" => "Arabic title must be at least 3 characters",
    "title_ar.max" => "Arabic title must not exceed 32 characters",
    "title_ar.regex" => "Arabic title must contain only Arabic letters and spaces",

    "title_en.required" => "English title is required",
    "title_en.string" => "English title must be a string",
    "title_en.min" => "English title must be at least 3 characters",
    "title_en.max" => "English title must not exceed 32 characters",
    "title_en.regex" => "English title must contain only English letters and spaces",

    "description_ar.required" => "Arabic description is required",
    "description_ar.string" => "Arabic description must be a string",
    "description_ar.min" => "Arabic description must be at least 3 characters",
    "description_ar.max" => "Arabic description must not exceed 255 characters",
    "description_ar.regex" => "Arabic description must contain only Arabic letters and spaces",

    "description_en.required" => "English description is required",
    "description_en.string" => "English description must be a string",
    "description_en.min" => "English description must be at least 3 characters",
    "description_en.max" => "English description must not exceed 255 characters",
    "description_en.regex" => "English description must contain only English letters and spaces",

    "image.image" => "The file must be an image",
    "image.mimes" => "The image must be of type: png, jpg, jpeg, jif",


];
