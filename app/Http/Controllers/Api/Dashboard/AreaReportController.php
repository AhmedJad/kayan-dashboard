<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Traits\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaReportController extends Controller
{

    use Message;

    public function storeReport(Request $request)
    {

        $order = $request->order == 'asc' ? 'asc' : 'desc';
        $clients = Client::
            join('areas', 'areas.id', 'clients.area_id')
            ->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('clients.created_at', ">=", $request->from_date)
                    ->whereDate('clients.created_at', "<=", $request->to_date);
                });
            })
            ->select(DB::raw('SUM(area_id) as price'), 'areas.id', 'areas.name')
            ->groupBy(['areas.id', 'areas.name'])
            ->orderBy('price',$order)
            ->take(10)
            ->get();

        return $this->sendResponse(['clients' => $clients], 'Data exited successfully');
    }



    /*public function suggestionReport(Request $request)
    {
        $clients = SuggestionUser::
           with(['user:id,name','suggestion:id,name'])
           ->where(function ($q) use ($request) {
                $q->when($request->from_date && $request->to_date, function ($q) use ($request) {
                    $q->whereDate('created_at', ">=", $request->from_date)
                        ->whereDate('created_at', "<=", $request->to_date);
                });
            })
            ->paginate(15);

        return $this->sendResponse(['clients' => $clients], 'Data exited successfully');
    }*/

}
