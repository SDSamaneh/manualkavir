<section class="py-4">
      <div class="container">
            <div class="row pb-4">
                  <div class="col-12">
                        <!-- Title -->
                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                              <h1 class="mb-2 mb-sm-0 h3">لیست راهنماها <span class="badge bg-primary bg-opacity-10 text-primary">{{$manualaccount}}</span></h1>
                              @if($role === 'author'|| $role==='admin')
                              <a href="{{route('manuals.create')}}" class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>ثبت راهنما جدید</a>
                              @endif
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-md-12 border rounded">
                        <!-- Post list table START -->
                        <div class="table-responsive p-3">
                              <!-- Tabs for Brands -->
                              <ul class="nav nav-tabs" id="brandTabs" role="tablist">
                                    @foreach($brands as $brand)
                                    <li class="nav-item" role="presentation">
                                          <button class="nav-link @if($loop->first) active @endif" id="brand-{{ $brand->id }}-tab" data-bs-toggle="tab" data-bs-target="#brand-{{ $brand->id }}" type="button" role="tab">
                                                {{ $brand->name }}
                                          </button>
                                    </li>
                                    @endforeach
                              </ul>
                              <div class="tab-content" id="brandTabsContent">
                                    @foreach($brands as $brand)
                                    <div class="tab-pane fade @if($loop->first) show active @endif" id="brand-{{ $brand->id }}" role="tabpanel">
                                          <!-- Tabs for Classes inside each Brand -->
                                          <ul class="nav nav-tabs my-3" id="classTabs-{{ $brand->id }}" role="tablist">
                                                @foreach($brand->classes as $class)
                                                <li class="nav-item" role="presentation">
                                                      <button class="nav-link @if($loop->first) active @endif" id="class-{{ $class->id }}-tab" data-bs-toggle="tab" data-bs-target="#class-{{ $class->id }}" type="button" role="tab">
                                                            {{ $class->name }}
                                                      </button>
                                                </li>
                                                @endforeach
                                          </ul>
                                          <div class="tab-content" id="classTabsContent-{{ $brand->id }}">
                                                @foreach($brand->classes as $class)
                                                <div class="tab-pane fade @if($loop->first) show active @endif" id="class-{{ $class->id }}" role="tabpanel">
                                                      <!-- List manuals under this class -->
                                                      <table class="table table-striped">
                                                            <thead>
                                                                  <tr>
                                                                        <th>مدل</th>
                                                                        <th>سال</th>
                                                                        <th>سایت کویر</th>
                                                                        <th>سایت خارجی</th>
                                                                        <th>COC</th>
                                                                        <th>جزئیات</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                  @foreach($class->motormodels as $model) <!-- توجه: تغییر مدل از "models" به "motormodels" -->
                                                                  @foreach($model->manuals as $manual)
                                                                  <tr>
                                                                        <td>{{ $model->name }}</td>
                                                                        <td>{{ $manual->year }}</td>
                                                                        <td>
                                                                              <a href="{{ $model->urlkavir}}" target="_blank"><img src="{{asset('storage/images/icon/kavir.png')}}" alt="kavirurl" class="w-30" /></a>

                                                                        </td>
                                                                        <td>
                                                                              <a href="{{ $model->urlother}}" target="_blank"><img src="{{asset('storage/images/icon/web.png')}}" alt="urlother" class="w-30" /></a>
                                                                        </td>
                                                                        <td>
                                                                              @if($manual->fileCoc)
                                                                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'fileCoc']) }}">
                                                                                    <img src="{{asset('storage/images/icon/pdf.png')}}" class="w-30" />
                                                                              </a>
                                                                              @endif
                                                                        </td>
                                                                        <td>
                                                                              <a href="{{ route('manuals.show', $manual->id) }}">
                                                                                    <img src="{{asset('storage/images/icon/view.png')}}" class="w-30" />

                                                                              </a>
                                                                        </td>
                                                                  </tr>
                                                                  @endforeach
                                                                  @endforeach
                                                            </tbody>
                                                      </table>
                                                </div>
                                                @endforeach
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                  </div>
            </div>

      </div>

</section>