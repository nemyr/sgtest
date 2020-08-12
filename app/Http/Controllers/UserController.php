<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class UserController extends Controller
{
    const PR_BONUS = 0;
    const PR_OBJECT = 1;
    const PR_MONEY = 2;

    private $prizes = [self::PR_BONUS, self::PR_OBJECT, self::PR_MONEY];

    private function getPrize(array $avalPrizes)
    {
        switch (array_rand($avalPrizes)) {
            case 0:
                return $this->sendBonus();
            case 1:
                return $this->sendObject();
            case 2:
                return $this->sendMoney();
            default:
                return view("user.index");
        }
    }

    private function getAmount($prize){
        $interval = new Models\PrizeIntervals();
        $intervalData = $interval->where('prize_name', '=', $prize)->first();
        return ['amount' => rand($intervalData->min, $intervalData->max)];
    }

    private function sendBonus()
    {
        return view("prizes.bonus", $this->getAmount('bonus'));
    }

    private function sendObject()
    {
        $objectModel = new Models\PrizeObject();
        $objectModel = $objectModel->where('is_ordered', '=', false);
        if ($objectModel->doesntExist())
            return $this->getPrize(array_diff($this->prizes, [self::PR_OBJECT]));

        return view("prizes.object", ['objectID' => $objectModel->inRandomOrder()->first()->id]);
    }

    private function sendMoney()
    {
        $amount = $this->getAmount('money');

        $limit = Models\MoneyLimit::find(1);
        if ($limit->balance < $amount['amount'])
            return $this->getPrize(array_diff($this->prizes, [self::PR_OBJECT]));

        return view("prizes.money", $amount);
    }

    public function getPrizeAction()
    {
        return $this->getPrize($this->prizes);
    }
}
