<?php

namespace App\Repositories;

interface MessagesInterface
{
    public function getPagination();

    public function findById($id);
}
