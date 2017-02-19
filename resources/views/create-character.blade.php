@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <div class="h3 bold">Build Your Character!</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create-character') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" name="name" class="form-control" id="characterName" aria-describedby="character name" placeholder="Enter character name" required>
                            <input id="_image" type="hidden" name="_image" class="form-control" id="characterName" aria-describedby="character name" placeholder="Enter character name" value="https://images-na.ssl-images-amazon.com/images/M/MV5BMjYwNDlhMWYtMWE1ZS00ZjVhLWI1NzItMjQ5ZGI4NTIwZjQ5L2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg">
                            <input id="_str" name="_str" class="form-control" type="hidden" value="0"></input>
                            <input id="_dex" name="_dex" class="form-control" type="hidden" value="0"></input>
                            <input id="_con" name="_con" class="form-control" type="hidden" value="0"></input>
                            <input id="_int" name="_int" class="form-control" type="hidden" value="0"></input>
                            <input id="_wis" name="_wis" class="form-control" type="hidden" value="0"></input>
                            <input id="_cha" name="_cha" class="form-control" type="hidden" value="0"></input>
                            <label for="name">Class</label>
                            <select id="class" name="class" class="form-control">
                                <option value="wizard">Wizard</option>
                                <option value="warrior">Warrior</option>
                                <option value="cleric">Cleric</option>
                            </select>
                            <label for="name">Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <label for="name">Race</label>
                            <select id="race" name="race" class="form-control">
                                <option value="klingon">Klingon</option>
                                <option value="bongladesh">Bongladesh</option>
                                <option value="timelord">Time Lord</option>
                                <option value="dalek">Dalek</option>
                                <option value="wookie">Wookiee</option>
                            </select>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="image">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <div>
                                          <label for="str">Strength</label>
                                          <label id="str" for="str">0</label>
                                        </div>
                                        <div>
                                            <label for="dex">Dexterity</label>
                                            <label id="dex" for="dex">0</label>
                                        </div>
                                        <div>
                                            <label for="con">Constitution</label>
                                            <label id="con" for="con">0</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="int">Intelligence</label>
                                        <label id="int" for="int">0</label>
                                    </div>
                                    <div>
                                        <label for="wis">Wisdom</label>
                                        <label id="wis" for="wis">0</label>
                                    </div>
                                    <div>
                                        <label for="cha">Charisma</label>
                                        <label id="cha" for="cha">0</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button id="generate-avatar" type="button" class="btn btn-primary">Random Avatar</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <button id="generate-stats" type="button" class="btn btn-primary">Regenerate Stats</button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success float-right">Create Character</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
