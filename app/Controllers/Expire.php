<?php

namespace App\Controllers;

use App\Models\modelExpire;
use CodeIgniter\Controller;

class Expire extends BaseController
{
    public function get_expire()
    {
        $model = new modelExpire;
        $all_data = $model->expire();
    }
}
