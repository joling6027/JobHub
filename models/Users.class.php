<?php

    class Users{
        private $UserID;
        private $Fname;
        private $Lname;
        private $Email;
        private $Phone;
        private $City;
        private $Province;
        private $PostalCode;
        private $Password;
        private $Address;
        private $Street;
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

        function getCity() : string{
            return $this->City;
        }

        function setCity(string $city){
            $this->City = $city;
        }

        function getProvince(): string{
            return $this->Province;
        }

        function setProvince(string $province){
            $this->Province = $province;
        }

        function getPostalCode() : string{
            return $this->PostalCode;
        }

        
        function setPostalCode(string $postalCode){
            $this->PostalCode = $postalCode;
        }

        function getPassword() : string{
            return $this->Password;
        }

        
        function setPassword(string $password){
            $this->Password = $password;
        }

        function getAddress() : string{
            return $this->Address;
        }

        
        function setAddress(string $address){
            $this->Address = $address;
        }

        function getStreet() : string{
            return $this->Street;
        }

        
        function setStreet(string $street){
            $this->Street = $street;
        }


        function getRole() : string{
            return $this->Role;
        }

        function setRole(string $role){
            $this->Role = $role;
        }

        
    }

?>