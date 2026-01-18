@extends('layouts.master')

@section('css')
<style>
   
    .service-card img {height:200px;object-fit:cover}
    .gallery img {height:220px;object-fit:cover}
    .cta {background:linear-gradient(135deg,#1c5396,#069cff);color:#fff}

.pt-7 {
    padding-top: 180px;
}

</style>
@endsection

@section('content')

<x-service.intro :service="$service" />

<x-service.solutions :slug="$service->slug" />

<x-service.process />

<x-service.gallery :service="$service" />

<x-service.cta />

@endsection
