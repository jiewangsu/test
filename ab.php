<?php


abstract class ab
{
    public function show()
    {
        $this->getName();
    }

    protected abstract function getName();

    public abstract function getAge($ange);
}

class chikc extends ab{
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function getAge($ange)
    {
        return $ange;
    }

}

class chikd extends chikc{

    public function getAge($ange)
    {
        return $ange;
    }
}

$aaa= new chikc();
var_dump($aaa->getAge(20));