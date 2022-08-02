<?php
    class UsersDAO{

        private static $db;

        static function initialize(string $className)    {
            //Remember to send in the class name for this DAO
            self::$db = new PDOService($className);
        }

        static function createUser(Users $user): int{
   
            try{
                $sql ="INSERT INTO users (Fname, Lname, Email, Phone, Password, Role, Agreement)
                VALUES(:Fname, :Lname, :Email, :Phone, :Password, :Role, :Agreement)";

                self::$db->query($sql);
                self::$db->bind(':Fname', $user->getFname());
                self::$db->bind(':Lname', $user->getLname());
                self::$db->bind(':Email', $user->getEmail());
                self::$db->bind(':Phone', $user->getPhone());
                self::$db->bind(':Password', $user->getPassword());
                self::$db->bind(':Role', $user->getRole());
                self::$db->bind(':Agreement', $user->getAgreement());
                self::$db->execute();

                return self::$db->lastInsertedId();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function getUser(string $email){

            $sql ="SELECT * FROM users WHERE email = :email;";
            try
            {
                self::$db->query($sql);
                self::$db->bind(':email', $email);
                self::$db->execute();
                return self::$db->singleResult();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function getUserById($userId): Users
        {
            try
            {
                    $sql ="SELECT * FROM users WHERE UserID=:UserID";

                    self::$db->query($sql);
                    self::$db->bind(':UserID', $userId);
                    self::$db->execute();
        
                    return self::$db->singleResult();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function getUsers(): array{

            try{
                //need to apply join to get resume
                $sql ="SELECT * FROM users";

                self::$db->query($sql);
                self::$db->execute();

                return self::$db->resultSet();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }

        static function updateUser (Users $user): int {

            try{
                $sql = "UPDATE users SET FName=:FName,
                LName=:LName,
                Phone=:Phone
                WHERE UserID=:UserID";
        
                self::$db->query($sql);
                self::$db->bind(':UserID',$user->getUserID());
                self::$db->bind(':FName', $user->getFname());
                self::$db->bind(':LName', $user->getLname());
                self::$db->bind(':Phone', $user->getPhone());
                self::$db->execute();
        
                return self::$db->rowCount();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }
        }
        
        static function updatePassword($email, $password)
        {
            try{
                $sql = "UPDATE users SET Password=:Password
                WHERE email = :email";
        
                self::$db->query($sql);
                self::$db->bind(':email', $email);
                self::$db->bind(':Password', $password);
                self::$db->execute();
        
                return self::$db->rowCount();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                error_log($ex->getMessage());
            }

        }
        
        static function deleteUser(string $userId): bool {
    
                $sql = "DELETE FROM users WHERE UserID = :UserID";
                try{
                    self::$db->query($sql);
                    self::$db->bind(':UserID', $userId);
                    self::$db->execute();
        
                    if(self::$db->rowCount() != 1){
                        throw new Exception("Problem deleting user $userId");
                    }
                }catch(Exception $exc){
                    echo $exc->getMessage();
                    return false;
                }
        
                return true;
        }

        static function getUsersAppliedJob($jobId):array{

            $sql = "SELECT users.*, job_applied.DesiredPay, job_applied.AdditionalUrls, 
                           job_applied.AppliedID, job_applied.Comments, job_applied.AppliedOn 
                    FROM users, job_applied
                    WHERE users.userId = job_applied.userId AND job_applied.jobId = :jobId ";
            try
            {
                    self::$db->query($sql);
                    self::$db->bind(':jobId',(int)$jobId);
                    self::$db->execute();
                    return self::$db->resultSet();
            }
            catch(Exception $exc){
                    echo $exc->getMessage();
                    return false;
            } 
        } 

       
    }
?>