<div class="col-md-12 row mt-2">
  <div class="col-md-6">

    <div id="schedule-body">
      <form method="post" action="{{route('period-rules.store')}}">
        @csrf
        <input type="hidden" name="type" value="pakan">
        <input type="hidden" name="period_id" class="form-control period_id">
        @error('rule')
        <span class="bg-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
          <label for="Product">Age</label>
          <div class="row">
            <div class="col-md-6">
              <span>From<span>
                  <select name="age_start" class="form-control">
                    @for ($i = 1; $i <= 36; $i++) <option value="{{$i}}">{{$i}}</option>
                      @endfor
                  </select>
            </div>
            <div class="col-md-6">
              <span>End<span>
                  <select name="age_end" class="form-control">
                    @for ($i = 2; $i <= 36; $i++) <option value="{{$i}}">{{$i}}</option>
                      @endfor
                  </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Product">Name Pakan</label>
          <select name="product_id" class="form-control">
            @php $pakan = $products->where('category_id',2);
            if($pakan->count() ===0)
            $pakan = []
            @endphp
            @foreach (\App\Category::where('name','Pakan')->first()->products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mt-2">
          <label for="Product">Quantity</label>
          <input type="text" name="qty" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
            placeholder="Qty">
        </div>
        <div class="form-group mt-2">
          <button type="submit" class="btn btn-primary" id="transaction-submit">Add</button>
        </div>
      </form>
      <table id="example3" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Age</th>
            <th>Pakan</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $i=0;
          @endphp
          @foreach ($rules->where('type','pakan') as $index => $rule)
          <tr>

            <td>{{$i+1}}</td>
            <td>{{$rule->age_start}} - {{$rule->age_end}}</td>
            <td>{{$rule->product->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-6">

    <div id="schedule-body">
      <form method="post" action="{{route('period-rules.store')}}">
        @csrf
        <input type="hidden" name="type" value="obat">
        <input type="hidden" name="period_id" class="form-control period_id">
        @error('rule')
        <span class="bg-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
          <label for="Product">Age</label>
          <div class="row">
            <div class="col-md-6">
              <span>From<span>
                  <select name="age_start" class="form-control">
                    @for ($i = 1; $i <= 36; $i++) <option value="{{$i}}">{{$i}}</option>
                      @endfor
                  </select>
            </div>
            <div class="col-md-6">
              <span>End<span>
                  <select name="age_end" class="form-control">
                    @for ($i = 2; $i <= 36; $i++) <option value="{{$i}}">{{$i}}</option>
                      @endfor
                  </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Product">Name Obat</label>
          <select name="product_id" class="form-control">
            @php $pakan = $products->where('category_id',3);
            if($pakan->count() ===0)
            $pakan = []
            @endphp
            @foreach (\App\Category::where('name','Obat')->first()->products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mt-2">
          <label for="Product">Quantity</label>
          <input type="text" name="qty" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
            placeholder="Qty">
        </div>
        <div class="form-group mt-2">
          <button type="submit" class="btn btn-primary" id="transaction-submit">Add</button>
        </div>
      </form>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 10%">No</th>
            <th>Age</th>
            <th>Pakan</th>
            <th>Qty</th>
            <th style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $i=0;
          @endphp
          @foreach ($rules->where('type','obat') as $index => $rule)
          <tr>
            <td>{{$i+1}}</td>
            <td>{{$rule->age_start}} - {{$rule->age_end}}</td>
            <td>{{$rule->product->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>