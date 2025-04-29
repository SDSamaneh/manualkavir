<section class="py-4">
      <div class="container">
            <div class="row pb-4">
                  <div class="col-12">
                        <h1 class="mb-0 h3">ایجاد راهنما </h1>
                  </div>
            </div>
            <div class="row">
                  <div class="col-12">
                        <div class="card border">
                              <div class="card-body">
                                    <form action="{{route('manuals.store')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                                <div class="col-md-3 mb-3">
                                                      <label for="brand_id" class="form-label">انتخاب برند</label>
                                                      <select name="brand_id" id="brand_id" class="form-select">
                                                            <option value="">-- انتخاب کنید --</option>
                                                            @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                                  {{ $brand->name }}
                                                            </option>
                                                            @endforeach
                                                      </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label for="classe_id" class="form-label">انتخاب کلاس</label>
                                                      <select name="classe_id" id="classe_id" class="form-select" disabled>
                                                            <option value="">-- ابتدا برند را انتخاب کنید --</option>
                                                      </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label for="motormodel_id" class="form-label">انتخاب مدل</label>
                                                      <select name="motormodel_id" id="motormodel_id" class="form-select" disabled>
                                                            <option value="">-- ابتدا کلاس را انتخاب کنید --</option>
                                                      </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label class="form-label">عنوان</label>
                                                      <input id="con-name" name="title" type="text" class="form-control" placeholder="عنوان محصول" value="">
                                                      @error('title')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label class="form-label">برچسب</label>
                                                      <input type="text" name="slug" class="form-control" value="">
                                                      @error('slug')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                      <label class="form-label">سال</label>
                                                      <input type="text" name="year" class="form-control" value="">
                                                      @error('year')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label class="form-label">سایت کویر</label>
                                                      <input type="url" name="urlkavir" class="form-control" placeholder="لینک محصول در سایت کویرموتور">

                                                      @error('urlkavir')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label class="form-label"> سایت خارجی</label>
                                                      <input type="url" name="urlother" class="form-control" placeholder="">

                                                      @error('urlother')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <label class="form-label"> آدرس در شبکه</label>
                                                      <input type="url" name="urlnetwork" class="form-control" value="">

                                                      @error('urlnetwork')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="d-flex justify-content-between align-items-baseline mb-4 mt-4">
                                                      <p class="fw-bold mb-3 fs-5 position-relative news-section-title text-danger">راهنمای محصول<span class="fw-normal fs-6">
                                                            </span>
                                                      </p>
                                                      <div class="border-bottom border-danger border-2 opacity-1" style="width: 80%;">

                                                      </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">انتخاب فایل COC</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <div class="input-group">
                                                                        <input class="form-control stretched-link  hidden-upload" type="file" name="fileCoc" id="fileCoc" />
                                                                  </div>
                                                            </label>
                                                      </div>
                                                      @error('fileCoc')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2"> فایل راهنمای کاربری فارسی</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <div class="input-group">
                                                                        <input class="form-control stretched-link  hidden-upload" type="file" name="userGuideFa" />
                                                                  </div>
                                                            </label>
                                                      </div>
                                                      @error('userGuideFa')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2"> فایل راهنمای کاربری انگلیسی</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="userGuideEn" />
                                                            </label>
                                                      </div>
                                                      @error('userGuideEn')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2"> فایل راهنمای تعمیر فارسی</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="repairGuideFa" />
                                                            </label>
                                                      </div>
                                                      @error('repairGuideFa')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2"> فایل راهنمای تعمیر انگلیسی</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="repairGuideEn" />
                                                            </label>
                                                      </div>
                                                      @error('repairGuideEn')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2"> فایل راهنمای قطعات</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="partsGuide" />
                                                            </label>
                                                      </div>
                                                      @error('partsGuide')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="d-flex justify-content-between align-items-baseline mb-4 mt-4">
                                                      <p class="fw-bold mb-3 fs-5 position-relative news-section-title text-danger">جداول<span class="fw-normal fs-6">
                                                            </span>
                                                      </p>
                                                      <div class="border-bottom border-danger border-2 opacity-1" style="width: 80%;">
                                                      </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">جدول بازرسی (PDI) </h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="pdi" />
                                                            </label>
                                                      </div>
                                                      @error('pdi')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">جدول سرویس دوره ای </h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="periodicService" />
                                                            </label>
                                                      </div>
                                                      @error('periodicService')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="d-flex justify-content-between align-items-baseline mb-4 mt-4">
                                                      <p class="fw-bold mb-3 fs-5 position-relative news-section-title text-danger">بولتن فنی<span class="fw-normal fs-6">
                                                            </span>
                                                      </p>
                                                      <div class="border-bottom border-danger border-2 opacity-1" style="width: 80%;">

                                                      </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">بولاتن فنی 1</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="Bulletin1" />
                                                            </label>
                                                      </div>
                                                      @error('Bulletin1')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">بولاتن فنی 2</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="Bulletin2" />
                                                            </label>
                                                      </div>
                                                      @error('Bulletin2')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">بولاتن فنی 3</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="Bulletin3" />
                                                            </label>
                                                      </div>
                                                      @error('Bulletin3')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                      <div class="position-relative">
                                                            <h6 class="my-2">فایل گزارش بولتن ها</h6>
                                                            <label class="w-100" style="cursor:pointer;">
                                                                  <input class="form-control stretched-link  hidden-upload" type="file" name="Bulletins" />
                                                            </label>
                                                      </div>
                                                      @error('Bulletins')
                                                      <small class="mt-2 d-inline-block text-danger">{{$message}}</small>
                                                      @enderror
                                                </div>

                                                <div class="col-12 mt-3 text-end">
                                                      <button class="btn btn-success" type="submit">ایجاد راهنما</button>
                                                </div>
                                          </div>

                                          <input type="hidden" id="old_brand_id" value="{{ old('brand_id') }}">
                                          <input type="hidden" id="old_classe_id" value="{{ old('classe_id') }}">
                                          <input type="hidden" id="old_motormodel_id" value="{{ old('motormodel_id') }}">
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>

@section('scripts')
<script>
      $(document).ready(function() {

            function loadClasses(brandId, selectedClassId = null) {
                  if (brandId) {
                        $.ajax({
                              url: '/dashboard/get-classes/' + brandId,
                              type: 'GET',
                              dataType: 'json',
                              success: function(data) {
                                    $('#classe_id').empty().prop('disabled', false);
                                    $('#classe_id').append('<option value="">-- انتخاب کلاس --</option>');
                                    $.each(data, function(id, name) {
                                          var selected = (id == selectedClassId) ? 'selected' : '';
                                          $('#classe_id').append('<option value="' + id + '" ' + selected + '>' + name + '</option>');
                                    });
                              }
                        });
                  } else {
                        $('#classe_id').empty().prop('disabled', true).append('<option>-- ابتدا برند را انتخاب کنید --</option>');
                  }
            }

            function loadModels(classId, selectedModelId = null) {
                  if (classId) {
                        $.ajax({
                              url: '/dashboard/get-models/' + classId,
                              type: 'GET',
                              dataType: 'json',
                              success: function(data) {
                                    $('#motormodel_id').empty().prop('disabled', false);
                                    $('#motormodel_id').append('<option value="">-- انتخاب مدل --</option>');
                                    $.each(data, function(id, name) {
                                          var selected = (id == selectedModelId) ? 'selected' : '';
                                          $('#motormodel_id').append('<option value="' + id + '" ' + selected + '>' + name + '</option>');
                                    });
                              }
                        });
                  } else {
                        $('#motormodel_id').empty().prop('disabled', true).append('<option>-- ابتدا کلاس را انتخاب کنید --</option>');
                  }
            }

            // وقتی برند تغییر کند
            $('#brand_id').on('change', function() {
                  var brandId = $(this).val();
                  loadClasses(brandId);
                  $('#motormodel_id').empty().prop('disabled', true).append('<option>-- ابتدا کلاس را انتخاب کنید --</option>');
            });

            // وقتی کلاس تغییر کند
            $('#classe_id').on('change', function() {
                  var classId = $(this).val();
                  loadModels(classId);
            });

            var oldBrandId = $('#old_brand_id').val();
            var oldClassId = $('#old_classe_id').val();
            var oldMotormodelId = $('#old_motormodel_id').val();

            if (oldBrandId) {
                  loadClasses(oldBrandId, oldClassId);
            }

            if (oldClassId) {
                  loadModels(oldClassId, oldMotormodelId);
            }
      });
</script>
@endsection