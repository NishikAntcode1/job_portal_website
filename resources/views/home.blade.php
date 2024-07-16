{{-- <h1>{{ auth()->user()->name }}</h1> --}}
@extends('frontend.layouts.app')

@section('main')
    @include('frontend.components.home.banner')
    @include('frontend.components.home.search')
    @include('frontend.components.home.category')
    @include('frontend.components.home.why_choose')
    {{-- @include('frontend.components.home.company') --}}
    @include('frontend.components.home.job')
    @include('frontend.components.home.job_info')
    @include('frontend.components.home.counter')
    @include('frontend.components.home.testimonial')
    @include('frontend.components.home.blog')
@endsection