vishnu

<form id="upload_form" enctype="multipart/form-data">      
            <div class="row">
                        <!-- <div class="col-sm-4 mb-3">
                          <div class="mb-3">
                            <label>Request Title</label>
                            <input class="form-control" type="text" id="request_title" name="request_title" value=""> 
                            <input type="hidden" id="task_id_hidden" name="task_id_hidden" value="<?=$details[0]['id'];?>">
                          </div>
                        </div> -->
                        <div class="col-sm-4 ">
                          <div class="mb-3">
                            <label>Upload Requestsss</label>
                            <input class="form-control" type="file" id="request_file" name="request_file[]" multiple> 
                            <div id="file-inputs"></div>
                          </div>
                        </div>
                        <div class="col-sm-2 mt-2">
                          <div class="mb-3">
                          <!-- <button id="add-more" class="btn btn-primary mt-4">Add More</button> -->
                        </div>
              </div>
              <div class="row">
              <button id="add_request" class="btn btn-primary mt-4 pull-right">Upload</button>
              </div>
                        </div>
                          </div>
                      </div>
                    </form>
                    <button id="add-more" class="btn btn-primary mt-4">Add More</button>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                   <script>
          $(document).ready(function(){
alert('here');
            $("#add-more").click(function () {
                  if($('#request_file').val() == ''){
                    alert('Please select file to upload');
                    return false;
                  }else{
                    $("#file-inputs").append('<input class="form-control" type="file" name="request_file[]" multiple>');
                  }
            });

            $("#upload_form").submit(function(e) {
              var taskid=$('#task_id_hidden').val();
              var item = 'request';
              e.preventDefault();
                  // if($('#request_title').val() == ''){
                  //   alert('Please enter request title');
                  //   return false;
                  // }
                  if($('#request_file').val() == ''){
                    alert('Please select file to upload');
                    return false;
                  }else{
                    $.ajax({
                    type: "POST",
                    url: base_url + 'cordinator/upload_request',
                        data: new FormData(this),
                        contentType:false,
                        cache:false,
                        processData:false,
                        success: function(data){
                          alert(data);
                          alert("Request inserted successfully");
                          window.location.href = base_url+'cordinator/task_details/'+taskid+'/'+item;
                        }
                });
                  }
            });
        });
            </script>