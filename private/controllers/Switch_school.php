<?php

// change school controller.
class Switch_school extends Controller 
{
    function index($id='')
    {   
        Auth::switch_school($id);
        $this->redirect('Schools');
    }
}

