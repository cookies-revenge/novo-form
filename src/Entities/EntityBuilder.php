<?php

namespace CookiesRevenge\NovoForm\Entities;

class EntityBuilder
{

    public function __construct($orm, $className, $id = null)
    {
        $this->orm_ = $orm;
        $this->className_ = $className;
        $this->id_ = $id;
    }

    public function Build()
    {
        $entity = null;
        switch ($this->orm_) {
            case "propel":
                $entity = new PropelEntity();
                $entity->Instantiate($this->className_, $this->id_);
                break;
            case "eloquent": // not yet supported
                break;
            case "doctrine": // not yet supported
                break;
            default:
                throw new \Exception("ORM is either invalid or unsupported.");
        }

        if ($entity === null)
            throw new \Exception("ORM is either invalid or unsupported.");

        return $entity;
    }

    private $orm_;
    private $className_;
    private $id_;
}
