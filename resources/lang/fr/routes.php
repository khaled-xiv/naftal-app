<?php
return  array(
    'login' => 'identifier',
    'logout'=>'se-déconnecter',
    "password-request"=>"mot-de-passe/réinitialiser",
    "password-reset"=>"mot-de-passe/réinitialiser/{token}/{email}",
    "verification-notice"=>"email/vérifier",
    "verification-resend"=>"email/renvoyer",
    "verification-verify"=>"email/vérifier/{id}/{hash}",

    'account'=>'mon-compte',
    'account-update'=>'mon-compte/modifier/{id}',

    "users"=>"utilisateurs",
    "user-create"=>"utilisateurs/ajouter",
    "user-show"=>"utilisateurs/{id}",
    "user-update"=>"utilisateurs/modifier/{id}",

    "request"=>"demande-d-intervention",
    "request-create"=>"demande-d-intervention/ajouter",
    "request-edit"=>"demande-d-intervention/{id}/modifier",


    "centers"=>"centres",
    "center-create"=>"centres/ajouter",
    "center-edit"=>"centres/{id}/modifier",

    "equipments"=>"equipements",
    "equipment-create"=>"equipements/ajouter",
    "equipment-edit"=>"equipements/{id}/modifier",

    "component-edit"=>"composants/{id}/modifier",

    "forums"=>"forums",
    "forum-show"=>"forum/{id}",
    "forum-create"=>"forums/ajouter",

    "search"=>"recherche/resultats",
    "tag-search"=>"tags/{id}/recherche",

)
?>
