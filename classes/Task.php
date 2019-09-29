<?php


/**
 * Class Task
 */
class Task
{
    private $id;
    private $car_id;
    private $task;
    private $status;

    public function __construct($id = null)
    {
        $this->db = new Database;
        if (!empty($id)) {
            $this->loadTask($id);
        }
    }

    public function loadTask($id): void
    {
        $task = $this->db->getAllRows(sprintf('SELECT * FROM task WHERE id = %d', $id));
        if (count($task) == 1) {
            $this->setId($task[0]['id']);
            $this->setCarId($task[0]['car_id']);
            $this->setStatus($task[0]['status']);
            $this->setTask($task[0]['task']);
        }
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
    public function getCarId()
    {
        return $this->car_id;
    }

    /**
     * @param mixed $car_id
     */
    public function setCarId($car_id): void
    {
        $this->car_id = $car_id;
    }

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task): void
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}