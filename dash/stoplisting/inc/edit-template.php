<?php
include('admin/classes/sql_queries.php');
include('admin/classes/db_queries.php');
$temp_id=0;
if(isset($_GET['temp_id'])){

	$temp_id=intval($_GET['temp_id']);
	
}
else{

	$url=SURL.'templates';
	echo "<script>window.location = '".$url."';</script> ";

}

if(isset($_POST['update_template'])){
	
	$user_id=$_SESSION['login_user_id'];
	$title=mysql_real_escape_string($_REQUEST["title"]);
	$detail=mysql_real_escape_string($_REQUEST["detail"]);
	$db_fun	=	new db_queries();
	$new_add=$db_fun->updateTemplate($title,$detail,$temp_id);
	if($new_add > 0){
		$url=SURL.'index.php?page=templates&msg=Update Template Successfully';
		echo "<script>window.location = '".$url."';</script> ";
	}
	
}
$sql="select * from templates where temp_id='".$temp_id."' and user_id='".$_SESSION['login_user_id']."'";
$query=mysql_query($sql);
$mfa=mysql_fetch_array($query);
?>
<!--<div class="updates small-12 columns"> <a href=""><span><em>20</em> Ready for Publishing</span></a> <a href=""><span><em>3</em> Need More Information</span></a> <a href=""><span><em>35</em> Added This Week</span></a> <a href=""><span><em>?</em> Get Support</span></a> </div>-->
<div class="small-12 columns">
  <h3>Update Template</h3>
  
    
    
    
    
    
    <form class="cmxform form-horizontal bucket-form" id="template" method="post" action="">
          <input type="hidden" name="update_template" />
   
          <div class="form-group">
            <label class="col-sm-3 control-label">Title</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="title" value="<?php echo stripslashes($mfa['temp_title'])?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Template</label>
            <div class="col-sm-6">
              <textarea id="editor1" name="detail" rows="10" cols="80"><?php echo stripslashes($mfa['temp_detail'])?></textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-6" style="text-align:center;">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
   
   </form>
    
    
 
</div>
<!--<div class="columns">
  <div id="form_end">
    <div class="small-5 small-5-offset columns selected_listings"> <a href="<?=SURL?>upload" class="button radius small"><i class="fi-upload"></i> Upload Photos</a> <a href="<?=SURL?>create" class="button radius small"><i class="fi-plus"></i> New Listing</a> </div>
    <div class="small-2 columns selected_listings"> <a href="<?=SURL?>manage" class="button radius small">View More</a> </div>
  </div>
</div>-->
<?php include("footer.php");?>


<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );

</script>

<script>
	$(document).ready(function() {
		$( ".listing_entry" ).clone().appendTo( "#listing_view" );
	});
</script>