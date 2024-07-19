<?php

/**
 * Class AbstractEntity
 *
 * An abstract base class that provides common functionality for entities, including hydration from an associative array and managing an ID.
 */
abstract class AbstractEntity
{
    /**
     * @var int The unique identifier for the entity. Default is -1 indicating no ID is set.
     */
    protected int $id = -1;

    /**
     * AbstractEntity constructor.
     *
     * Initializes the entity with optional data.
     *
     * @param array $data An associative array containing property values to initialize the entity.
     */
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * Hydrates the entity with data from an associative array.
     *
     * @param array $data An associative array of property values where keys are property names.
     * 
     * @return void
     */
    protected function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                if ($value !== null) {
                    $this->$method($value);
                }
            }
        }
    }

    /**
     * Sets the ID of the entity.
     *
     * @param int $id The unique identifier to assign to the entity.
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Gets the ID of the entity.
     *
     * @return int The unique identifier of the entity.
     */
    public function getId(): int
    {
        return $this->id;
    }
}
