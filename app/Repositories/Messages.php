<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;
use App\Message;

class Messages implements MessagesInterface
{
    public function getPagination()
    {
        return Message::with(['user','note','tags'])
            ->orderBy('created_at', request('sorted','DESC'))
            ->paginate(10);
    }

    public function findById($id)
    {
        return Message::findOrFail($id);
    }
}
