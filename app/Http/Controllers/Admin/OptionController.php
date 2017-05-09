<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Option;

class OptionController extends Controller
{
    public function dollarrate()
    {
        $option = Option::find(7);

        return view('admin.dollarrate.index', [
            'option' => $option,
        ]);
    }

    public function edit()
    {
        $options = Option::get();

        return view('admin.option.index', [
            'options' => $options,
        ]);
    }

    public function update(Request $request)
    {
        $options = Option::get();

        if ($request->has('option-7')) {
            $option = Option::find(7);
            $option->value = $request->get('option-7');
            $option->value_en = $request->get('option-7');
            $option->save();
        }
        else {
            foreach ($options as $option)
            {
                if ($option->id == 1 OR $option->id == 2 OR $option->id == 3) {
                    $option->value = $request->get('option-'.$option->id);
                    $option->value_en = $request->get('option-'.$option->id.'-en');
                }
                if ($option->id == 4 OR $option->id == 5) {
                    $option->value = $request->get('option-'.$option->id);
                    $option->value_en = $request->get('option-'.$option->id);
                }
                if ($option->id == 6) {
                    $array = array($request->get('lat'), $request->get('lon'));
                    $option->value = json_encode($array);
                    $option->value_en = json_encode($array);
                }
                $option->save();
            }
        }
            
        return back();
    }
}
