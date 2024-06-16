<?php
class home{
    public $id;
    public $image;
    public $homeName;
    public $address;
    public $price;
    public $type;
    public $builtup_area;
    public $total_area;
    public $owner;
    public $about_home;
    public $agent;
    public $number;
    function __construct($id,$image,$homeName,$address,$price,$type,$builtup_area,$total_area,$owner,$about_home,$agent,$number){
     $this->id =$id;
     $this->image =$image;
     $this->homeName=$homeName;
     $this->address =$address;
     $this->price=$price;
     $this->type=$type;
     $this->builtup_area=$builtup_area;
     $this->total_area=$total_area;
     $this->owner = $owner;
     $this->about_home=$about_home;
     $this->agent=$agent;
     $this->number=$number;
    }
} 
class house{
    public $id;
    public $image;
    public $homeName;
    public $address;
    public $price;
    public $type;
    public $cid;
    function __construct($id,$image,$homeName,$address,$price,$type,$cid){
     $this->id =$id;
     $this->image =$image;
     $this->homeName=$homeName;
     $this->address =$address;
     $this->price=$price;
     $this->type=$type;
     $this->cid=$cid;
    }
} 
class users{
    public $id;
    public $image;
    public $name;
    public $email;
    public $phone;
    function __construct($id,$image,$name,$email,$phone){
     $this->id =$id;
     $this->image =$image;
     $this->name=$name;
     $this->email =$email;
     $this->phone=$phone;
    }
} 

?>