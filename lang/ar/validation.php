<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute يجب ان يكون مقبول.',
    'accepted_if' => ':attribute يجب ان يكون مقبول عندما :other يكون :value.',
    'active_url' => ':attribute يجب ان يكون رابط صحيح.',
    'after' => ':attribute يجب ان يكون تاريخ بعد :date.',
    'after_or_equal' => ':attribute يجب ان يكون تاريخ بعد او يساوي :date.',
    'alpha' => ':attribute يجب ان يحتوي علي احرف فقط.',
    'alpha_dash' => ':attribute يجب ان يحتوي فقط علي اخرف او ارقام او _ .',
    'alpha_num' => ':attribute يجب ان يكون اخرف او ارقام فقط.',
    'array' => ':attribute يجب ان يكون مجموعة مصفوفة.',
    'ascii' => ':attribute يجب أن تحتوي فقط على أحرف أبجدية رقمية ورموز أحادية البايت.',
    'before' => ':attribute يجب ان يكون تاريخ يسبق :date.',
    'before_or_equal' => ':attribute يجب ان يكون تاريخ يسبق او يساوي :date.',
    'between' => [
        'array' => ':attribute يجب ان يكون بين :min و :max اصناف.',
        'file' => ':attribute يجب ان يكون بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب ان يكون بين :min و :max.',
        'string' => ':attribute يجب ان يكون بين :min و :max حرف.',
    ],
    'boolean' => ':attribute يجب ان يكون صح او خطأ.',
    'confirmed' => ':attribute غير مطابق.',
    'current_password' => 'كلمة المرور خطأ.',
    'date' => ':attribute ليس تاريخ صحيح.',
    'date_equals' => ':attribute يجب ان يكون تاريخ يساوي :date.',
    'date_format' => ':attribute يجب ان يكون تاريخ بصيغة :format.',
    'declined' => ':attribute يجب ان يكون مرفوض.',
    'declined_if' => ':attribute يجب ان يكون مرفوض عندما :other يكون :value.',
    'different' => ':attribute و :other يجب ان يكونوا مختلفين.',
    'digits' => ':attribute يجب ان يكون :digits رقم.',
    'digits_between' => ':attribute يجب ان يكون بين :min و :max رقم.',
    'dimensions' => ':attribute أبعاد الصورة خطأ.',
    'distinct' => ':attribute يحتوي علي قيم متكررة.',
    'doesnt_end_with' => ':attribute يجب ان لا ينتهي بأحد هذة الكلمات: :values.',
    'doesnt_start_with' => ':attribute يجب ان لا يبدأ بأحد هذه الكلمات: :values.',
    'email' => ':attribute يجب ان يكون بريد الكتروني صحيح.',
    'ends_with' => ':attribute يجب ان ينتهي بأحد من هذة الكلمات: :values.',
    'enum' => ':attribute القيمة المختارة خطأ.',
    'exists' => ':attribute مًسجل بالفعل.',
    'file' => ':attribute يجب ان يكون ملف.',
    'filled' => ':attribute يجب ان يحتوي علي اي قيمة.',
    'gt' => [
        'array' => ':attribute يجب ان تكون المصفوفة اكثر من :value قيم.',
        'file' => ':attribute يجب ان تكون مساحته اكبر من :value كيلوبايت.',
        'numeric' => ':attribute يجب ان يكون رقم اكبر من :value.',
        'string' => ':attribute يجب ان يكون اكبر من :value حرف.',
    ],
    'gte' => [
        'array' => ':attribute يجب ان تكون المصفوفة من :value اصناف او اكثر.',
        'file' => ':attribute يجب ان تكون مساحته اكبر من او تساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب ان يكون رقم اكبر من او يساوي :value.',
        'string' => ':attribute يجب ان يكون عدد الاحرف اكبر من او يساوي :value حرف.',
    ],
    'image' => ':attribute يجب ان يكون صورة.',
    'in' => ':attribute القيمة المختارة خطأ.',
    'in_array' => ':attribute الحقل غير موجود في :other.',
    'integer' => ':attribute يجب ان يكون رقم صحيح.',
    'ip' => ':attribute يجب ان يكون عنوان IP صحيح.',
    'ipv4' => ':attribute يجب ان يكون عنوان IP الاصدار 4 صحيح.',
    'ipv6' => ':attribute يجب ان يكون عنوان IP الاصدار 6 صحيح.',
    'json' => ':attribute يجب ان يكون نص JSON صحيح.',
    'lowercase' => ':attribute يجب ان تكون الحروف صغيرة.',
    'lt' => [
        'array' => ':attribute يجب ان تكون المصفوفة اقل من :value قيم.',
        'file' => ':attribute يجب ان تكون مساحته اقل من :value كيلوبايت.',
        'numeric' => ':attribute يجب ان يكون رقم اقل من :value.',
        'string' => ':attribute يجب ان يكون اقل من :value حرف.',
    ],
    'lte' => [
        'array' => ':attribute يجب ان تكون المصفوفة من :value اصناف او اقل.',
        'file' => ':attribute يجب ان تكون مساحته اقل من او تساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب ان يكون رقم اقل من او يساوي :value.',
        'string' => ':attribute يجب ان يكون عدد الاحرف اقل من او يساوي :value حرف.',
    ],
    'mac_address' => ':attribute يجب ان يكون عنوان MAC صحيح.',
    'max' => [
        'array' => ':attribute يجب ان تكون عناصر المصفوفة لا تتخطي :max عنصر.',
        'file' => ':attribute يجب ان يكون حجم ملف لا يتخطي :max كيلوبايت.',
        'numeric' => ':attribute لا يمكن ان يكون اكبر من :max.',
        'string' => 'The :attribute لا يمكن ان يكون اكبر من :max حرف.',
    ],
    'max_digits' => ':attribute يجب ان لا يكون اكبر من :max رقم.',
    'mimes' => ':attribute يجب ان يكون الملف من احد هذة الأنواع: :values.',
    'mimetypes' => ':attribute يجب ان يكون الملف من احد هذة الأنواع: :values.',
    'min' => [
        'array' => ':attribute يجب ان تكون عناصر المصفوفة علي الاقل :min عنصر.',
        'file' => ':attribute يجب ان يكون حجم ملف علي الاقل :min كيلوبايت.',
        'numeric' => ':attribute لا يمكن ان يكون اقل من :min.',
        'string' => 'The :attribute لا يمكن ان يكون اقل من :min حرف.',
    ],
    'min_digits' => ':attribute يجب ان يكون علي الاقل :min رقم.',
    'multiple_of' => ':attribute ان يكون احد مضاعفات :value.',
    'not_in' => ':attribute القيمة المختارة خطأ.',
    'not_regex' => ':attribute صيغة المدخله خطأ.',
    'numeric' => ':attribute يجب ان يكون رقم.',
    'password' => [
        'letters' => ':attribute يجب ان تكون علي الاقل حرف واحد.',
        'mixed' => ':attribute يجب ان تكون علي الاقل حرف كبير وحرف صغير.',
        'numbers' => ':attribute يجب ان تكون تحتوي علي رقم واحد علي الاقل.',
        'symbols' => ':attribute يجب ان تكون تحتوي علي رمز واحد علي الاقل.',
        'uncompromised' => ':attribute تم تسريبها من قبل. يرجي اختيار :attribute.',
    ],
    'present' => ':attribute يجب ان تكون في الحاضر.',
    'prohibited' => ':attribute الحقل محظور.',
    'prohibited_if' => ':attribute الحقل محظور عندما :other يكون :value.',
    'prohibited_unless' => ':attribute الحقل محظور إلا عندما :other يكون :values.',
    'prohibits' => ':attribute الحقل محظور :other من ان يكون حاضر.',
    'regex' => ':attribute صيغة مدخلة خطأ.',
    'required' => ':attribute الحقل مطلوب.',
    'required_array_keys' => ':attribute يجب ان يكون احد مدخلات: :values.',
    'required_if' => ':attribute الحقل مطلوب عندما :other يكون :value.',
    'required_if_accepted' => ':attribute الحقل مطلوب عندما :other يكون مقبول.',
    'required_unless' => ':attribute الحقل مطلوب إلا عتندما :other يكون :values.',
    'required_with' => ':attribute يكون مطلوب عندما :values يكون حاضر.',
    'required_with_all' => ':attribute الحقل مطلوب عندما :values يكونوا حاضر.',
    'required_without' => ':attribute مطلوب عندما :values ليس حاضر.',
    'required_without_all' => ':attribute الحقل مطلوب عندما :values غير حاضرين.',
    'same' => ':attribute و :other يجب ان يكونوا متماثلين.',
    'size' => [
        'array' => ':attribute يجب ان تكون مصفوفة :size صنف.',
        'file' => ':attribute يجب ان يكون ملف :size كيلوبايت.',
        'numeric' => ':attribute يجب ان يكون حجمه :size.',
        'string' => ':attribute يجب ان يكون :size حرف.',
    ],
    'starts_with' => ':attribute يجب ان يبدأ بأحد هذه القيم: :values.',
    'string' => ':attribute يجب ان يكون نص.',
    'timezone' => ':attribute يجب ان يكون وحدة زمنية صحيحة.',
    'unique' => ':attribute تم تسجيله مسبقاً.',
    'uploaded' => ':attribute فشل الرفع.',
    'uppercase' => ':attribute يجب ان يكون احرف كبيرة.',
    'url' => ':attribute يجب ان يكون رابط صحيح.',
    'ulid' => ':attribute يجب ان يكون ULID صحيح.',
    'uuid' => ':attribute يجب ان يكون UUID صحيح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
