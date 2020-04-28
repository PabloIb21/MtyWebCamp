<?php

    require 'paypal/autoload.php';

    define('URL_SITIO','http://localhost/MtyWebCamp');

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AVrD4cNqLjcZ7xzA9UzHqX0HOdckU_MxTDL-7xJsgNhLUEUdo2vKuDd_xK2fUduK1IjLK-5APWxf5yDr',     // ClientID
            'ECqKSKulKI9sA6G4eP7LLfMW457QujKf9Cka1t4lcZLQZmW2Bfk3MrPKpp4duIFjg7nunAYm0LU3p-ci'      // ClientSecret
        )
);

?>