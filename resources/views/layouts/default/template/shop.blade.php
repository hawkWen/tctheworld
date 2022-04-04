
        <div class="section tab-content mt-2 mb-2">

            <div class="row">
                 @foreach($shop as $key => $value)
                <div class="col-6 mb-2">
                        <div class="blog-card">
                            <img src="/uploads/images/products/{{ $value->image }}" alt="image" class="imaged w-100">
                          <div class="text">
                            <button type="button" class="btn btn-primary btn-block" onclick="buyproduct({{ $value->id }})">แลกเครดิต</button>
                            </div>
                        </div>
                </div>
                @endforeach
         
            </div>

           
        </div>