<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CarbonController extends Controller
{
    public function day()
    {
        $data = [
            // 第一天开始时间
            '第一天' => [
                '开始时间' => [
                    Carbon::now()->toDateTimeString(),
                    Carbon::now()->startOfDay()->toDateTimeString(),
                    Carbon::today()->toDateTimeString(),
                    [
                        Carbon::today()->timestamp,
                        date('Y-m-d H:i:s', Carbon::today()->timestamp)
                    ],
                ],
                '结束时间' => [
                    Carbon::now()->endOfDay()->toDateTimeString(),
                    Carbon::today()->endOfDay()->toDateTimeString(),
                    [
                        Carbon::now()->endOfDay()->timestamp,
                        date('Y-m-d H:i:s', Carbon::now()->endOfDay()->timestamp)
                    ],
                ],
            ],

            '后一天' => [
                '开始时间' => [
                    Carbon::tomorrow()->toDateTimeString(),
                ],
                '结束时间' => [
                    Carbon::tomorrow()->endOfDay()->toDateTimeString()
                ],
            ],

            '前一天' => [
                '开始时间' => [
                    Carbon::yesterday()->toDateTimeString(),
                    Carbon::yesterday()->startOfDay()->toDateTimeString(),
                ],
                '结束时间' => [
                    Carbon::yesterday()->endOfDay()->toDateTimeString(),
                ],
            ],
            '前两天' => [
                '开始时间' => [
                    Carbon::today()->subDay(2)->toDateTimeString(),
                ],
                '结束时间' => [
                    Carbon::today()->subDay(2)->endOfDay()->toDateTimeString(),
                ],
            ],

            // 1 1 0  开始规则：1*2-1 = 1    结束规则：(1-1)*2 = 0   开始：1   结束：0
            // 2 3 2  开始规则：2*2-1 = 3    结束规则：(2-1)*2 = 2   开始：3   结束：2
            // 3 5 4  开始规则：3*2-1 = 5    结束规则：(3-1)*2 = 4   开始：5   结束：4
            // 4 7 6  开始规则：4*2-1 = 7    结束规则：(4-1)*2 = 6   开始：7   结束：6
            // 5 9 8  开始规则：5*2-1 = 9    结束规则：(5-1)*2 = 8   开始：9   结束：8

            '按天分页查询' => [
                '规则' => '每页 2 条数据',
                '第一页' => [
                    '开始时间' => [ // subDay：向前推一天，所以值应该为 (页码-1)
                        Carbon::today()->subDay(1)->startOfDay()->toDateTimeString(),
                    ],
                    '结束时间' => [
                        Carbon::today()->subDay(0)->endOfDay()->toDateTimeString(),
                    ],
                ],
                '第二页' => [
                    '开始时间' => [
                        Carbon::today()->subDay(3)->startOfDay()->toDateTimeString(),
                    ],
                    '结束时间' => [
                        Carbon::today()->subDay(2)->endOfDay()->toDateTimeString(),
                    ],
                ],
                '第三页' => [
                    '开始时间' => [
                        Carbon::today()->subDay(5)->startOfDay()->toDateTimeString(),
                    ],
                    '结束时间' => [
                        Carbon::today()->subDay(4)->endOfDay()->toDateTimeString(),
                    ],
                ],
                '统计' => [
                    '页码数' => ceil((Carbon::today()->subDay(0)->endOfDay()->diffInDays(Carbon::today()->subDay(5)->startOfDay()) + 1) / 2),
                ]
            ],


            '按月分页查询' => [
                '规则' => '每页 2 条数据',
                '第一月' => [
                    '开始时间' => [
                        Carbon::now()->subMonth(1)->startOfMonth()->toDateTimeString(),
                    ],
                    '结束时间' => [
                        Carbon::now()->subMonth(0)->endOfMonth()->toDateTimeString(),
                    ]
                ],
                '第二月' => [
                    '开始时间' => [
                        Carbon::now()->subMonth(3)->startOfMonth()->toDateTimeString(),
                    ],
                    '结束时间' => [
                        Carbon::now()->subMonth(2)->endOfMonth()->toDateTimeString(),
                    ]
                ],
                '第三月' => [
                    '开始时间' => [
                        Carbon::now()->subMonth(5)->startOfMonth()->toDateTimeString(),
                    ],
                    '结束时间' => [
                        Carbon::now()->subMonth(4)->endOfMonth()->toDateTimeString(),
                    ]
                ],
                '统计' => [
                    '页码数' => ceil((Carbon::now()->subMonth(0)->endOfMonth()->diffInMonths(Carbon::now()->subMonth(5)->startOfMonth()) + 1) / 2),
                ]
            ],

            '差集运算' => [
                '相差天数' => Carbon::today()->subDay(0)->endOfDay()->diffInDays(Carbon::today()->subDay(5)->startOfDay()),
                '相差月数' => Carbon::now()->subMonth(0)->endOfMonth()->diffInMonths(Carbon::now()->subMonth(5)->startOfMonth()),
            ],

            '时间戳转时间' => [
                Carbon::now()->timestamp(1564588799)->toDateTimeString(),
            ],

            '获取时间区间的总天数' => [
                '某月的天数' => Carbon::now()->timestamp(1564588799)->addMonth(1)->diffInDays(Carbon::now()->timestamp(1564588799)->addMonth(1)->endOfMonth())
            ]
        ];
        return $data;
    }

    public function month()
    {

    }
}
