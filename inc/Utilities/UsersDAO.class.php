<?php
    class UsersDAO{

        private static $db;

        static function initialize(string $className)    {
            //Remember to send in the class name for this DAO
            self::$db = new PDOService($className);
        }

        static function createUser(Users $user): int{
   
            $sql ="INSERT INTO users (Fname, Lname, Email, Phone, Password, Role)
                    VALUES(:Fname, :Lname, :Email, :Phone, :Password, :Role)";

            self::$db->query($sql);
            self::$db->bind(':Fname', $user->getFname());
            self::$db->bind(':Lname', $user->getLname());
            self::$db->bind(':Email', $user->getEmail());
            self::$db->bind(':Phone', $user->getPhone());
            self::$db->bind(':Password', $user->getPassword());
            self::$db->bind(':Role', $user->getRole());
            self::$db->execute();

            return self::$db->lastInsertedId();

        }

        static function getUser($emailId): Users{
            $sql ="SELECT * FROM users WHERE email=:email";

            self::$db->query($sql);
            self::$db->bind(':email', $emailId);
            self::$db->execute();
 
            return self::$db->singleResult();
   
        }
       
    }
?>