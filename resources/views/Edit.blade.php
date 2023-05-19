@extends('master')
@section('content')
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 offset-3 ">
                    <div class="my-3">
                     <a href="{{ route('post#update',$post['id']) }}" class="text-decoration-none">
                        <i class="fa-solid fa-arrow-left"></i> နောက်သို့
                     </a>
                    </div>
                    <form action="{{ route('post#editData') }}" method="POST">
                        @csrf
                       <div class="text-group mb-3">
                        <input type="hidden" name="postId" value="{{ $post['id'] }}">
                        <label for="" class="mb-3">ခေါင်းစဥ်</label>
                        <input type="text" name="postTitle"  class="form-control  @error('postTitle') is-invalid @enderror"
                        value="{{ old('postTitle',$post['title']) }}">
                        @error('postTitle')
                        <div class="invalid-feedback">
                            {{-- <span class="text-danger">ခေါင်းစဥ် ထည့်သွင်းရန် လိုအပ်ပါသည်</span> --}}
                            {{$message}}
                        </div>

                        @enderror
                       </div>


                       <div class="text-group mb-3">
                        <label for="" class="mb-3">အကြောင်းအရာ</label>
                       <textarea name="postDescription" class="form-control @error('postDescription')
                       is-invalid    @enderror " cols="30" rows="10" placeholder="">{{ old('postDescription',$post['description']) }}</textarea>
                       @error('postDescription')
                       <div class="invalid-feedback">
                         {{-- <span class=" mt-1 text-danger">အကြောင်းအရာ ထည့်သွင်းရန် လိုအပ်ပါသည်</span> --}}
                         {{$message}}
                       </div>

                       @enderror
                    </div>
                       <div class=" mb-3">
                        <input type="submit" value="ပြင်ဆင်ရန်" class="btn btn-primary">
                       </div>
                    </form>

                </div>
            </div>
            {{-- <div class="row">
                <div class="col-3 offset-7 mb-5">
                    <a href="">
                      <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> ဖျက်ရန်</button>
                    </a>

                       <a href="">
                      <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> ပြင်ဆင်ရန်</button>
                       </a>
                  </div>
            </div> --}}
        </div>
@endsection
