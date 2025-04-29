<section class="py-4">
      <div class="container">
            <div class="row pb-4 bg-light p-3 mb-4 rounded">
                  <form action="{{ route('motormodel.store') }}" method="post">
                        @csrf
                        <div class="row">
                              <div class="col-sm-12 col-md-4">
                                    <label for="brand_id" class="form-label">انتخاب برند</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                          <option value="">-- انتخاب کنید --</option>
                                          @foreach($brands as $brand)
                                          <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                          </option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="col-sm-12 col-md-4">
                                    <label for="classe_id" class="form-label">انتخاب کلاس</label>
                                    <select name="classe_id" id="classe_id" class="form-control" disabled>
                                          <option value="">-- ابتدا برند را انتخاب کنید --</option>
                                    </select>
                              </div>
                              <div class="col-sm-12 col-md-4">
                                    <label for="" class="form-label">نام مدل</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                    <small class="mt-2 d-inline-block text-danger">{{ $message }}</small>
                                    @enderror
                              </div>
                              <div class="col-sm-12 text-end mt-4">
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                              </div>
                        </div>
                  </form>
                  <!-- اینجا مقادیر old رو به صورت مخفی می‌فرستیم -->
                  <input type="hidden" id="old_brand_id" value="{{ old('brand_id') }}">
                  <input type="hidden" id="old_classe_id" value="{{ old('classe_id') }}">
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
                                    $('#classe_id').empty();
                                    $('#classe_id').prop('disabled', false);
                                    $('#classe_id').append('<option value="">-- انتخاب کلاس --</option>');
                                    $.each(data, function(id, name) {
                                          var selected = (id == selectedClassId) ? 'selected' : '';
                                          $('#classe_id').append('<option value="' + id + '" ' + selected + '>' + name + '</option>');
                                    });
                              },
                              error: function() {
                                    alert('خطا در دریافت کلاس‌ها');
                              }
                        });
                  } else {
                        $('#classe_id').empty();
                        $('#classe_id').prop('disabled', true);
                        $('#classe_id').append('<option value="">-- ابتدا برند را انتخاب کنید --</option>');
                  }
            }

            // وقتی برند انتخاب می‌شود، کلاس‌ها را لود می‌کنیم
            $('#brand_id').on('change', function() {
                  var brandId = $(this).val();
                  loadClasses(brandId);
            });

            // وقتی صفحه لود می‌شود، مقادیر قبلی را که کاربر انتخاب کرده است لود می‌کنیم
            var oldBrandId = $('#old_brand_id').val();
            var oldClassId = $('#old_classe_id').val();

            if (oldBrandId) {
                  loadClasses(oldBrandId, oldClassId);
            }
      });
</script>
@endsection