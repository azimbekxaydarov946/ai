<?php

namespace App\Http\Livewire;

use App\Models\Attribut;
use App\Models\Input;
use App\Models\Test;
use App\Models\Value;
use Livewire\Component;

class UserComponent extends Component
{
    public $atributs;
    public $values;
    public $atr;
    public $val;
    public $atr2;
    public $vsl2;

    public $step;

    public $input;

    public function render()
    {
        $this->atributs = Attribut::all();
        $this->values = Value::all();
        $this->input = Input::with('attribut','value')->where('user_id',auth()->user()->id)->get();
        return view('livewire.user-component', ['atributs' => $this->atributs, 'values' => $this->values,'input'=>$this->input])->layout('layouts.base');
    }

    public function add_input($step=0)
    {
        $input = Input::orderBy('id', 'desc')->first();
        $rule = (empty($input)? 1: $input->rule);
        if(empty($input) || $input->step>1){
            Input::create([
                'attribute_id' => $this->atr,
                'value_id' => $this->val,
                'rule' => $rule,
                'user_id' => auth()->user()->id
            ]);
            session()->flash('success', 'Fakt' . ' muvaffaqiyat saqlandi ');
        }
        else{
            Input::create([
                'attribute_id' => $this->atr,
                'value_id' => $this->val,
                'rule' => $input->rule,
                'user_id' => auth()->user()->id
            ]);
            session()->flash('success', 'Fakt' . ' muvaffaqiyat qo\'shildi ');
        }
        $this->clear();
    }

    public function add_test($step)
    {
        $output=Input::orderBy('id', 'desc')->first();
        $test=Input::where('rule',$output->rule)->get();
        for($i=0;$i<count($test);$i++){
            $test[$i]->update([
                'step'=>$output->step+1
            ]);
        }
        session()->flash('success', 'Yechim' . ' muvaffaqiyat qo\'shildi ');
    }

    public function clear()
    {
        $this->atributs='';
        $this->values='';
        $this->atr='';
        $this->val='';
        $this->atr2='';
        $this->vsl2='';
        $this->step='';
        $this->input='';


    //     Input::where('active', 1)
    //   ->where('destination', 'San Diego')
    //   ->update(['delayed' => 1]);
    }
}
