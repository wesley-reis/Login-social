<?php
/**
 * SITE CONFIG
 */
define("SITE", [
    "name" => "Autenticação de login com redes sociais Facebook e Google",
    "desc" => "Aplicação de autenticação em MVC com PHP",
    "domain" => "",
    "locale" => "pt_BR",
    "root" => ""
]);

/**
 * SITE MINIFY
 */
if ($_SERVER["SERVER_NAME"] == ""){
    require __DIR__ . "/Minify.php";
}

/**
 *  DATABASE CONNECT
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "",
    "port" => "3306",
    "dbname" => "",
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
   "facebook_page" => "",
   "facebook_author" => "",
   "facebook_appId" => "",
   "twitter_creator" => "",
   "twitter_site" => ""
]);

/**
 * MAIL CONNECT
 */

/** Disparo via conta Google */
define("MAIL",[
    "host" => "",
    "port" => "",
    "user" => "",
    "passwd" => "",
    "from_name" => "",
    "from_email" => ""
]);


/**
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN", [
    "clientId" => "",
    "clientSecret" => "",
    "redirectUri"=> SITE["root"] . "/facebook",
    "graphApiVersion" => "v4.0"
]);

/**
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN", [
    "clientId" => "",
    "clientSecret"=> "",
    "redirectUri"=> SITE["root"] . "/google"
]);
