@extends('layouts.email')

@section('title', 'Help/Feedback Form Results From Avant-Garde Client Area')

@section('heading', 'Help/Feedback Form Results')
@section('heading-color', '#2ca4b3')

@section('content')

    <p>
        <strong>First Name:</strong> {{ $first_name }}
    </p>

    <p>
        <strong>Last Name:</strong> {{ $last_name }}
    </p>

    <p>
        <strong>Email:</strong> {{ $email }}
    </p>

    <p>
        <strong>Comments:</strong> {{ $comments }}
    </p>

@endsection