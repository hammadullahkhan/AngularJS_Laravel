<?php

namespace App\Http\Controllers;

use App\TemperatureLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class TemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!view()->exists('home.temperature')) {
            return [
                'apiResponse' => [
                    'result' => 'Fail',
                    'message' => 'View does not exists',
                ]
            ];
        }

        return view('home.temperature');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $tempLog = new TemperatureLog();
        $tempLog->fahrenheit = $input['fahrenheit'];
        $tempLog->celsius = $input['celsius'];
        $inserted = $tempLog->save();

        if(isset($inserted)){

            return [
                'apiResponse' => [
                    'result' => 'Success'
                ]
            ];

        } else {

            return [
                'apiResponse' => [
                    'result' => 'Fail'
                ]
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
