<?php

    class User{
        private $first_name = null;
        private $last_name = null;      
        private $email = null;
        private $gender = null;
        private $phone_number = null;
        private $birthdate = null;
        private $address_home = null;
        private $address_work = null;
        private $address_other = null;
        private $error_messages = null;


        /**
         * Get the value of first_name
         */ 
        public function getFirst_name()
        {
                return $this->first_name;
        }

        /**
         * Set the value of first_name
         *
         * @return  self
         */ 
        public function setFirst_name($first_name)
        {
                $this->first_name = $first_name;

                return $this;
        }
         /**
         * Get the value of last_name
         */ 
        public function getLast_name()
        {
                return $this->last_name;
        }

        /**
         * Set the value of last_name
         *
         * @return  self
         */ 
        public function setLast_name($last_name)
        {
                $this->last_name = $last_name;

                return $this;
        }
        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Set the value of gender
         *
         * @return  self
         */ 
        public function setGender($gender)
        {
                $this->gender = $gender;

                return $this;
        }

        /**
         * Get the value of phone_number
         */ 
        public function getPhone_number()
        {
                return $this->phone_number;
        }

        /**
         * Set the value of phone_number
         *
         * @return  self
         */ 
        public function setPhone_number($phone_number)
        {
                $this->phone_number = $phone_number;

                return $this;
        }

        /**
         * Get the value of birthdate
         */ 
        public function getBirthdate()
        {
                return $this->birthdate;
        }

        /**
         * Set the value of birthdate
         *
         * @return  self
         */ 
        public function setBirthdate($birthdate)
        {
                $this->birthdate = $birthdate;

                return $this;
        }

        /**
         * Get the value of address_home
         */ 
        public function getAddress_home()
        {
                return $this->address_home;
        }

        /**
         * Set the value of address_home
         *
         * @return  self
         */ 
        public function setAddress_home($address_home)
        {
                $this->address_home = $address_home;

                return $this;
        }

        /**
         * Get the value of address_work
         */ 
        public function getAddress_work()
        {
                return $this->address_work;
        }

        /**
         * Set the value of address_work
         *
         * @return  self
         */ 
        public function setAddress_work($address_work)
        {
                $this->address_work = $address_work;

                return $this;
        }

        /**
         * Get the value of address_other
         */ 
        public function getAddress_other()
        {
                return $this->address_other;
        }

        /**
         * Set the value of address_other
         *
         * @return  self
         */ 
        public function setAddress_other($address_other)
        {
                $this->address_other = $address_other;

                return $this;
        }
        /**
         * Get the value of error_messages
         */ 
        public function getError_messages()
        {
                return $this->error_messages;
        }

        /**
         * Set the value of error_messages
         *
         * @return  self
         */ 
        public function setError_messages($error_messages)
        {
                $this->error_messages = $this->error_messages." | ".$error_messages." |";

                return $this;
        }
    }

?>