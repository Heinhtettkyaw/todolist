@extends('master')
@section('content')
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 offset-3 ">
                    <div class="my-3">
                     <a href="{{ route('post#home') }}" class="text-decoration-none">
                        <i class="fa-solid fa-arrow-left"></i> နောက်သို့
                     </a>
                    </div>
                    <h3>{{ $post[0]['title'] }}</h3>
                    <br>
                    <p class="text-muted">
                        {{ $post[0]['description'] }}
                    </p>

                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-7 mb-5">
                    <a href="{{ route('post#delete',$post[0]['id']) }}">
                      <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> ဖျက်ရန်</button>
                    </a>

                       <a href="{{ route('post#edit',$post[0]['id']) }}">
                      <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> ပြင်ဆင်ရန်</button>
                       </a>
                  </div>
            </div>
        </div>
@endsection
