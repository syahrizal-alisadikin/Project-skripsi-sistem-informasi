@extends('layouts.user', ['title' => 'Apache Surf'])

@section('content')
    <div class="page-content">
      <section class="hero">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
              <h1>Selamat <b>Datang!</b> <br> di <b>Apache</b> Surf Club</h1>
              <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
              <a class="btn btn-started mt-4 mb-auto" href="">Get Started</a>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 ml-auto">
              <img class="img-fluid rounded" src="https://picsum.photos/250">
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
                  <h2 class="text-center font-weight-bold">Welcome</h2>
                  <h2 class="text-center font-weight-bold">Apache Surf Club</h2>
                  <div class="col-lg-11 mx-auto mt-4" style="line-height:1.5rem;">
                  <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus fugiat quo qui at ut molestiae totam voluptates accusamus sapiente vero, fugit dolorum aliquam nesciunt omnis laborum recusandae eveniet. Excepturi, ea.
                    Eius, sit at libero quae nostrum earum repellat error animi. Veniam dignissimos obcaecati inventore vitae at, assumenda cupiditate officiis ad nisi temporibus quaerat culpa ea numquam necessitatibus libero. Quo, ad?
                    Soluta perspiciatis totam reprehenderit ad explicabo culpa ducimus quis eaque provident consequuntur! Neque optio iure, esse eum recusandae illum nisi harum excepturi id aliquid distinctio doloremque tempora asperiores atque amet?
                    Suscipit eos commodi fuga est iste? Minus et cupiditate enim quae quia, iusto iste voluptate cum placeat aut fugit quaerat amet sit officiis hic possimus rerum nostrum sapiente dolor tempora!
                    Ipsam consequuntur quia ipsum laborum nulla quidem repellendus, facere at ullam harum sit architecto culpa possimus illum? Possimus nihil facere vitae doloremque illo est, ratione quos beatae nostrum assumenda voluptate.
                </p>
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