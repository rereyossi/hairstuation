@extends('template_admin.main')
@section('content')
<a href="{{ url('product/create') }}" class="btn btn-primary">add new product</a>
<br><br>
<table id="table_management" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <th>no</th>
              <th>display</th>
              <th>product name</th>
              <th>description</th>
              <th>rating</th>
              <th>price</th>
              <th>category</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          <?php $index = 1; ?>
          @foreach ($products as $product)
            <tr>
                 <td>{{ $index }}</td>
                <td>
                  @foreach($product->image as $image)
                   <img src="{{ url('uploads/images/small/'.$image->filename) }}" alt="" />
                  @endforeach
                </td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->desc }}</td>
                <td>{{ $product->rating }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td>
                  <a href="{{ url('product/create/'.$product->id)  }}">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  </a>
                  <a href="{{ url('product/delete/'.$product->id)  }}" onclick="return confirm('Are you sure want to delete this item')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </a>
                </td>
            </tr>
             <?php $index++; ?>
          @endforeach

        </tbody>
    </table>
@stop
