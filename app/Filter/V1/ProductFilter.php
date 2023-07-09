<?php
namespace App\Filter\V1;

use App\Filter\ApiFilter;

class ProductFilter extends ApiFilter
{

    protected $safeParms = [
        'supplier_id' => ['eq','gt','lt'],
        'title' => ['eq'],
        'description' => ['eq'],
        'price' => ['eq'],
    ];

    
}