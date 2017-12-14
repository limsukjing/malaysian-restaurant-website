<?php

namespace Itb;

class WebApplication
{
    const PATH_TO_TEMPLATES = __DIR__ . '/../views';

    private $mainController;

    public function __construct()
    {
        $twig = new \Twig\Environment(new \Twig_Loader_Filesystem(self::PATH_TO_TEMPLATES));
        $this->mainController = new MainController($twig);
    }

    public function run()
    {
        $action = filter_input(INPUT_GET, 'action');
        if(empty($action)){
            $action = filter_input(INPUT_POST, 'action');
        }

        switch($action)
        {
            case 'sitemap':
                $this->mainController->sitemapAction();
                break;

            case 'about':
                $this->mainController->aboutAction();
                break;

            case 'menu':
                $this->mainController->menuAction();
                break;

            case 'menuItem':
                $id = filter_input(INPUT_GET, 'id');
                $this->mainController->menuItemAction($id);
                break;

            case 'menuItemEdit':
                $id = filter_input(INPUT_GET, 'id');
                $this->mainController->menuItemEditAction($id);
                break;

            case 'processMenuEdit':
                $id = filter_input(INPUT_POST, 'id');
                $name = filter_input(INPUT_POST, 'name');
                $price = filter_input(INPUT_POST, 'price');
                $description = filter_input(INPUT_POST, 'description');
                $this->mainController->processMenuEditAction($id, $name, $price, $description);
                break;

            case 'menuItemCreate':
                $this->mainController->menuItemCreateAction();
                break;

            case 'processMenuCreate':
                $name = filter_input(INPUT_POST, 'name');
                $price = filter_input(INPUT_POST, 'price');
                $description = filter_input(INPUT_POST, 'description');
                $this->mainController->processMenuCreateAction($name, $price, $description);
                break;

            case 'menuItemDelete':
                $id = filter_input(INPUT_GET, 'id');
                $this->mainController->menuItemDeleteAction($id);
                break;

            case 'user':
                $this->mainController->userAction();
                break;

            case 'userEdit':
                $id = filter_input(INPUT_GET, 'id');
                $this->mainController->userEditAction($id);
                break;

            case 'processUserEdit':
                $id = filter_input(INPUT_POST, 'id');
                $username = filter_input(INPUT_POST, 'username');
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'password');
                $this->mainController->processUserEditAction($id, $username, $email, $password);
                break;

            case 'userCreate':
                $this->mainController->userCreateAction();
                break;

            case 'processUserCreate':
                $username = filter_input(INPUT_POST, 'username');
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'password');
                $this->mainController->processUserCreateAction($username, $email, $password);
                break;

            case 'userDelete':
                $id = filter_input(INPUT_GET, 'id');
                $this->mainController->userDeleteAction($id);
                break;

            case 'signup':
                $this->mainController->signupAction();
                break;

            case 'processSignup':
                $username = filter_input(INPUT_POST, 'username');
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'password');
                $this->mainController->processSignupAction($username, $email, $password);
                break;

            case 'login':
                $this->mainController->loginAction();
                break;

            case 'processLogin':
                $username = filter_input(INPUT_POST, 'username');
                $password = filter_input(INPUT_POST, 'password');
                $this->mainController->processLoginAction($username, $password);
                break;

            case 'logout':
                $this->mainController->logoutAction();
                break;

            case 'home':
            default:
                $this->mainController->indexAction();
        }
    }
}