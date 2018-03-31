<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Portfolio;
use Validator;

class PortfoliosEditController extends Controller
{
    //
    public function execute(Portfolio $portfolio, Request $request) {
        if($request->isMethod('delete')) {
            $portfolio->delete();
            return redirect('admin')->with('status', 'Портфолио удалено');
        }
        
        if($request->isMethod('post')) {
            
           $input = $request->except('_token');
           $messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
            ];
           
           $validator = Validator::make($input,[
               'name' => 'required|max:255',
               'filter' => 'required|max:255'
           ],$messages);
           
           if($validator->fails()) {
               return redirect()
                       ->route('portfoliosEdit',['portfolio'=>$input['id']])
                       ->withErrors($validator);
           }
           
           if($request->hasFile('images')) {
                $file = $request->file('images');
                $file->move(public_path().'/assets/img',$file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);
           
            $portfolio->fill($input);
            
            if($portfolio->update()) {
                return redirect('admin')->with('status','Портфолио обновлено');
            }
           
        }
        
        $old = $portfolio->toArray();
        if(view()->exists('admin.portfolios_edit')) {
            
            $data = [
                'title' => 'Редактирование портфолио',
                'data' => $old
            ];
            return view('admin.portfolios_edit',$data);
        }
    } 
}
