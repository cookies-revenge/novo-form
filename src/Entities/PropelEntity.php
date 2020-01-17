<?php

namespace CookiesRevenge\NovoForm\Entities;

class PropelEntity extends AbstractEntity
{
    public function Instantiate($className, $id = null)
    {
        if ($id === null) {
            $this->object_ = new $className();
            return $this;
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
        $this->object_->setByName($name, $value);
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

    public function Save()
    {
        $this->object_->save();
    }

    public function Delete()
    {
        $this->object_->delete();
    }

    
}
