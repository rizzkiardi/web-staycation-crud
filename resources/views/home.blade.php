@extends('layouts.app')
@section('content')
    <x-hero />

    <x-statistics :statistics="$statistics" />

    <x-featured-items :featured="$featured" />

    <x-other-items  />

    <x-testimonial :testimonial="$testimonial" />
@endsection    
