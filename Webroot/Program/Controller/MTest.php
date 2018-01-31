<?php

namespace App\Controller;

use Kernel\CoreBase\Controller;

class MTest extends Controller
{


    protected function initialization($controller_name, $method_name)
    {
        parent::initialization($controller_name, $method_name);
    }




    public function onClose()
    {
        $this->destroy();
    }

    public function onConnect()
    {
        $this->destroy();
    }
}
