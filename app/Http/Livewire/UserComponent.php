<?php

namespace App\Http\Livewire;

use App\Models\Attribut;
use App\Models\Input;
use App\Models\Rule;
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
        $this->input = Input::with('attribut', 'value')->where('user_id', auth()->user()->id)->get();
        return view('livewire.user-component', ['atributs' => $this->atributs, 'values' => $this->values, 'input' => $this->input])->layout('layouts.base');
    }

    public function add_input()
    {
        $input = Input::where('attribute_id', $this->atr)
            ->where('attribute_id', $this->val)
            ->orderBy('id', 'desc')->first();
        $rule = (empty($input) ? 1 : $input->rule);
        if (empty($input)) {
            Input::create([
                'attribute_id' => $this->atr,
                'value_id' => $this->val,
                'rule' => $rule,
                'user_id' => auth()->user()->id
            ]);
            session()->flash('success', 'Fakt' . ' muvaffaqiyat saqlandi ');
        } else {
            $input = Input::where('attribute_id', $this->atr)
                ->where('attribute_id', $this->val)
                ->first();

            if (empty($input)) {
                Input::create([
                    'attribute_id' => $this->atr,
                    'value_id' => $this->val,
                    'rule' => $input->rule,
                    'user_id' => auth()->user()->id
                ]);
                session()->flash('success', 'Fakt' . ' muvaffaqiyat qo\'shildi ');
            } else {
                session()->flash('error', 'Fakt' . ' mavjud!!! ');
            }
        }
        $this->clear();
    }

    public function add_test()
    {
        $output = Input::orderBy('id', 'desc')->first();
        $input = Input::where('rule', $output->rule)->get()->toArray();
        // dd($input);
        $rule = Rule::where('rule', $output->rule)->groupBy('rule')->get()->toArray();
        // dd($rule);
        session()->flash('success', 'Yechim' . ' muvaffaqiyat qo\'shildi ');
    }

    public function clear()
    {
        $this->atributs = '';
        $this->values = '';
        $this->atr = '';
        $this->val = '';
        $this->atr2 = '';
        $this->vsl2 = '';
        $this->step = '';
        $this->input = '';


        //     Input::where('active', 1)
        //   ->where('destination', 'San Diego')
        //   ->update(['delayed' => 1]);
    }
}
