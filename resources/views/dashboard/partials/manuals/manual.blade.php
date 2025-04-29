<section class="py-4">
      <div class="container">
            <div class="row">
                  <div class="d-flex justify-content-start align-items-center gap-4 flex-wrap mb-4">
                        <h6 class="course-title text-primary">
                              برند: {{ $manual->motormodel->brand->name ?? '-' }}
                        </h6>
                        <h6 class="course-title text-success">
                              کلاس: {{ $manual->motormodel->classe->name ?? '-' }}
                        </h6>
                        <h6 class="course-title text-warning">
                              مدل: {{ $manual->motormodel->name ?? '-' }}
                        </h6>
                  </div>

                  <div class="col-md-12 border p-3">
                        <div class="d-flex justify-center items-center gap-4 flex-wrap">
                              <h6 class="course-title">عنوان : {{$manual->title}}</h6>

                              <h6 class="course-title">سال : {{$manual->year}}</h6>

                              <div>
                                    <a class="text-black" href="{{$manual->urlkavir}}" target="_blank"><img src="{{asset('storage/images/icon/kavir.png')}}" style="width:20px;" alt="" />لینک کویر موتور</a>
                              </div>
                              <div>
                                    <a class="text-black" href="{{$manual->urlother}}" target="_blank"><img src="{{asset('storage/images/icon/web.png')}}" style="width:20px;" alt="" />لینک خارجی</a>
                              </div>
                              <div>
                                    <a class="text-black" href="{{$manual->urlnetwork}}" target="_blank" class=" mb-2"><img src="{{asset('storage/images/icon/computer.png')}}" style="width:20px;" alt="urlnetwork" />لینک در شبکه</a>
                              </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mt-4">
                              <p class="fw-bold mb-3 fs-5 position-relative news-section-title text-danger">فایل ها<span class="fw-normal fs-6">
                                    </span>
                              </p>
                              <div class="border-bottom border-danger border-2 opacity-1" style="width: 80%;"></div>
                        </div>
                        <div class="col-md-12">

                              @if ($manual->fileCoc)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'fileCoc']) }}" class="btn btn-outline-danger">
                                    <img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" /> COC</a>
                              @endif
                              @if ($manual->userGuideFa)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'userGuideFa']) }}" class="btn btn-outline-danger"> <img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" /> راهنمای Fa</a>
                              @endif
                              @if ($manual->userGuideEn)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'userGuideEn']) }}" class="btn btn-outline-danger"> <img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" /> راهنمای En</a>
                              @endif

                              @if ($manual->repairGuideFa)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'repairGuideFa']) }}" class="btn btn-outline-danger"> <img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" /> راهنمای تعمیر Fa</a>
                              @endif

                              @if ($manual->repairGuideEn)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'repairGuideEn']) }}" class="btn btn-outline-danger"> <img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" /> راهنمای تعمیر En</a>
                              @endif


                              @if ($manual->partsGuide)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'partsGuide']) }}" class="btn btn-outline-danger"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" />راهنمای قطعات</a>
                              @endif
                        </div>


                        <div class="d-flex justify-content-between align-items-baseline mb-4 mt-4">
                              <p class="fw-bold mb-3 fs-5 position-relative news-section-title text-danger">جداول<span class="fw-normal fs-6">
                                    </span>
                              </p>
                              <div class="border-bottom border-danger border-2 opacity-1" style="width: 80%;"></div>
                        </div>
                        <div class="col-md-12">

                              @if ($manual->pdi)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'pdi']) }}" class="btn btn-outline-light"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" />pdi</a>
                              @endif
                              @if ($manual->periodicService)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'periodicService']) }}" class="btn btn-outline-light"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" /> سرویس دوره ای</a>
                              @endif


                        </div>
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mt-4">
                              <p class="fw-bold mb-3 fs-5 position-relative news-section-title text-danger">بولتن فنی<span class="fw-normal fs-6">
                                    </span>
                              </p>
                              <div class="border-bottom border-danger border-2 opacity-1" style="width: 80%;"></div>
                        </div>
                        <div class="col-md-12">

                              @if ($manual->Bulletin1)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'Bulletin1']) }}" class="btn btn-outline-secondary"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" />بولتن فنی 1</a>
                              @endif

                              @if ($manual->Bulletin2)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'Bulletin2']) }}" class="btn btn-outline-secondary"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" />بولتن فنی 2</a>
                              @endif

                              @if ($manual->Bulletin3)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'Bulletin3']) }}" class="btn btn-outline-secondary"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" />بولتن فنی 3</a>
                              @endif

                              @if ($manual->Bulletins)
                              <a href="{{ route('manuals.download', ['id' => $manual->id, 'field' => 'Bulletins']) }}" class="btn btn-outline-secondary"><img src="{{asset('storage/images/icon/download.png')}}" style="width:20px;" alt="" />فایل گزارش بولتن ها</a>
                              @endif
                        </div>
                        <div class="col-md-12 text-end">
                              <a href="{{route('manuals.index')}}" class="btn btn-sm btn-danger mb-0"><i class="fas fa-arrow-left"></i></i> بازگشت</a>
                        </div>
                  </div>
            </div>
      </div>
</section>