

        @foreach($stockindata as $data)
        <tr>
            {{-- <td>{{$data->warehousename}}</td> --}}
            <td>{{$data->categoryname}}</td>
            <td>{{$data->itemname}}</td>
            <td>{{$data->batchnumber}}</td>
            <td>{{$data->billnumber}}</td>
            <td>{{$data->unitprice}}</td>
            <td>{{$data->stockinquantity}}</td>
            <td>{{$data->totalprice}}</td>
            <td>{{$data->saleprice}}</td>
            <td>{{$data->sotckindate}}</td>
        </tr>
        @endforeach
       