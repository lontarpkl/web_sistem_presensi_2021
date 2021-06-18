@extends('layouts.master')
@section('title', 'Pengumuman ' . $post->title)

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Pengumuman</h1>
        </div>
        <a href="{{ route('posts.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-arrow-left"></i>Kembali</a>
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" data-background="{{ Storage::url($post->thumbnail) }} ">
                    <div class="hero-inner text-center">
                        <h1 class="pt-5">{{ $post->title }} </h1>
                        <p class="lead "><i class="fas fa-user"></i> {{ $post->author }} </p>
                        <p class="lead pb-5"><i class="fas fa-calendar-alt"></i> {{ $post->created_at->format('d-m-Y') }}</p>
                       
                    </div>
                </div>
                <div class="mt-4">
                    <p >{!! $post->content !!}</p>
                </div>
                </div>
                </div>
                </div>
            </div>
    
    </section>
</div>
@endsection
