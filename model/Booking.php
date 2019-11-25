<?php
class Booking
{
    private $id;
    private $username;
    private $email;
    private $phone;
    private $address;
    private $date;
    private $vendorName;
    private $packageName;
    private $totalCost;
    private $halfPaid;
    private $fullPaid;

 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }


    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getVendorName()
    {
        return $this->vendorName;
    }
    public function setVendorName($vendorName)
    {
        $this->vendorName = $vendorName;

        return $this;
    }


    public function getPackagename()
    {
        return $this->packageName;
    }
    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;

        return $this;
    }

    public function getTotalCost()
    {
        return $this->totalCost;
    }
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;

        return $this;
    }

    public function getHalfPaid()
    {
        return $this->halfPaid;
    }
    public function setHalfPaid($halfPaid)
    {
        $this->halfPaid = $halfPaid;

        return $this;
    }

    public function getFullPaid()
    {
        return $this->fullPaid;
    }
    public function setFullPaid($fullPaid)
    {
        $this->fullPaid = $fullPaid;

        return $this;
    }
    public function Booking($username, $email, $phone, $address, $date, $vendorName,$packageName, $totalCost, $halfPaid, $fullPaid)
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->date = $date;
        $this->vendorName = $vendorName;
        $this->packageName = $packageName;
        $this->totalCost = $totalCost;
        $this->halfPaid = $halfPaid;
        $this->fullPaid = $fullPaid;
    }


}
