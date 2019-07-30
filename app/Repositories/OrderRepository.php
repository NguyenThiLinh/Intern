<?php

namespace App\Repositories;

use App\Model\Order;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderRepository extends BaseRepository
 {
    public function model()
    {
        return Order :: class;
    }
 }