<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetBonusRequest;
use App\Http\Requests\GetMoneyRequest;
use App\Http\Requests\GetObjectRequest;
use Illuminate\Http\Request;
use App\Models;

class PrizeController extends Controller
{


    public function getMoneyAction(GetMoneyRequest $req)
    {
        $uid = $req->user()->id;
        $model = new Models\PrizeMoney();
        $model->user_id = $uid;
        $model->amount = $req->amount;
        $model->is_sent = false;
        $model->save();

        $balanceData = Models\MoneyLimit::find(1);
        $balanceData->balance -= $req->amount;
        $balanceData->save();

        return redirect()->route('index');
    }

    public function convertMoneyAction(GetMoneyRequest $req)
    {
        $uid = $req->user()->id;
        $this->addBonusAmount($uid, Models\PrizeMoney::convertToBonus($req->amount));
        return redirect()->route('index');
    }

    public function getObjectAction(GetObjectRequest $req)
    {

        $uid = $req->user()->id;
        $model = Models\PrizeObject::find($req->input('objectID'));
        $model->user_id = $uid;
        $model->is_ordered = true;
        $model->save();

        return redirect()->route('index');
    }

    public function getBonusAction(GetBonusRequest $req)
    {
        $uid = $req->user()->id;
        $this->addBonusAmount($uid, $req->input('amount'));
        return redirect()->route('index');
    }

    private function addBonusAmount($uid, $amount){
        $model = new Models\Bonus();

        $model->where('user_id', '=', $uid);

        if ($model->exists()){
            $model = $model->first();
            $model->balance += $amount;
        }
        else{
            $model->user_id = $uid;
            $model->balance = $amount;
        }

        $model->save();
    }

}
