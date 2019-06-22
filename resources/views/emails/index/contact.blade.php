@extends('layouts.email')

@section('title', 'Contact Form Results From Avant-Garde Homes')

@section('heading', 'Contact Form Results')
@section('heading-color', '#2ca4b3')

@section('content')

    <p>
        <strong>First Name:</strong> {{ $first_name }}
    </p>

    <p>
        <strong>First Name:</strong> {{ $last_name }}
    </p>

    <p>
        <strong>Email:</strong> {{ $email }}
    </p>

    <p>
        <strong>Phone:</strong> {{ $phone }}
    </p>

    <p>
        <strong>Comments:</strong> {{ $comments }}
    </p>

@endsection