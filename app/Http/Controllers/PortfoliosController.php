<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Portfolio;

class PortfoliosController extends Controller
{
    //
    public function execute() {
        if(view()->exists('admin.portfolios')) {
            $portfolios = Portfolio::all();
            
            $data = [
                'title' => 'Портфолио',
                'portfolios' => $portfolios
            ];
            return view('admin.portfolios',$data);
        }
        abort(404);
    }
}
