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
    "request-create"=>"request-of-intervention/create",
    "request-edit"=>"request-of-intervention/{id}/edit",

    "centers"=>"centers",
    "center-create"=>"centers/create",
    "center-edit"=>"centers/{id}/edit",

    "equipments"=>"equipments",
    "equipment-create"=>"equipments/create",
    "equipment-edit"=>"equipments/{id}/edit",

    "component-edit"=>"components/{id}/edit",

    "forums"=>"forums",
    "forum-show"=>"forums/{id}",
    "forum-create"=>"forums/create",

    "search"=>"search/results",
    "tag-search"=>"tags/{id}/search",

)
?>
