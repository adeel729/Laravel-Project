        @foreach($creditquery as $row)
    <tr>
        <td>{{$row->itemname}}</td>
        <td>{{$row->actiondate}}</td>
        <td>{{$row->debit}}</td>
        <td>{{$row->credit}}</td>
        <td>{{$row->balance}}</td>
    </tr>
    @endforeach
