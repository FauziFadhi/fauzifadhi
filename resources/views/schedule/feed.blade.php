<table id="example1" class="table table-bordered table-striped">
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
    @php $i=0; $alpha = range('A', 'Z');
    @endphp
    @foreach ($feeds as $feed)

    <tr>
      <td class="py-1">{{ $i+1 }}</td>
      <td class="py-1">{{ $feed->schedule->action_date }}</td>
      <td class="py-1">{{ $alpha[$feed->schedule->cage_no-1] }}</td>
      <td class="py-1">{{ $feed->schedule->chicken_qty }}</td>
      <td class="py-1">{{ $feed->schedule->age }}</td>
      <td class="py-1">{{ $feed->rule->product->name }}</td>
      <td class="py-1">{{ $feed->rule->qty }}</td>
      <td class="py-1">
        <input type="checkbox" class="schedule-checked flat-red" {{($feed->status===1)?'checked':''}}
          value="{{$feed->id}}">
        </label>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>