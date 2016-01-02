
<div class="img-list">
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>thumbs</th>
         <th>title</th>
         <th>description</th>
         <th>status</td>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
		<?php $index = 1; ?>
     @foreach ($images as $image)
         <tr>
            <td><?php echo $index ?></td>
            <td><img src="{{ url('uploads/images/small/'.$image->filename) }}" alt="{{ $image->filename }}" /></td>
            <td>{{ $image->title }}</td>
            <td>{{ $image->desc }}</td>
            <td>
              <?php if($image->img_status == 'display'): ?>
                <span class="label label-info">display</span>
              <?php else: ?>
                <a href="{{ url('image/set_display/'. $image->id) }}" class="">click for display</a>
              <?php endif; ?>
            </td>
            <td>
							<a href="{{ url('image/delete/'.$image->id) }}">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
            </td>
         </tr>
		<?php $index++;?>
     @endforeach

     </tbody>

 </table>
</div>
