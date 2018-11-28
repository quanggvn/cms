<?php
/**
 * Created by PhpStorm.
 * User: Ngoc Quang
 * Date: 11/26/2018
 * Time: 10:33 PM
 */ ?>
@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif
@foreach($errors->all() as $error)
    <p class="alert alert-danger">{{$error}}</p>
    @endforeach