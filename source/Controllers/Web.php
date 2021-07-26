<?php


namespace Source\Controllers;


use Source\Models\User;

/**
 * Class Web
 * @package Source\Controllers
 */
class Web extends Controller
{
    /**
     * Web constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if (!empty($_SESSION["user"])){
            $this->router->redirect("app.home");
        }
    }

    /**
     *
     */
    public function login():void
    {
        $head = $this->seo->optimize(
          "Crie sua conta no " . site("name"),
          site("desc"),
          $this->router->route('web.login'),
          routImage("Login")
        )->render();

        echo $this->view->render("theme/login", [
            "head" => $head
        ]);
    }

    /**
     *
     */
    public function register(): void
    {
        $head = $this->seo->optimize(
            "Cadastre-se no " . site("name"),
            site("desc"),
            $this->router->route('web.register'),
            routImage("Register")
        )->render();

        $formUser = new \stdClass();
        $formUser->first_name = null;
        $formUser->last_name = null;
        $formUser->email = null;

        $social_user = (!empty($_SESSION["facebook_auth"]) ? unserialize($_SESSION["facebook_auth"]) : (!empty($_SESSION["google_auth"]) ? unserialize($_SESSION["google_auth"]) : null));

        if ($social_user){
            $formUser->first_name = $social_user->getFirstName();
            $formUser->last_name = $social_user->getLastName();;
            $formUser->email = $social_user->getEmail();;
        }

        echo $this->view->render("theme/register", [
            "head" => $head,
            "user" => $formUser
        ]);
    }

    /**
     *
     */
    public function forget(): void
    {
        $head = $this->seo->optimize(
            "Recupere sua senha " . site("name"),
            site("desc"),
            $this->router->route('web.forget'),
            routImage("Forget")
        )->render();

        echo $this->view->render("theme/forget", [
            "head" => $head
        ]);

    }


    /**
     * @param $data
     */
    public function reset($data): void
    {

        if (empty($_SESSION["forget"])){
            flash("info", "Informe seu E_MAIL para recuperar a senha");
            $this->router->redirect("web.forget");
        }

        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $forget = filter_var($data["forget"], FILTER_DEFAULT);
        $errorForget = "Não foi possível recuperar tente novamente";

        if (!$email || !$forget){
            flash("error", $errorForget);
            $this->router->redirect("web.forget");
        }

        $user = (new User())->find("email = :e AND forget = :f", "e={$email}&f={$forget}")->fetch();
        if (!$user){
            flash("error", $errorForget);
            $this->router->redirect("web.forget");
        }

        $head = $this->seo->optimize(
            "Crie sua nova senha no " . site("name"),
            site("desc"),
            $this->router->route('web.reset'),
            routImage("Reset")
        )->render();

        echo $this->view->render("theme/reset", [
            "head" => $head
        ]);
    }


    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = filter_var($data["errcode"], FILTER_VALIDATE_INT);

        $head = $this->seo->optimize(
            "Ooops {$error} | " . site("name"),
            site("desc"),
            $this->router->route("web.error", ["errcode" => $error]),
            routImage($error)
        )->render();

        echo $this->view->render("theme/error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}