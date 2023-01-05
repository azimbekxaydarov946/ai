<?php

namespace App\Http\Livewire;

use App\Models\Attribut;
use App\Models\Result;
use App\Models\Rule;
use App\Models\Value;
use Livewire\Component;

class AdminComponent extends Component
{
    public $atr;
    public $val;
    public $result;
    public $description;
    public $rules;

    public $atributs;
    public $values;
    public $results;

    public $select1;
    public $select2;
    public $select3;
    public $size1;
    public $size2;
    public $size3;
    public $rating;
    public $step;

    public function render()
    {
        $this->atributs = Attribut::all();
        $this->values = Value::all();
        $this->results = Result::all();
        $rules = Rule::orderBy('id', 'desc')->first();
        $this->rules = Rule::query()->with('user', 'attribut', 'value', 'result')->where('user_id', auth()->user()->id);
        if ($this->rules && isset($rules->rule)) {
            $this->rules = $this->rules->where('rule', $rules->rule);
        }
        $this->rules = $this->rules->get();
        return view('livewire.admin-component', ['atributs' => $this->atributs, 'values' => $this->values, 'results' => $this->results, 'rules' => $this->rules])->layout('layouts.base');
    }

    public function add_atribut()
    {
        $error = Attribut::where('attribute', $this->atr)->first();
        if (empty($error)) {
            $atribut = $this->check_test($this->atr);
            for ($i = 0; $i < count($atribut); $i++) {
                str_replace('', ' ', $atribut[$i]);
                if ($atribut[$i] != '') {
                    Attribut::create([
                        'attribute' => $atribut[$i]
                    ]);
                }
            }
            session()->flash('success', 'Attribut' . ' muvaffaqiyat saqlandi ');
        } else {
            session()->flash('error', 'Attribut' . ' mavjud !!!');
        }
        $this->clear();
    }

    public function add_value()
    {
        $error = Value::where('value', $this->val)->first();
        if (empty($error)) {
            $values = $this->check_test($this->val);
            for ($i = 0; $i < count($values); $i++) {
                str_replace('', ' ', $values[$i]);
                if ($values[$i] != '') {
                    Value::create([
                        'value' => $values[$i]
                    ]);
                }
            }
            session()->flash('success', 'Qiymat' . ' muvaffaqiyat saqlandi ');
        } else {
            session()->flash('error', 'Qiymat' . ' mavjud !!!');
        }
        $this->clear();
    }

    public function add_result()
    {
        $error = Result::where('result', $this->result)->first();
        if (empty($error)) {
            $atribut = $this->check_test($this->atr);
            for ($i = 0; $i < count($atribut); $i++) {
                Result::create([
                    'result' => $this->result,
                    'description' => $this->description ?? null,
                ]);
            }
            session()->flash('success', 'Tashxis' . ' muvaffaqiyat saqlandi ');
        } else {
            session()->flash('error', 'Tashxis' . ' mavjud !!!');
        }
        $this->clear();
    }


    public function add_rule()
    {
        $check = Rule::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
        $rule = $check->rule ?? 0;
        $rule = $rule + 1;
        if ($rule > 0) {
            if (!empty($this->select1)) {
                if (!empty($this->select2) || !empty($this->select3)) {
                    if (empty($this->rating)) {
                        session()->flash('error', 'U holdada qiymat yo\'q !!!');
                    } else {
                        Rule::create([
                            'attribute_id' => $this->select1,
                            'value_id' => $this->size1,
                            'result_id' => $this->rating,
                            'rule' => $rule,
                            'user_id' => auth()->user()->id,
                        ]);
                        session()->flash('success', 'Muvaffaqiyat saqlandi ');
                    }
                } else {
                    session()->flash('error', 'Qiymat to\'liq emas !!!');
                }
            }
            if (!empty($this->select2)) {
                if (empty($this->rating)) {
                    $check = Rule::orderBy('id', 'desc')->first();
                    Rule::create([
                        'attribute_id' => $this->select2,
                        'value_id' => $this->size2,
                        'result_id' => $check->result_id,
                        'rule' => $check->rule,
                        'user_id' => auth()->user()->id,
                    ]);
                    session()->flash('success', 'Qoidaga qiymat qo\'shildi');
                } else
                if (!empty($this->rating) && empty($this->select1)) {
                    $check = Rule::orderBy('id', 'desc')->first();
                    Rule::create([
                        'attribute_id' => $this->select2,
                        'value_id' => $this->size2,
                        'result_id' => $check->result_id,
                        'rule' => $check->rule,
                        'user_id' => auth()->user()->id,
                    ]);
                    session()->flash('success', 'Qoidaga qiymat qo\'shildi');
                } else {
                    Rule::create([
                        'attribute_id' => $this->select2,
                        'value_id' => $this->size2,
                        'result_id' => $this->rating,
                        'rule' => $rule,
                        'user_id' => auth()->user()->id,
                    ]);
                    session()->flash('success', 'Muvaffaqiyat saqlandi ');
                }
            }
            if (!empty($this->select3)) {
                if (empty($this->rating)) {
                    $check = Rule::orderBy('id', 'desc')->first();
                    Rule::create([
                        'attribute_id' => $this->select3,
                        'value_id' => $this->size3,
                        'result_id' => $check->result_id,
                        'rule' => $check->rule,
                        'user_id' => auth()->user()->id,
                    ]);
                    session()->flash('success', 'Qoidaga qiymat qo\'shildi');
                } else
                if (!empty($this->rating) && empty($this->select1)) {
                    $check = Rule::orderBy('id', 'desc')->first();
                    Rule::create([
                        'attribute_id' => $this->select2,
                        'value_id' => $this->size2,
                        'result_id' => $check->result_id,
                        'rule' => $check->rule,
                        'user_id' => auth()->user()->id,
                    ]);
                    session()->flash('success', 'Qoidaga qiymat qo\'shildi');
                } else {
                    Rule::create([
                        'attribute_id' => $this->select3,
                        'value_id' => $this->size3,
                        'result_id' => $this->rating,
                        'rule' => $rule,
                        'user_id' => auth()->user()->id,
                    ]);
                    session()->flash('success', 'Muvaffaqiyat saqlandi ');
                }
            }
        } else {
            session()->flash('error', 'Mavjud !!!');
        }
        $this->clear();
    }

    public function check_test($atr)
    {
        if (strpos($atr, ',')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode(',', $atr);
            return $atribut;
        } else
        if (strpos($atr, '.')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode('.', $atr);
            return $atribut;
        } else
        if (strpos($atr, '-')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode('-', $atr);
            return $atribut;
        } else
        if (strpos($atr, '*')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode('*', $atr);
            return $atribut;
        } else
        if (strpos($atr, ')')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode(')', $atr);
            return $atribut;
        } else
        if (strpos($atr, '+')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode('+', $atr);
            return $atribut;
        } else
        if (strpos($atr, '/')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode('/', $atr);
            return $atribut;
        } else
        if (strpos($atr, '=')) {
            $atr = str_replace('', ' ', $atr);
            $atribut = explode('=', $atr);
            return $atribut;
        } else
        if (strpos($atr, ' ')) {
            $atr = str_replace(',', ' ', $atr);
            $atribut = explode(',', $atr);
            return $atribut;
        } else {
            $atribut[] = $atr;
            return $atribut;
        }
    }

    public function clear()
    {
        $this->atr = '';
        $this->val = '';
        $this->result = '';
        $this->description = '';
        $this->atributs = '';
        $this->values = '';
        $this->results = '';
        $this->select1 = '';
        $this->select2 = '';
        $this->select3 = '';
        $this->size1 = '';
        $this->size2 = '';
        $this->size3 = '';
        $this->rating = '';
        $this->step = '';
    }
}
