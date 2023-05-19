@extends('master')
@section('content')
<div class="container">
    <div class="row mt-3">
        <h3 style="color:darkcyan "><b><i>ကျွန်ုပ်ဧ။် လုပ်ဆောင်ရန်များ</i></b></h3>
    </div>

    <div class="row mt-3">
        <div class="col-5 mt-1">
            <div class="p-3">
                {{-- Alert For Insert --}}
                @if (session('insertSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('insertSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" aria-hidden="true"></button>
                    </button>
                  </div>
                @endif
                {{-- ALert For Edit --}}
                @if (session('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('updateSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" aria-hidden="true"></button>
                    </button>
                  </div>
                @endif
                {{-- Alert for Delete --}}
                @if (session('deleteSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('deleteSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" aria-hidden="true"></button>
                    </button>
                  </div>
                @endif
                  {{-- validation --}}
                {{-- @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>

                        @endforeach

                    </ul>


                </div>
                @endif --}}
                <form action="{{ route('post#create') }}" method="POST">
                    @csrf
                   <div class="text-group mb-3">
                    <label for="">ခေါင်းစဥ်</label>
                    <input type="text" name="postTitle" value="{{old('postTitle')}}" class="form-control @error('postTitle') is-invalid @enderror " placeholder="Enter Post Title" >
                    @error('postTitle')
                    <div class="invalid-feedback">
                        {{-- <span class="text-danger">ခေါင်းစဥ် ထည့်သွင်းရန် လိုအပ်ပါသည်</span> --}}
                        {{$message}}
                    </div>

                    @enderror
                </div>
                   <div class="text-group mb-3">
                    <label for="">အကြောင်းအရာ</label>
                    <textarea name="postDescription" value="" class="form-control @error('postDescription')
                    is-invalid    @enderror " cols="30" rows="10" placeholder="Enter Post-description" >{{old('postDescription')}}</textarea>
                    @error('postDescription')
                    <div class="invalid-feedback">
                      {{-- <span class=" mt-1 text-danger">အကြောင်းအရာ ထည့်သွင်းရန် လိုအပ်ပါသည်</span> --}}
                      {{$message}}
                    </div>

                    @enderror
                </div>
                   <div class=" mb-3">
                    <input type="submit" value="ထည့်ရန်" class="btn btn-primary">
                   </div>
                </form>
            </div>
        </div>
        <div class="col-7">
            <div class="mb-3">  <span ><b>Total- {{$posts->total()}}</b></span></div>

            <div class="data-container">
                @foreach ($posts as $item )
                <div class="post p-3 shadow mb-3">
                    <h5>{{ $item['title'] }}</h5>
                    {{-- <p class="text-muted">{{ $item['description'] }}</p> --}}
                    <p class="text-muted">{{ Str::words($item['description'], 20, '...') }}</p>

                    {{-- Footer   --}}
                    <div class="text-end">
                      <a href="{{ route('post#delete',$item['id']) }}">
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>ဖျက်ရန်</button>
                      </a>


                        {{-- <form action="{{  route('post#delete',$item['id'])}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>ဖျက်ရန်</button>

                        </form> --}}
                        <a href="{{ route('post#update',$item['id'])}}">
                        <button class="btn btn-sm btn-primary"><i class="fa-regular fa-eye"></i>အသေးစိတ်</button>
                         </a>
                    </div>
                </div>

                @endforeach

                {{$posts->links()}}


            </div>

        </div>
    </div>
</div>
@endsection
