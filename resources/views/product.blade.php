@extends('layouts.app')

@section('content')

<style>
    .varient .label{

    }
</style>


    @livewire('product', ['product' => $product])

@endsection
