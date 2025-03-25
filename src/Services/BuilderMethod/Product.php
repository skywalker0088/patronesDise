<?php

namespace App\Services\BuilderMethod;

class Product
{
    protected string $name;
    protected string $extras;

    public function __toString()
    {
        return "name: $this->name extras: $this->extras";
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of extras
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * Set the value of extras
     *
     * @return  self
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;

        return $this;
    }
}
