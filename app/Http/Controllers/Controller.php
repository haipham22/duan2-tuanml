<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param $request
     * @param $model
     * @return mixed
     */
    public function action($request, $model)
    {
        $sels = $model::find($request->ids);


        switch ($request->action) :
            case 'delele' :
                $sels->each(function ($item) {
                    if (is_active('users.index') && $item->id == \Auth::id()) {
                        flash(trans('lang.users.delete.self'));
                        return;
                    }
                    return $item->delete();
                });
                break;
            default :
                break;
        endswitch;
        return redirect()->back();
    }
}
