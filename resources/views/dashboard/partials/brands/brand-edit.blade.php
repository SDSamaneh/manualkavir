<section class="py-4">
      <div class="container">
            <div class="row pb-4 bg-light p-3 mb-4 rounded">
                  <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                              <div class="col-sm-12 col-md-4">
                                    <label for="" class="form-label">نام برند </label>
                                    <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                                    @error('name')
                                    <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                    @enderror
                              </div>
                              <div class="col-sm-12 col-md-4">
                                    <label for="" class="form-label">برچسب</label>
                                    <input type="text" name="slug" class="form-control" value="{{$brand->slug}}">
                                    @error('slug')
                                    <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                    @enderror

                              </div>
                              <div class="col-sm-12 col-md-4">
                                    <div class="position-relative">
                                          <h6 class="my-2">تصویر فعلی برند</h6>
                                          @if($brand->thumbnail)
                                          <img src="{{ asset('storage/' . $brand->thumbnail) }}" alt="Brand Thumbnail" style="max-width: 100px; height: auto; display: block; margin-bottom: 10px;">
                                          @else
                                          <p class="text-muted">تصویری موجود نیست.</p>
                                          @endif

                                          <h6 class="my-2">آپلود تصویر جدید</h6>
                                          <label class="w-100" style="cursor:pointer;">
                                                <div class="input-group">
                                                      <span class="btn btn-custom cursor-pointer upload-button">آپلود فایل</span>
                                                      <input class="form-control stretched-link hidden-upload" type="file" name="thumbnail" />
                                                </div>
                                          </label>
                                    </div>
                                    @error('thumbnail')
                                    <small class="mt-2 d-inline-block text-danger">{{ $message }}</small>
                                    @enderror
                              </div>


                              <div class="col-sm-12 text-end mt-4">
                                    <input type="submit" value="ثبت" class="btn btn-success">
                              </div>
                        </div>
                  </form>
            </div>




      </div>
</section>