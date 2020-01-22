<?php

namespace CookiesRevenge\NovoForm\Entities;

abstract class AbstractEntity implements EntityInterface
{
    public abstract function Instantiate($className, $id);
    public abstract function Clone();
    public abstract function ToArray();
    public abstract function SetPropertyByName($name, $value);
    public abstract function SetProperies($values);
    public abstract function GetPropertyByName($name);
    public abstract function SetParent($name, $parent);
    public abstract function AddChild($name, $child);
    public abstract function IsModified();
    public abstract function Save();
    public abstract function Delete();

    public function GetObject()
    {
        return $this->object_;
    }

    protected $object_ = null;

}
