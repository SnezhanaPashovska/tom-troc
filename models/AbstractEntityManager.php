<?php

/**
 * Class AbstractEntityManager
 *
 */
abstract class AbstractEntityManager
{

    /**
     * @var DBManager The database manager instance used for database operations.
     */
    protected $db;

    /**
     * AbstractEntityManager constructor.
     *
     */
    public function __construct()
    {
        $this->db = DBManager::getInstance();
    }
}
