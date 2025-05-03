<section class="py-4">
      <div class="container">
            <div class="row pb-4">
                  <div class="col-12">

                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                              <h1 class="mb-2 mb-sm-0 h3">Brands</h1>
                              <a href="{{route('brand.create')}}" class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>افزودن برند</a>
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
                                                            <th scope="col" class="border-0">name</th>
                                                            <th scope="col" class="border-0">details</th>
                                                      </tr>
                                                </thead>
                                                <tbody class="border-top-0">
                                                      @if($brands)
                                                      @foreach($brands as $brand)
                                                      <tr>
                                                            <td>
                                                                  <div class="icon-lg">
                                                                        <img src="{{ asset('storage/' . $brand->thumbnail) }}" />
                                                                  </div>
                                                            </td>
                                                            <td>
                                                                  <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{$brand->name}}</a></h6>
                                                            </td>

                                                            <td>
                                                                  <div class="d-flex justify-align-content-between align-items-center gap-3">
                                                                        <h6 class="course-title mt-2 mt-md-0 mb-0">
                                                                              <a href="{{route('brand.edit',$brand->id)}}"><i class="fas fa-edit"></i></a>
                                                                        </h6>

                                                                        <form action="{{ route('brand.destroy', $brand->id) }}" method="post">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <button type="submit" class="border-0 bg-transparent">
                                                                                    <i class="fas fa-trash text-danger"></i>
                                                                              </button>
                                                                        </form>
                                                                  </div>
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