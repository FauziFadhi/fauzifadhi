<table id="example2" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th style="width: 10%">No</th>
      <th>Date</th>
      <th>Cage</th>
      <th>Chicken Qty</th>
      <th>Age</th>
      <th>Feed Type</th>
      <th>Feed Qty</th>
      <th style="width: 7%">Done</th>
    </tr>
  </thead>
  <tbody>
    @php $i=0; $alpha = range('A', 'Z'); @endphp
    @foreach ($drugs as $drug)

    <tr>
      <td class="py-1">{{ $i+1 }}</td>
      <td class="py-1">{{ $drug->schedule->action_date }}</td>
      <td class="py-1">{{ $alpha[$drug->schedule->cage_no-1] }}</td>
      <td class="py-1">{{ $drug->schedule->chicken_qty }}</td>
      <td class="py-1">{{ $drug->schedule->age }}</td>
      <td class="py-1">{{ $drug->rule->product->name }}</td>
      <td class="py-1">{{ $drug->rule->qty }}</td>
      <td class="py-1">
        <label>
          <input type="checkbox" class="flat-red schedule-checked">
        </label>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>