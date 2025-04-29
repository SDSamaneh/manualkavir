<section class="py-4">
      <div class="container">
            <div class="row pb-4 bg-light p-3 mb-4 rounded">
                  <form action="{{ route('class.store') }}" method="post">
                        @csrf
                        <div class="row">
                              <!-- انتخاب برند -->
                              <div class="col-md-6 mb-3">
                                    <label for="brand_id" class="form-label">انتخاب برند</label>
                                    <select name="brand_id" id="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
                                          <option value="">-- انتخاب برند --</option>
                                          @foreach($brands as $brand)
                                          <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                          </option>
                                          @endforeach
                                    </select>
                                    @error('brand_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                              </div>

                              <!-- نام کلاس -->
                              <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">نام کلاس</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="مثلاً Naked, Sport..." value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                              </div>

                              <!-- دکمه ذخیره -->
                              <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success">ثبت کلاس</button>
                              </div>
                        </div>

                  </form>
            </div>
      </div>
</section>