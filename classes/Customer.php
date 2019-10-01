<?php


/**
 * Class Customer
 * Niet echt aan toe gekomen om het af te krijgen en Issue 5 begreep ik ook niet heel goed.
 */
class Customer
{
    private $db;
    private $id;
    private $first_name;
    private $last_name;
    private $age;

    /**
     * Customer constructor.
     * @param $id
     */
    public function __construct($id = null)
    {
        $this->db = new Database;
        if (!empty($id)) {
            $this->loadCustomer($id);
        }
    }

    public function loadCustomer($id): void
    {
        $customer = $this->db->getAllRows(sprintf('SELECT * FROM customer WHERE id = %d', $id));
        if (count($customer) == 1) {
            $this->setId($customer[0]['id']);
            $this->setAge($customer[0]['age']);
            $this->setFirstName($customer[0]['first_name']);
            $this->setLastName($customer[0]['last_name']);
        }
    }

    public function getNumberOfCars() {
        return count(($this->db->getAllRows(sprintf('SELECT * FROM car'))));

    }
    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db): void
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }



}