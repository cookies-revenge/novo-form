<?php

namespace CookiesRevenge\NovoForm\Entities;

class PropelEntity extends AbstractEntity
{
    public function Instantiate($className, $id = null)
    {
        if ($id === null) {
            $this->object_ = new $className();
            return;
        }

        $className .= "Query";
        $object = $className::create()->findPk($id);

        if ($object === null) {
            throw new \Exception("Could not fetch " . $className . " by PK in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->object_ = $object;
    }

    public function Clone($deepCopy = false)
    {
        return $this->object_->copy($deepCopy);
    }

    public function ToArray()
    {
        return $this->object_->toArray();
    }

    public function SetPropertyByName($name, $value)
    {
        $getter = "get{$name}";        
        $setter = "set{$name}";

        if ($this->object_->$getter() != $value)
            $this->object_->$setter($value);

        return $this;
    }

    public function SetProperies($values)
    {
        return $this;
    }

    public function GetPropertyByName($name)
    {
        return $this->object_->getByName($name);
    }

    public function SetParent($name, $parent)
    {
        $setter = "set{$name}";
        $this->object_->$setter($parent);
        return $this;
    }

    public function AddChild($name, $child)
    {
        $setter = "add{$name}";
        $this->object_->$setter($child);
        return $this;
    }

    public function IsModified()
    {
        return $this->object_->isModified();
    }

    public function Save()
    {
        $this->object_->save();
    }

    public function Delete()
    {
        $this->object_->delete();
    }

    
}
