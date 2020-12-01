<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [''];

    protected $status = [
        '1' => [
            'class' => 'btn-primary',
            'name'  => 'Tiếp nhận'
        ],
        '2' => [
            'class' => 'btn-warning',
            'name'  => 'Đang vận chuyển'
        ],
        '3' => [
            'class' => 'btn-success',
            'name'  => 'Đã giao hàng'
        ],
        '4' => [
            'class' => 'btn-danger',
            'name'  => 'Đã hủy'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->tst_status, "[N\A]");
    }
}
