@extends('layouts.user', ['title' => 'Apache Surf'])

@section('content')
    <div class="page-content">
      <section class="hero">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
              <h1>Selamat <b>Datang!</b> <br> di <b>Apache</b> Surf Club</h1>
              <h5>Belajar Selancar Air Bersama Atlit Selancar Daerah ! </h5>
              <a class="btn btn-started mt-4 mb-auto" href="">Get Started</a>
            </div>
            <div class="col-lg-3 col-md-block col-sm-none  ml-auto">
              <img class="img-fluid rounded" src="{{ asset('assets/img/bg-hero2.jpg')  }}">
            </div>
          </div>
        </div>
      </section>
      <section class="class-surf" style="margin-top: 100px">
        <div class="container">
            <div class="row my-5">
              <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                <h2 class="font-weight-bold">Kelas Selancar Air</h2>
              </div>
            </div>
          <div class="row">
          @forelse ($kelas as $class)
            <div class="col-md-6 col-sm-12 ">
              <div class="component-products ">
                <div class="products-thumbnail">
                <img src="{{ $class->image }}" class="img-fluid products-image">
                </div>
                  <div class="products-text">{{$class->type}}</div>
                  <a class="btn btn-join p-1 mt-1" href="{{ route('detail', $class->slug) }}">Join
                  </a>
              </div>
              </div>
              @empty
              <div class="col-12 text-center py-5" data-aos="fade-up"
                data-aos-delay="100">
                No Class Found
              </div>
            
            @endforelse
          </div>
        </div>
      </section>
      <section class="store-new-products" style="margin-top: 100px">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card bg-success text-white">
                <div class="card-body">
                  <p class="mb-0">Map Location</p>
                  <h2 class="font-weight-bold">Apache Surf Club</h2>
                  <div class="embed-responsive embed-responsive-21by9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.316501814605!2d106.52082634876834!3d-6.9719366949385355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e429d1674376763%3A0x74de86e49d18355c!2sHome%20stay%20ASEP%20EDOM!5e0!3m2!1sid!2sid!4v1633483226450!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@include('includes.footer')
@endsection