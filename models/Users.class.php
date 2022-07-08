<?php

    class Users{
        private $UserID;
        private $Fname;
        private $Lname;
        private $Email;
        private $Phone;
        private $Password;
        private $Role;


        function getUserID() : int{
            return $this->UserID;
        }

        function setUserID(int $userId)
        {
            $this->UserID = $userId;
        }

        function getFname() : string{
            return $this->Fname;
        }

        function setFname(string $fname){
            $this->Fname = $fname;
        }

        function getLname() : string{
            return $this->Lname;
        }

        function setLname(string $lname){
            $this->Lname = $lname;
        }


        function getEmail() : string{
            return $this->Email;
        }

        function setEmail(string $email){
            $this->Email = $email;
        }

        function getPhone() : int{
            return $this->Phone;
        }

        function setPhone(int $phone){
            $this->Phone = $phone;
        }

        function getPassword() : string{
            return $this->Password;
        }

        function setPassword(string $password){
            $this->Password = $password;
        }

        function getRole() : string{
            return $this->Role;
        }

        function setRole(string $role = "User"){
            $this->Role = $role;
        }

        
    }

?>