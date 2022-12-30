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
        <div class="d-flex">
        <a href="{{ route('admin') }}" class="btn btn-outline-primary">Admin</a>
            <form action="{{route('logout')}}" method="post" class="mx-4">
                @csrf
                @method('post')
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
        <h3>{{ auth()->user()->name }}</h3>
    </div>

    <div class="row col-12">
        <form class="col-6" wire:submit.prevent="add_input">
            <label for="" class="d-block mx-2" style="font-size: 150%">Faktlar </label>
            <div class="d-flex mt-4">
                <select class="form-select" aria-label="Default select example" wire:model="atr">
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

                <select class="form-select" aria-label="Default select example" wire:model="val">
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
            <button type="submit" class="btn btn-primary mt-4">Saqlash</button>
        </form>

        <div class="col-6">
            <label for="" class="d-block  mx-2" style="font-size: 150%">Aniqlashtiriluvchi faktlar </label>
        <div class="d-flex mt-4">
            <select class="form-select" aria-label="Default select example" wire:model="atr2">
                {{-- <option selected value="">Open this select menu</option> --}}
                    {{-- @php
                        if(isset($atributs)):
                            foreach($atributs as $item):
                    @endphp
                                <option value="{{$item->id}}">{{$item->attribute}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp --}}
            </select>

            <label for="" class="d-block mx-2" style="font-size: 150%"> = </label>

            <select class="form-select" aria-label="Default select example" wire:model="val2">
                {{-- <option selected value="">Open this select menu</option> --}}
                    {{-- @php
                        if(isset($values)):
                            foreach($values as $value):
                    @endphp
                                <option value="{{$value->id}}">{{$value->value}}</option>
                    @php
                            endforeach;
                        endif;
                    @endphp --}}
                </select>
        </div>
        </div>


    </div>


    <form class="form-floating col-6 mt-3" style="padding-right: 1.5em;" wire:submit.prevent="add_test(false)">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 200px" disabled>
        @php
        if(!empty($input)):
        // echo (count($rules))?'':"Agar\n\t";
        foreach($input as $key=>$ite):
        // echo "P-".$ite->rule."\n\t";
        echo   ($key+1).'). '.$ite->attribut->attribute." = ".(($ite->value->value)??'')."\n\t";
        // echo   (($ite->step==1)?"Qadam":"Daraja")." = ".$ite->result->result."\n\t";
        endforeach;
        endif;
        @endphp
        </textarea>
        <input type="number" hidden  wire:model="step" value="true">
        <button type="submit" class="btn btn-success mt-4" >Yechim</button>
      </form>
      <div class="col-6">
        {{-- <label for="" class="d-block  mx-2" style="font-size: 150%">Aniqlashtiriluvchi faktlar </label> --}}
    <div class="d-flex mt-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Daraja" aria-label="Username" aria-describedby="basic-addon1" disabled>
          </div>

        <label for="" class="d-block mx-2" style="font-size: 150%"> = </label>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="OOp" aria-label="Username" aria-describedby="basic-addon1" disabled>
          </div>

    </div>
    </div>

</div>
