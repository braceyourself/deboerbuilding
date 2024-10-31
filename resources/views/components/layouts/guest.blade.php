@extends('layouts.base')
@section('content')
    <div x-data class="flex flex-col justify-between min-h-screen font-sans antialiased max-w-screen overflow-x-hidden"
         style="font-family: Serif,serif">

        <x-landing.header x-ref="header"/>

        <div
                {{ $attributes->merge(['class' => 'flex-grow']) }}
                :style="{marginTop: $refs.header.clientHeight + 'px'}"
        >
            {{ $slot }}
        </div>

        <x-landing.footer/>
    </div>
@endsection