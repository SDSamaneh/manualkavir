<section class="py-4">
      <div class="container">
            <div class="row pb-4">
                  <div class="col-12">

                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                              <h1 class="mb-2 mb-sm-0 h3">Models<span class="badge bg-primary bg-opacity-10 text-primary">{{$modelsCount}}</span></h1>
                              <a href="{{route('motormodel.create')}}" class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>افزودن مدل</a>
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-md-6 col-xl-12">
                        <div class="card border bg-transparent rounded-3">
                              <!-- Card body START -->
                              <div class="card-body p-3">
                                    <!-- Post list table START -->
                                    <div class="table-responsive border-0">
                                          <table class="table align-middle p-1 mb-0 table-hover table-shrink">
                                                <!-- Table head -->
                                                <thead class="table-dark">
                                                      <tr>
                                                            <th scope="col" class="border-0 rounded-start">brand</th>
                                                            <th scope="col" class="border-0">classe</th>
                                                            <th scope="col" class="border-0">name</th>
                                                            <th scope="col" class="border-0">details</th>
                                                      </tr>
                                                </thead>
                                                <tbody class="border-top-0">
                                                      @if($motormodels)
                                                      @foreach($motormodels as $motormodel)
                                                      <tr>
                                                            <td>

                                                                  <img class="w-50" src="{{ asset('storage/' . $motormodel->brand->thumbnail) }}" />
                                                            </td>
                                                            <td>
                                                                  <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{$motormodel->classe->name}}</a></h6>
                                                            </td>
                                                            <td>
                                                                  <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{$motormodel->name}}</a></h6>
                                                            </td>
                                                            <td>
                                                                  <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#"><i class="fas fa-edit"></i></a></h6>
                                                            </td>
                                                      </tr>
                                                      @endforeach
                                                      @endif
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>