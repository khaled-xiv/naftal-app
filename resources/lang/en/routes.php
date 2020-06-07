<?php
return  array(
    'login' => 'login',
    'logout'=>'logout',
    "password-request"=>"password/reset",
    "password-reset"=>"password/reset/{token}/{email}",
    "verification-notice"=>"email/verify",
    "verification-resend"=>"email/resend",
    "verification-verify"=>"email/verify/{id}/{hash}",

    'account'=>'account',
    'account-update'=>'account/update/{id}',

    "users"=>"users",
    "user-create"=>"users/create",
    "user-show"=>"users/{id}",
    "user-update"=>"users/update/{id}",


    "request"=>"request-of-intervention",
<<<<<<< HEAD


    "centers"=>"centers",
    "center-create"=>"centers/create",
    "center-edit"=>"centers/{id}/edit",

    "equipments"=>"equipments",
    "equipment-create"=>"equipments/create",
    "equipment-edit"=>"equipments/{id}/edit",


=======
    "request-create"=>"request-of-intervention/create",
    "request-edit"=>"request-of-intervention/{id}/edit",
>>>>>>> 0c345f01196d54be65e0b16911a5c497d5ae818a
)

?>
