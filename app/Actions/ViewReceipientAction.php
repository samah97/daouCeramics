<?php


namespace App\Actions;


use TCG\Voyager\Actions\AbstractAction;

class ViewReceipientAction extends AbstractAction
{

    public function getTitle()
    {
        return 'Receipient';
    }

    public function getIcon()
    {
        return 'voyager-external';
    }

    public function getDefaultRoute()
    {
        return 'www.google.com';
    }
}
