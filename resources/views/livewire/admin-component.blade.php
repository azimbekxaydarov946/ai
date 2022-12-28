<div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-12 mb-4 mt-3 px-3 d-flex justify-content-between">
        <a href="{{ route('user') }}" class="btn btn-outline-primary ">User</a>
        <h3>{{ auth()->user()->name }}</h3>
    </div>

    <div class="row col-12">

        <form class="col-4" wire:submit.prevent="add_atribut">
            <h2 for="floatingTextarea">Atribut</h2>
            <textarea class="form-control" placeholder="Ma'lumot kiriting" id="floatingTextarea2" style="height: 100px"
                wire:model="atr"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Saqlash</button>
        </form>

        <form class="col-4" wire:submit.prevent="add_value">
            <h2 for="floatingTextarea">Qiymat</h2>
            <textarea class="form-control" placeholder="Ma'lumot kiriting" id="floatingTextarea2" style="height: 100px"
                wire:model="val"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Saqlash</button>
        </form>

        <form class="col-4" wire:submit.prevent="add_result">
            <h3 for="exampleFormControlInput1" class="form-label">Tashxis</h3>
            <input type="text" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Nomi"
                wire:model="result">
            <h3 for="exampleFormControlInput1" class="form-label">Batafsil</h3>
            <textarea class="form-control" placeholder="Batafsil ma'lumot" id="floatingTextarea2" style="height: 100px"
                wire:model="description"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Saqlash</button>
        </form>

    </div>

    <form class="form-control mt-3" wire:submit.prevent="add_rule">

        <h1 class="fs-1 mb-4">Qoidalar: </h1>

        <div class="d-flex mb-4">
            <label for="" class="d-block mx-2" style="font-size: 150%">Agar </label>
            <select class="form-select" aria-label="Default select example" wire:model="select1">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($atributs)):
                            foreach($atributs as $item):
                    @endphp
                                <option value="{{$item->id}}">{{$item->attribute}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>

            <label for="" class="d-block mx-2" style="font-size: 150%"> = </label>

            <select class="form-select" aria-label="Default select example" wire:model="size1">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($values)):
                            foreach($values as $value):
                    @endphp
                                <option value="{{$value->id}}">{{$value->value}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>
        </div>

        <div class="d-flex mb-4">
            <label for="" class="d-block mx-2" style="font-size: 150%">Va </label>
            <select class="form-select" aria-label="Default select example" wire:model="select2">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($atributs)):
                            foreach($atributs as $item):
                    @endphp
                                <option value="{{$item->id}}">{{$item->attribute}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>

            <label for="" class="d-block mx-2" style="font-size: 150%"> = </label>

            <select class="form-select" aria-label="Default select example" wire:model="size2">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($values)):
                            foreach($values as $value):
                    @endphp
                                <option value="{{$value->id}}">{{$value->value}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>
        </div>

        <div class="d-flex mb-3">
            <label for="" class="d-block mx-2" style="font-size: 150%">Va </label>
            <select class="form-select" aria-label="Default select example" wire:model="select3">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($atributs)):
                            foreach($atributs as $item):
                    @endphp
                                <option value="{{$item->id}}">{{$item->attribute}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>

            <label for="" class="d-block mx-2" style="font-size: 150%"> = </label>

            <select class="form-select" aria-label="Default select example" wire:model="size3">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($values)):
                            foreach($values as $value):
                    @endphp
                                <option value="{{$value->id}}">{{$value->value}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>
        </div>

        <div class="d-flex">
            <label for="" class="d-block mx-2" style="width:10%;font-size: 150%">U holda</label>
            <select class="form-select" aria-label="Default select example"  wire:model="step">
                <option selected value="">Open this select menu</option>
                <option value="1">Qadam</option>
                <option value="2">Daraja</option>
            </select>

            <label for="" class="d-block mx-2" style="font-size: 150%"> = </label>

            <select class="form-select" aria-label="Default select example" wire:model="rating">
                <option selected value="">Open this select menu</option>
                    @php
                        if(isset($results)):
                            foreach($results as $resul):
                    @endphp
                                <option value="{{$resul->id}}">{{$resul->result}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Saqlash</button>

    </form>

    <div class="form-floating mt-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 200px" disabled>
        @php
        if(isset($rules)):
        echo "Agar\n\t";
        foreach($rules as $key=>$ite):
        echo "P-".$ite->rule."\n\t";
        echo   $ite->attribut->attribute." = ".$ite->value->value."\n\t";
        echo   (($ite->step==1)?"Qadam":"Daraja")." = ".$ite->result->result."\n\t";
        endforeach;
        endif;
        @endphp
        </textarea>
      </div>
</div>
