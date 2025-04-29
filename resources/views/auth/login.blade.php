@extends('layouts.dashboard.master')
@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<main>
      <!-- Inner intro START -->
      <section>
            <div class="container">
                  <div class="row rounded custom-box-shadow p-4 p-sm-5">
                        <div class="col-md-8 col-lg-8 col-xl-8 mx-auto">
                              <h2 class="text-center font-bold">ورود به حساب کاربری</h2>
                              <!-- Form START -->
                              <form method="post" action="{{route('login')}}" class="mt-4">
                                    @csrf
                                    <div class="row">
                                          <!-- idCard -->
                                          <div class="col-md-6">
                                                <div class="mb-3">
                                                      <label class="form-label" for="exampleInputId">کدملی</label>
                                                      <input type="text" name="idCard" class="form-control @error('idCard') border-danger @enderror" id="exampleInputId" value="{{old('idCard')}}">
                                                      @error('idCard')
                                                      <small class="form-text text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                          </div>
                                          <!-- Password -->
                                          <div class="col-md-6">
                                                <div class="mb-3">
                                                      <label class="form-label" for="exampleInputPassword1">رمز عبور</label>
                                                      <input type="password" name="password" class="form-control @error('password') border-danger @enderror" id="exampleInputPassword1">
                                                      @error('password')
                                                      <small class="form-text text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                          </div>
                                          <div class="row align-items-center mb-3 mt-3">

                                                <!-- Checkbox -->
                                                <div class="col-sm-6">
                                                      <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                                      <label class="form-check-label" for="exampleCheck1">مرا به خاطر بسپار</label>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                      <button type="submit" class="btn btn-success">ورود </button>
                                                </div>
                                          </div>
                                          <hr>
                                          <!-- Button -->
                                          <div class="row align-items-center">

                                                <div class="col-sm-8 text-sm-end">
                                                      <span>آیا هنوز ثبت نام نکرده اید؟ <a href="{{route('register')}}"><u>ثبت نام</u></a></span>
                                                </div>
                                          </div>
                                    </div>
                              </form>
                        </div>
                        <div class="col-lg-4">
                              <img src="{{ asset('storage/images/login.jpg') }}" class="img-fluid" />
                        </div>
                  </div>
            </div>
      </section>
      <!-- Inner intro END -->
</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection