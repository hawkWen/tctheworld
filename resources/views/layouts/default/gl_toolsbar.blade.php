<div class="toolbar" id="kt_toolbar" style="overflow-y: scroll;">
                            <!--begin::Container-->
                            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center flex-shrink-0 me-5 py-3">
                                   
                                    <!-- <a href="/games"><span class="fs-7 fw-bolder text-gray-700 pe-4">หน้าหลัก</span></a>begin::Label-->
                                    @if(!empty($partners_data->name))
                                    <span class="fs-7 fw-bolder text-gray-700 pe-4">> {{ $partners_data->name }}</span>
                                    @endif
                                    <!--end::Label-->
                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover flex-shrink-0 me-2"><!--begin::User-->
                                         @foreach($game_type as $key => $value) 
                                        <span class="fs-8 rounded bg-light px-3 py-2 me-3 filter-btn" data-filter="gametype{{ $value->id }}">
                                          <img class="icongame w-30px h-30px rounded-1 ms-2 me-1" src="/uploads/images/gametype/image_icon/{{ $value->image_icon }}" alt="metronic"><br><div class="gamename" align="center"> {{ $value->name }}</div>
                                        </span>
                                        @endforeach
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                    
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center ">
                                    
                                    <!--begin::Separartor-->
                                    <div class="bullet bg-secondary h-35px w-1px mx-6"></div>
                                    <!--end::Separartor-->
                                    <!--begin::Label-->
                                    <span class="fs-7 fw-bolder text-gray-700 flex-shrink-0 pe-4">เรียงตาม:</span>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select class="form-select form-select-sm w-125px form-select-solid me-6 select-filter">
                                         
                                        <option value="0" selected="selected">หมวดหมู่เกมส์</option>
                                        @foreach($game_category as $key => $value) 
                                        <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                               
                                    <!--end::Actions-->
                                <!--end::Wrapper-->
                                </div>
                            <!--end::Container-->
                            </div>
 </div>