@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <div class="h3 bold">Your Characters<a class="btn btn-outline-dark float-right" href="{{ url('/create-character') }}"><span class="h4 bold" aria-hidden="true">+</a></button></div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!count($characters))
                        <div class="alert alert-success">
                            You do not have any characters yet, please start by creating one!
                        </div>
                    @endif
                    @for ($i = 0; $i < count($characters); $i++)
                        @if ($i % 3 === 0)
                        <div class="row">
                        @endif
                            <div class="col-md-4">
                                <div><img style="width: 100%" src="{{ $characters[$i]->image }}"></div>
                                <div class="text-center h5 bold">{{ $characters[$i]->name }}</div>
                                <div class="text-left small">
                                  <div>
                                    <label for="str">Strength</label>
                                    <label id="str" for="str">{{ $characters[$i]->str }}</label>
                                  </div>
                                  <div class="float-right">{{ $characters[$i]->race }}</div>
                                  <div>
                                      <label for="dex">Dexterity</label>
                                      <label id="dex" for="dex">{{ $characters[$i]->dex }}</label>
                                  </div>
                                  <div class="float-right">{{ $characters[$i]->class }}</div>
                                  <div>
                                      <label for="con">Constitution</label>
                                      <label id="con" for="con">{{ $characters[$i]->con }}</label>
                                  </div>
                                  <div class="float-right">{{ $characters[$i]->gender }}</div>
                                  <div>
                                      <label for="int">Intelligence</label>
                                      <label id="int" for="int">{{ $characters[$i]->int }}</label>
                                  </div>
                                  <div>
                                      <label for="wis">Wisdom</label>
                                      <label id="wis" for="wis">{{ $characters[$i]->wis }}</label>
                                  </div>
                                  <div>
                                      <label for="cha">Charisma</label>
                                      <label id="cha" for="cha">{{ $characters[$i]->cha }}</label>
                                  </div>
                                </div>
                            </div>
                        @if ($i % 3 === 2)
                        </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
