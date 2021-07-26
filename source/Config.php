<?php
/**
 * SITE CONFIG
 */
define("SITE", [
    "name" => "Auth em MVC com PHP",
    "desc" => "Aplicação de autenticação em MVC com PHP",
    "domain" => "wrrdev.com",
    "locale" => "pt_BR",
    "root" => "https://login-social.wdev.com.br"
]);

/**
 * SITE MINIFY
 */
if ($_SERVER["SERVER_NAME"] == "login-social.wdev.com.br"){
    require __DIR__ . "/Minify.php";
}

/**
 *  DATABASE CONNECT
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "login-social.wdev.com.br",
    "port" => "3306",
    "dbname" => "wrrdeveloper",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
 * SOCIAL CONFIG
 */
define("SOCIAL", [
   "facebook_page" => "lojapwshop",
   "facebook_author" => "wesley.rodrigues.142892",
   "facebook_appId" => "2193729837289",
   "twitter_creator" => "@WesleyR99998115",
   "twitter_site" => "@WesleyR99998115"
]);

/**
 * MAIL CONNECT
 * Com Gmail
 */

/** Disparo via SandGrid */
//define("MAIL",[
//    "host" => "smtp.sendgrid.net",
//    "port" => "587",
//    "user" => "apikey",
//    "passwd" => "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",
//    "from_name" => "WRR-Developer",
//    "from_email" => "wrrdeveloper@gmail.com"
//]);


/** Disparo via conta Google */
define("MAIL",[
    "host" => "smtp.gmail.com",
    "port" => "465",
    "user" => "wesleyepolly16@gmail.com",
    "passwd" => "wrr230808",
    "from_name" => "wesley.Reis",
    "from_email" => "wesleyepolly16@gmail.com"
]);


/**
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN", [
    "clientId" => "2960156267596740",
    "clientSecret" => "82950e86bd50da08ab3aabb1373986cb",
    "redirectUri"=> SITE["root"] . "/facebook",
    "graphApiVersion" => "v4.0"
]);

/**
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN", [
    "clientId" => "102701898686-gcph90cq7h2mhd5a12e0lsr616pbij1a.apps.googleusercontent.com",
    "clientSecret"=> "DZy04xbtOVUxFTYJp5iW26R4",
    "redirectUri"=> SITE["root"] . "/google"
]);
