<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    private $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    public function collection()
    {
        $transactions = $this->transactions;
        $formatTransactions = [];
        
        foreach ($transactions as $key => $value){
            $formatTransactions[] = [
                'id' => $value->id,
                'total' => number_format($value->tst_total_money,0,',','.'),
                'name' => $value->tst_name,
                'email' => $value->tst_email,
                'phone' => $value->tst_phone,
                'address' => $value->tst_address,
                'status' => $value->getStatus($value->tst_status)['name'],
                'type' => $value->tst_user_id ? "Thành Viên" : "Khách",
                'created_at' => $value->created_at
            ];
        }

        return collect($formatTransactions);
    }

    public function headings(): array
    {
        return [
            '#',
            'Tổng Tiền',
            'Tên',
            'Email',
            'Số Điện Thoại',
            'Địa Chỉ',
            'Trạng Thái',
            'Loại Khách Hàng',
            'Ngày Tạo'
        ];
    }
}
