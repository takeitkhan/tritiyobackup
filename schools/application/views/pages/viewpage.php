<?php
  $this->db->select('PageId, PageTitle, PageRoute, (SELECT PageTitle FROM webpages c WHERE c.PageId = webpages.ParentId LIMIT 0,1) AS ParentPageName, PublishDate, isActive');
  $this->db->from('webpages');
  $rows = $this->db->get();

  $rows = $rows->result_array();	 
?>
<div class="row mainbox">
    <table id="allpagesxxxx" class="display" cellspacing="0" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Page ID</th>
            <th>Page Title</th>
            <th>Page Route</th>
            <th>Parent Page</th>
            <th>Published Date</th>
            <th>Is Active</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
      	<?php foreach($rows as $row) { ?>
          <tr>
              <th><?php echo $row['PageId'] ?? NULL ?></th>
              <th><?php echo $row['PageTitle'] ?? NULL ?></th>
              <th><?php echo $row['PageRoute'] ?? NULL ?></th>
              <th><?php echo $row['ParentPageName'] ?? NULL ?></th>
              <th><?php echo $row['PublishedDate'] ?? NULL ?></th>
              <th><?php echo $row['isActive'] ?? NULL ?></th>
              <th>
                <a href="<?php echo base_url() . 'addnewpage/' . $row['PageId']; ?>" target="_blank">
                  <i class="fa fa-pencil fa-fw"></i>
                </a>
              </th>
              <th>
                <a onclick="ajaxRemoveFn($1,'deletepage/' .  $row['PageId'])" href="javascript:void(0)">
                  <i class="fa fa-trash-o fa-fw"></i>
                </a>
              </th>            
          </tr>
    	<?php } ?>

        <tfoot>
        <tr>
        	<th>Page ID</th>
            <th>Page Title</th>
            <th>Page Route</th>
            <th>Parent Page</th>
            <th>Published Date</th>
            <th>Is Active</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </tfoot>
    </table>
</div>