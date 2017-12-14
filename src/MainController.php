<?php

namespace Itb;

class MainController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function indexAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'home.html.twig';
        $argsArray = [
            'title' => 'Tanjung Aru | Malaysian Restaurant',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function sitemapAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'sitemap.html.twig';
        $argsArray = [
            'title' => 'Sitemap | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function aboutAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'about.html.twig';
        $argsArray = [
            'title' => 'About | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function menuAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $menuRepository = new MenuRepository();
        $menuItems = $menuRepository->getAll();

        $templateName = 'menu.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'menuItems' => $menuItems,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function menuItemAction($id)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $menuRepository = new MenuRepository();
        $menuItem = $menuRepository->getOne($id);

        $templateName = 'menu_item.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'menuItem' => $menuItem,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function menuItemEditAction($id)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $menuRepository = new MenuRepository();
        $menuItem = $menuRepository->getOne($id);

        $templateName = 'menu_edit.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'menuItem' => $menuItem,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function processMenuEditAction($id, $name, $price, $description)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $menuRepository = new MenuRepository();
        $menuRepository->update($id, $name, $price, $description);
        $menuItem = $menuRepository->getOne($id);

        $templateName = 'menu_edit_confirm.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'menuItem' => $menuItem,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function menuItemCreateAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'menu_create.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function processMenuCreateAction($name, $price, $description)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $menuRepository = new MenuRepository();
        $menuRepository->insert($name, $price, $description);

        $templateName = 'menu_create_confirm.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function menuItemDeleteAction($id)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $menuRepository = new MenuRepository();
        $menuRepository->deleteOne($id);

        $templateName = 'menu_delete_confirm.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function userAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $userRepository = new UserRepository();
        $users = $userRepository->getAll();

        $templateName = 'user.html.twig';
        $argsArray = [
            'title' => 'User | Tanjung Aru',
            'users' => $users,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function userEditAction($id)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $userRepository = new UserRepository();
        $user = $userRepository->getOne($id);

        $templateName = 'user_edit.html.twig';
        $argsArray = [
            'title' => 'User | Tanjung Aru',
            'user' => $user,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function processUserEditAction($id, $username, $email, $password)
    {
        $isLoggedIn = $this->isLoggedIn();
        $loggedInUsername = $this->usernameFromSession();

        $userRepository = new UserRepository();
        $userRepository->update($id, $username, $email, $password);
        $user = $userRepository->getOne($id);

        $templateName = 'user_edit_confirm.html.twig';
        $argsArray = [
            'title' => 'User | Tanjung Aru',
            'user' => $user,
            'isLoggedIn' => $isLoggedIn,
            'username' => $loggedInUsername
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function userCreateAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'user_create.html.twig';
        $argsArray = [
            'title' => 'Menu | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function processUserCreateAction($username, $email, $password)
    {
        $isLoggedIn = $this->isLoggedIn();
        $loggedInUsername = $this->usernameFromSession();

        $userRepository = new UserRepository();
        $userRepository->insert($username, $email, $password);

        $templateName = 'user_create_confirm.html.twig';
        $argsArray = [
            'title' => 'User | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $loggedInUsername
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function userDeleteAction($id)
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $userRepository = new UserRepository();
        $userRepository->deleteOne($id);

        $templateName = 'user_delete_confirm.html.twig';
        $argsArray = [
            'title' => 'User | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function signupAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'signup.html.twig';
        $argsArray = [
            'title' => 'Sign Up | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function processSignupAction($username, $email, $password)
    {
        $isLoggedIn = $this->isLoggedIn();
        $loggedInUsername = $this->usernameFromSession();

        $userRepository = new UserRepository();
        $userRepository->insert($username, $email, $password);

        $templateName = 'signup_confirm.html.twig';
        $argsArray = [
            'title' => 'Signup | Tanjung Aru',
            'newUsername' => $username,
            'email' => $email,
            'password' => $password,
            'isLoggedIn' => $isLoggedIn,
            'username' => $loggedInUsername
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function loginAction()
    {
        $isLoggedIn = $this->isLoggedIn();
        $username = $this->usernameFromSession();

        $templateName = 'login.html.twig';
        $argsArray = [
            'title' => 'Login | Tanjung Aru',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];

        $html = $this->twig->render($templateName, $argsArray);

        print $html;
    }

    public function processLoginAction($username, $password)
    {
        if($this->validCredentials($username, $password))
        {
            $_SESSION['username'] = $username;
            $this->indexAction();
        }

        else
        {
            $templateName = 'login_invalid.html.twig';
            $argsArray = [
                'title' => 'Login | Tanjung Aru'
            ];

            $html = $this->twig->render($templateName, $argsArray);

            print $html;
        }
    }

    public function logoutAction()
    {
        $this->killSession();
        $this->indexAction();
    }

    public function killSession()
    {
        $_SESSION = [];

        if(ini_get('session.use_cookies'))
        {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }

        session_destroy();
    }

    public function usernameFromSession()
    {
        if(isset($_SESSION['username']))
        {
            return $_SESSION['username'];
        }

        else
        {
            return '';
        }
    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['username']))
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    public function validCredentials($username, $password)
    {
        if($username == 'staff' && $password == 'staff')
        {
            return true;
        }

        else if($username == 'admin' && $password == 'admin')
        {
            return true;
        }

        else if(User::canFindMatchingUsernameAndPassword($username,$password))
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}