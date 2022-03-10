<?php

declare(strict_types=1);

namespace App\Models;

use App\App;
use App\DB;
use JetBrains\PhpStorm\Pure;

abstract class Model
{

    protected DB $db;

    #[Pure]
    public function __construct()
    {
        $this->db = App::db();
    }

}