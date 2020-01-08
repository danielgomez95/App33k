<?php


class StudentInterface
{
    const TABLE_STUDENT = 'students';

    protected $id;
    protected $dateRegistered;
    protected $name;
    protected $middleName;
    protected $lastName;
    protected $password;
    protected $emailAddress;
    protected $contactNumber;
    protected $age;
    protected $birthday;
    protected $address;

    public static function LoadArray(array $ids = null)
    {
        if (!empty($ids)) {
            $return = [];
            foreach ($ids as $id) {
                $Object = self::Load($id);
                if ($Object) {
                    $return[$id] = $Object;
                }
            }
        } else {
            $sql = "
                SELECT 
                    students_id 
                FROM 
                    " . static::TABLE_STUDENT . "
            ";
            $data = Dbcon::execute($sql);
            $result = Dbcon::query_fetch_all_assoc($data);
            $return = [];
            foreach ($result as $key => $value) {
                $studentID = $value['students_id'];
                $return[$studentID] = self::Load($studentID);
            }
        }

        return $return;
    }

    public static function Load($id)
    {
        $sql = "
            SELECT
                students_id,
                date_registered,
                first_name,
                middle_name,
                last_name,
                password,
                email_address,
                contact_number,
                age,
                birthday,
                address
            FROM
                " . static::TABLE_STUDENT . "
            WHERE
                remove = 0
            AND
                students_id = '{$id}'
        ";
        $data = Dbcon::execute($sql);
        $returnData = Dbcon::query_fetch_assoc($data);
        if (!empty($returnData)) {
            $static = new static();
            $static->setID($returnData['students_id']);
            $static->setDateRegistered($returnData['date_registered']);
            $static->setName($returnData['first_name']);
            $static->setMiddleName($returnData['middle_name']);
            $static->setLastName($returnData['last_name']);
            $static->setPassword($returnData['password']);
            $static->setEmailAddress($returnData['email_address']);
            $static->setContactNumber($returnData['contact_number']);
            $static->setAge($returnData['age']);
            $static->setBirthday($returnData['birthday']);
            $static->setAddress($returnData['address']);
            return $static;
        } else {
            return false;
        }
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setDateRegistered($dateRegistered)
    {
        $this->dateRegistered = $dateRegistered;
    }

    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    }

    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
//EOF