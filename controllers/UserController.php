<?php
class UserController
{
    public static $arr_param;

    public function actionLogin()
    {
        $email='';$password='';$errors=false;

        if(isset($_POST['submit']))
        {
            $email= $_POST['email'];
            $password = $_POST['password'];
            $errors=false;

            if(!User::checkEmail($email))
                $errors[]='Неправильный email';
            
            if(!User::checkPassword($password))
                $errors[]='Пароль должен содержать не меньше 6 символов';

            $userId= User::thereisUser($email,$password);
            
            if($userId == false)
            {
                $errors[]='Данные входа не правильны';
                User::auth($userId);
            }
            else
            {//если данные правильны то сохраняем в сессию ID user
                User::auth($userId);
            //перенапрвляем  пользователя в личный кабинет                
                header("Location:/cabinet/");
            }
        }
        require_once(ROOT.'/views/user/login.php');
        return true;
    }
    
    public function actionRegister()
    {
        $errors=[];
        $result=false;
        $name= '';$email='';$password='';
        if(isset($_POST['submit']))
        {
            $name= $_POST['name']; $email=$_POST['email'];
            $password=$_POST['password'];
            
            if(User::checkName($name))
            {
                echo '<li> name OK</li>';
            }else{
                $errors[]= 'Имя должно иметь больше двух символов';
            }

            if(User::checkEmail($email))
            {
                echo '<li> Email OK </li>';
            }
            else{
                $errors[]='Неправильный Email';
            }

            if(User::checkEmailExists($email))
                $errors[]='Такой email уже используется';

            if(User::checkPassword($password))
            {
                echo '<li>password OK</li>';
            }
            else{
                $errors[]= 'Пароль должен быть больше шести символов';
            }

            if(!$errors)
            {
                $result = User::register($name, $email, $password);
                if($result)
                    echo "<strong>Вы зарегестрированы $result</strong>";
                else echo '<strong> ошибка регистрации </strong>' ;   
            }
                

        }
        require_once(ROOT.'/views/user/register.php');
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }
}