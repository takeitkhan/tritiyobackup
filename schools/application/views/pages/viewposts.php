<?php 
$this->db->select('PostId, Title, PostRoute, (SELECT SettingsName FROM initial_settings_info WHERE SettingsId = Category) AS Category,  PostContent, MediaFileName, FROM_UNIXTIME(AddedDate, "%Y-%m-%d") AddedDate,, isActive');
$this->db->from('posts');
$results = $this->db->get();
$results = $results->result_array();	

?>


<div class="row mainbox">
    <table xid="allposts" class="display" cellspacing="0" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Post Route</th>
            <th>Category</th>
            <th>Content</th>
            <th>Media</th>
            <th>Published</th>
            <th>Active</th>
            <th width="10">Edit</th>
            <th width="10">Delete</th>
        </tr>
        </thead>
		<tbody>
          <?php foreach($results as $row) {?>
      		<tr>
              <td><?php echo $row['PostId']; ?></td>
              <td><?php echo $row['Title']; ?></td>
              <td><?php echo $row['PostRoute']; ?></td>
              <td><?php echo $row['Category']; ?></td>
              <td><?php echo $row['PostContent']; ?></td>
              <td><img width="60px" style="max-height: 60px;" src="<?php echo base_url();?>uploads/posts/<?php echo $row['MediaFileName']; ?>"></td>
              <td><?php echo $row['AddedDate']; ?></td>
              <td><?php echo $row['isActive']; ?></td>
              <td><a href="<?php echo base_url();?>editpost/<?php echo $row['PostId']; ?>" target="_blank"><i class="fa fa-pencil fa-fw"></i></a> </td>
              <td>
                <a onclick="ajaxRemoveFn(`<?php echo $row['PostId']; ?>`,`deletepost/<?php echo $row['PostId']; ?>`)" href="javascript:void(0)"><i class="fa fa-trash-o fa-fw"></i></a>
              </td>
         
          	</tr>
          <?php } ?>
      	</tbody>
        <tfoot>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Post Route</th>
            <th>Category</th>
            <th>Content</th>
            <th>Media</th>
            <th>Published</th>
            <th>Active</th>
            <th width="10">Edit</th>
            <th width="10">Delete</th>
        </tr>
        </tfoot>
    </table>
</div>
