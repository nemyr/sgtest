<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetBonusRequest;
use App\Http\Requests\GetObjectRequest;
use Illuminate\Http\Request;
use App\Models;

class PrizeController extends Controller
{
    public function getMoneyAction()
    {

    }

    public function convertMoneyAction()
    {

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
        $model = new Models\Bonus();
        $model->where('user_id', '=', $uid);

        if ($model->exists()){
            $model = $model->first();
            $model->balance += $req->input('amount');
        }
        else{
            $model->user_id = $uid;
            $model->balance = $req->input('amount');
        }

        $model->save();

        return redirect()->route('index');
    }

}
