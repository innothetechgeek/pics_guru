<ol class="breadcrumb">
  <li><a href="<?php echo base_url('admin'); ?>"><span class="fa fa-home"></span></a></li>
  <li><a href="<?php echo base_url('vehicles'); ?>">Vehicles</a></li>
  <li class="active">Images</li>
</ol>

<article>

    <?php if($this->session->flashdata('success')){?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php } ?>
    
    <?php if($this->session->flashdata('warning')){?>
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
    <?php } ?>
    
    <?php if($this->session->flashdata('error')){?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php } ?>
    

    <div class="btn-group">
        <a href="<?php echo base_url('vehicles/details/'.$vehicle->vehicleID); ?>" class="btn btn-primary"><span class="fa fa-chevron-left"></span>Back</a>
        <a href="#" data-toggle="modal" data-target="#uploadImg" class="btn btn-primary"><span class="fa fa-upload"></span>Upload File</a>
    </div>
    
    <div class="panel">
        <div class="panel-body">
        <?php 
            if($images){
                foreach($images as $image){
                    if($image->vehicleID == $vehicle->vehicleID){
        ?>
            <img class="img img-thumbnail" alt="<?php echo $image->image; ?>" src="<?php echo base_url('images/thumbs/'.$image->image); ?>">
        <?php }}}else{ echo 'No Images available for selected vehicle.'; } ?>
        </div>
    </div>

</article>

<!-- Modal -->
<div class="modal fade" id="uploadImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload File</h4>
            </div>
            <?php echo form_open_multipart('vehicles/upload/'.$vehicle->vehicleID); ?>
            <input type="hidden" name="vehicleID" value="<?php echo $vehicle->vehicleID; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Select File:</label>
                    <input type="file" name="userfile" size="20">
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Upload" class="btn btn-primary">
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
