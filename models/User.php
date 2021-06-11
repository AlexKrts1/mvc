<?php

class User
{
    public static function register($name, $email, $password)
    {
        $role='user';
        $db= DB::getConnection();
        $sql = ' INSERT INTO USER (NAME, EMAIL, PASSWORD, ROLE) '.
            ' VALUES(:NAME, :EMAIL, :PASSWORD, :ROLE)';
        $result = $db->prepare($sql);
        $result->bindParam(':NAME',$name, PDO::PARAM_STR);
        $result->bindParam(':EMAIL',$email, PDO::PARAM_STR);
        $result->bindParam(':PASSWORD',$password, PDO::PARAM_STR);
        $result->bindParam(':ROLE',$role, PDO::PARAM_STR);
        return $result->execute();

    }

    public static function checkName($name)
    {
        if(strlen($name)>2)
            return true;
        return false;            
    }
    public static function checkPassword($password)
    {
        if(strlen($password)>=6) return true;
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
            return true;
        return false;            
    }

    public static function checkEmailExists($email)
    {
        //print_r($email);
        $db= DB::getConnection();
        $sql ='SELECT COUNT(ID) as COUNTID FROM USER WHERE EMAIL = :email';
        $result = $db->prepare($sql);
        $result -> bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();
        //$row = $result->fetchAll(PDO::FETCH_ASSOC);
        //print_r($row);
        //print_r($result->fetchColumn());

        if($result->fetchColumn())
            return true;
        
            return false;
    }

    public static function thereisUser($email,$password)
    {
        $db= DB::getConnection();
        $sql ='SELECT * FROM USER WHERE EMAIL = :email AND PASSWORD=:password';
        $result = $db->prepare($sql);
        $result -> bindParam(':email',$email, PDO::PARAM_STR);
        $result -> bindParam(':password',$password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetchAll(PDO::FETCH_ASSOC);
        print_r($user);
        if($user)
            return $user[0]['id'];
        
        return false;            
    }
    /**
     * Returns user by if
     * @param integer $id
     * 
    */
    public static function getUserById($id)
    {
        if($id)
        {
            $db=DB::getConnection();
            $sql='SELECT * FROM USER WHERE ID=:id';
            $result= $db->prepare($sql);
            $result->bindParam(':id',$id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
        return false;
    }

    /** 
    *
    *@param string $userId
    */
    public static function auth($userId)
    {
        $_SESSION['user']= $userId;
    }

    public static function checkLogged()
    {
        //if user saved in super global array
        // SESSION['user']
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }

        //header("Location: /user/login");
        return false;
    }
    public static function edit($id, $name, $password)
    {
        $db=DB::getConnection();
        $sql = "UPDATE USER
            SET NAME=:name, PASSWORD=:password
            WHERE ID=:id";
        $result= $db->prepare($sql)            ;;
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        return $result->execute();

    }
    
    
    
}