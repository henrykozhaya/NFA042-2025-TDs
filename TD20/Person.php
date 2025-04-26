<?php
class Person{
    private $name;
    private $email;
    private $gender;
    private $birthdate;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->setEmail($email);
    }

    /* Getters */

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getGender(){
        return $this->gender;
    }

    public function getbirthdate(){
        return $this->birthdate;
    }
    
    /* Setters */
    
    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }
    }

    public function setGender($gender){
        $genders = ["Female", "Male"];
        if(in_array($gender, $genders)){
            $this->gender = $gender;
        }
    }

    public function setBirthdate($birthdate){
        // The requiremets is: minimum age is 18
        // The format of the date should be Y-m-d Example: 2000-12-25
        try{
            $birthdate = new DateTime($birthdate);
            $today = new DateTime();
            $age = $today->diff($birthdate)->y;
            if($age > 18){
                $this->birthdate = $birthdate->format('Y-m-d');
            }
        }
        catch(Exception $e){
            return;
        }
    }

    /* Misc Functions */
    public function getWelcomeMessage(){
        $salutation = $this->gender == "Female" ? "Ms." : "Mr.";
        return "Welcome $salutation $this->name";
    }

    public function getAge(){
        if(isset($this->birthdate)){
            $birthdate = new DateTime($this->birthdate);
            $today = new DateTime();
            $age = $today->diff($birthdate)->y;
            return $age;
        }
        else{
            return null;
        }
    }

}