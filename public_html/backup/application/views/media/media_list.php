<div class="x_panel">
    <div class="x_title">
        <div class="col-sm-9"><h3>All Media</h3></div>
        <div class="col-sm-3 pull-right"> <input type="text" placeholder="Search" class="form-control" id="media_search"></div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content" style="display: block;">
        <style type="text/css">
            .single-media,.upload-box{
                float:left;
                width:150px;
                height:150px;
                float:left;  
                box-sizing: border-box;
                padding:10px;
                border:1px solid rgba(1, 1, 1, 0.15);
                margin:5px;
                border-radius: 5px;
                position:relative;
            }
            .single-media img{
                height:115px;
                width:100%;
            }
            .single-media p{
                white-space: nowrap;
                overflow: hidden;
            }
            #_uploadmedia{
                height: 100%;
                width:100%;
                border:0px;
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
            }
            .upload-box{
                cursor: pointer;
                font-size: 100px;
                text-align: center;
                vertical-align: middle;
            }
        </style>


        <div class="media-list row">
            <div class="upload-box">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                <input type="file" name="_uploadmedia" id="_uploadmedia" class="_uploadmedia" />
            </div>
            <?php foreach ($medias as $media): ?>
                <div class="single-media" data-id="<?php echo $media->idno; ?>">
                    <img src="<?php echo base_url("{$media->upload_dir}/{$media->idno}.{$media->extension}"); ?>">
                    <p class="text-center"><?php echo $media->file_name; ?></p>
                </div> 
            <?php endforeach; ?>  
        </div>

          <div class="row">
            <div class="text-center">
                <button id="load-more-media" class="btn btn-default" data-loaded="<?= count($medias) ?>">Load more</button>
            </div>
        </div>

        <style type="text/css">
            #signle_media_modal .modal-body img{
                max-width:100%;                
            }

            #signle_media_modal .modal-body img{
                max-width:100%;                
            }
            #signle_media_modal .media-properties{
                margin-top:10px;
                margin-bottom:10px;
            }
        </style>


        <!-- Modal -->
        <div id="signle_media_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Single media -  <span class='media-name'></span></h4>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="media-url" src="">
                            </div>
                            <div class="col-sm-6">

                                <div class="media-properties">
                                    <b>Media Id</b>
                                    <input class="form-control media-id" type="text" value="" readonly="readonly">
                                </div>
                                <div class="media-properties">
                                    <b>Media Url</b>
                                    <input class="form-control media-url" type="text" value="" readonly="readonly">
                                </div>

                                <div class="media-properties">
                                    <b>Media name</b>
                                    <input class="form-control media-name" type="text" value="" readonly="readonly">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                       <!--  <button type="button" class="btn btn-danger" id="deletemedia"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> -->
                        <button type="button" class="btn btn-danger deletebutton"  data-mediaid="d" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>

                    </div>
                </div>

            </div>
        </div>





    </div>
</div>