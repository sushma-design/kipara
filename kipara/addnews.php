<?php
$page = 'addnews';
include 'connection.php';
include 'header.php';
include 'sidebar.php';

?>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        .preview-images-zone {
            width: 100%;
            border: 1px solid #ddd;
            min-height: 90px;
            /* display: flex; */
            padding: 5px 5px 0px 5px;
            position: relative;
            overflow: auto;
        }

        .preview-images-zone>.preview-image:first-child {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
        }

        .preview-images-zone>.preview-image {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }

        .event-img-show {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }

        .preview-images-zone>.preview-image>.image-zone {
            width: 100%;
            height: 100%;
        }

        .preview-images-zone>.preview-image>.image-zone>img {
            width: 100%;
            height: 100%;
        }

        .preview-images-zone>.preview-image>.tools-edit-image {
            position: absolute;
            z-index: 100;
            color: #fff;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            display: none;
        }

        .preview-images-zone>.preview-image>.image-cancel {
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: bold;
            margin-right: 10px;
            cursor: pointer;
            display: none;
            z-index: 100;
        }

        .preview-image:hover>.image-zone {
            cursor: move;
            opacity: .5;
        }

        .preview-image:hover>.tools-edit-image,
        .preview-image:hover>.image-cancel {
            display: block;
        }

        .ui-sortable-helper {
            width: 90px !important;
            height: 90px !important;
        }

        .container {
            padding-top: 50px;
        }
</style>
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add News<small>Admin</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li class="active"> Add News</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="alert alert-info alert-dismissible" id="message" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$('#message').hide()">&times;</button>
            <h4 id="message1"></h4>
        </div>
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Add News</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="event_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">Sr. No</th>
                            <th width="10%">Date</th>
                            <th width="25%">Title</th>
                            <th width="35%">Content</th>
                            <th width="10%">Photos</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result1 = "SELECT * FROM news ";
                        $result = mysql_query($result1);
                        $count =0;

                        while($row=mysql_fetch_array($result))
                        {
                            $count = $count + 1;
                            $date = $row['date'];
                            $title = $row['title'];
                            $content = $row['content'];
                            $var1 = $row ['img1'];
                            //echo $var1;
                        ?>
                        <tr>
                            <td>
                                <?php echo $count;?>
                            </td>
                            <td>
                                <?php echo $date;?>
                            </td>
                            <td>
                                <?php echo $title;?>
                            </td>
                            <td>
                                <?php echo $content;?>
                            </td>
                            <td>
                                <img src="<?php echo $row['img1'];?>" width="60px;" alt="image.jpg">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" style="" data-toggle="modal" data-target="#edit_news_modal" onclick="updatenews(<?php echo $row['id'];?>)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger" style="" onclick="deletenews(<?php echo $row['id'];?>)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Photos</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Insert Employee Model-->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Add News</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form role="form" name="add_event_form" id="add_event_form">
                                    <div class="box-body">
                                            <div class="alert alert-danger alert-dismissible" id="alert1" style="display: none">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <i class="icon fa fa-warning"></i>
                                                <span id="alertmsg"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Date</label>
                                                        <input type="date" class="form-control datepicker" id="date" name="date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <textarea class="form-control" id="content" name="content" placeholder="Enter Content"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <!--<input type="file" id="pro-image" name="file"  class="form-control" multiple accept="image/*">-->
                                                            <input type="file" class="form-control" id="pro-image" accept="image/*" name="file" onchange="preview_image(event)" multiple
                                                                data-show-upload="false" data-show-caption="true" placeholder="Attach Signature">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="button" class="btn btn-danger" onclick="remove_all_images();" value="Clear Images">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Image Preview</label>
                                                        <div class="" id="img1">
                                                            <img id="output_image" style="padding: 5px;" />
                                                            <span class="close" style="display: none;" onclick="document.getElementById('img1').style.display='none';">&times;</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="insertnews()">Submit</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.Insert Employee Model-->

                <!-- Update Employee Model-->
                <div class="modal fade" id="edit_news_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Edit News</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form role="form" name="edit_news_form" id="edit_news_form" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <div class="alert alert-danger alert-dismissible" id="alert2" style="display: none">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <i class="icon fa fa-warning"></i>
                                                <span id="alertmsg1"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="date">Date</label>
                                                        <input type="date" class="form-control datepicker" id="date1" name="date1" placeholder="Select Date">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" id="title1" name="title1" placeholder="Enter Title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <textarea class="form-control" id="content1" name="content1" placeholder="Enter Content"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="content">Image</label>
                                                        <img id="img11" name="img11" width="120px" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="file">Upload Image</label>
                                                        <input type="file" class="form-control" id="file" accept="/newsphotos/*" name="file" onchange="preview_image1(event)" multiple
                                                            data-show-upload="false" data-show-caption="true" placeholder="Attach Signature">
                                                        <img id="output_image" src="<?php echo $imagepath; ?>" style="padding: 5px;" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Image Preview</label>
                                                        <div class="" id="img2">
                                                            <img id="output_image2" />
                                                            <span class="close" style="display: none;" onclick="document.getElementById('img2').style.display='none';">&times;</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <input type="hidden" name="id" id="id" value="">
                                <!-- /.box-body -->
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updatenews1()">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.Update Employee Model-->
        <!-- /.box-body -->
</section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
<?php 
    include "footer.php";
?>
<script>
    $(function () 
    {
        $('#example1').DataTable();
        $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
        })
    }
    )


    $(document).ready(function () {
        $(".datepicker").datepicker({
            autoclose: "true",
            format: "dd-mm-yyyy"
            });
            document.getElementById('pro-image').addEventListener('change', readImage, false);
            set_event_table_data();
        });

    function insertnews() 
    {
       
        
            var $file_data = $('#pro-image').prop('files')[0];
            var  $form_data = new FormData();
            // $form_data.append('file', $file_data);

            // var file_data1 = $('#file').prop('files')[0];
            // var form_data1 = new FormData();
            // form_data1.append('file', file_data1);

            $form_data.append('file', $file_data);
            var date = $("#date").val();
            var title = $("#title").val();
            var content = $("#content").val();
            var file = $("#file").val();
            $form_data.append('date', date);
            $form_data.append('title', title);
            $form_data.append('content', content);

            if (date === '') {
                document.getElementById("alert1").style.display = 'block';
                document.getElementById("alertmsg").innerText = 'Please Select Date';
                return false;
            }
            if (title === '') {
                document.getElementById("alert1").style.display = 'block';
                document.getElementById("alertmsg").innerText = 'Please Enter Title';
                return false;
            }

            if (content === '') {
                document.getElementById("alert1").style.display = 'block';
                document.getElementById("alertmsg").innerText = 'Please Enter Content';
                return false;
            }
            if (file === '') {
                document.getElementById("alert1").style.display = 'block';
                document.getElementById("alertmsg").innerText = 'Please Upload Image';
                return false;
            }
            $.ajax({
                url: 'savenews.php',
                //            dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: $form_data,
                type: 'post',
                success: function (data) {
                    console.log(data);
                    var status = data.status;
                    var message = data.message;
                    if (status === 'success') {
                        document.getElementById("add_event_form").reset();
                        remove_all_images();
                        $("#event_table").DataTable().ajax.reload(null, false);
                        $('#modal-default').modal('hide');
                        document.getElementById("message").style.display = 'block';
                        document.getElementById("message1").innerHTML = message;

                    } else {

                        $('#modal-default').modal('hide');
                        //                window.location.reload();
                        document.getElementById("message").style.display = 'block';
                        document.getElementById("message1").innerHTML = message;
                    }
                }

            });

        }

        function updatenews(id) {
            //alert(id);
            $.ajax({
                type: "POST",
                url: "getnews.php",
                dataType: "json",
                data: {
                    id: id

                },
                success: function (data) {
                    //alert(date);
                    var date = data.date;
                    var title = data.title;
                    var content = data.content;
                    var img1 = data.img1;
                            //    alert(img1);
                    var id = data.id;

                    $("#date1").val(date);
                    $("#title1").val(title);
                    $("#content1").val(content);
                    $("#img11").val(img1);
                    $("#id").val(id);
                    document.getElementById("img11").src = img1;

                }
            });
        }

        function updatenews1() {

            var file_data1 = $('#file').prop('files')[0];
            var form_data1 = new FormData();
            form_data1.append('file', file_data1);

            var date = $("#date1").val();
            var title = $("#title1").val();
            var content = $("#content1").val();
            var id = $("#id").val();

            form_data1.append('date', date);
            form_data1.append('title', title);
            form_data1.append('content', content);
            form_data1.append('id', id);
            // alert(id);


            if (date === '') {
                document.getElementById("alert2").style.display = 'block';
                document.getElementById("alertmsg1").innerText = 'Please Select Date';
                return false;
            }
            if (title === '') {
                document.getElementById("alert2").style.display = 'block';
                document.getElementById("alertmsg1").innerText = 'Please Enter Title';
                return false;
            }

            if (content === '') {
                document.getElementById("alert2").style.display = 'block';
                document.getElementById("alertmsg1").innerText = 'Please Enter Content';
                return false;
            }
          
            $.ajax({
                url: 'updatenews.php',
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data1,
                type: 'post',
                success: function (data) {
                    var status = data.status;
                    var message = data.message;
                    if (status === 'success') {
                        document.getElementById("edit_news_form").reset();
                        $('#edit_news_modal').modal('hide');

                        document.getElementById("message").style.display = 'block';
                        document.getElementById("message1").innerHTML = message;
                    } else {
                        document.getElementById("edit_news_form").reset();
                        $('#edit_news_modal').modal('hide');

                        document.getElementById("message").style.display = 'block';
                        document.getElementById("message1").innerHTML = message;
                    }
                }
            });
            $("#event_table").DataTable().ajax.reload(null, false);
        }

        function deletenews(id) {

            var msg = confirm("Are you sure want to delete");
            if (msg === true) {
                $.ajax({
                    type: "POST",
                    url: "news_delete.php",
                    dataType: "json",
                    data: {
                        id: id

                    },
                    success: function (data) {
                        var status = data.status;
                        var message = data.message;
                        if (status === 'success') {
                            $("#event_table").DataTable().ajax.reload(null, false);
                            document.getElementById("message").style.display = 'block';
                            document.getElementById("message1").innerHTML = message;
                        } else {
                            document.getElementById("message").style.display = 'block';
                            document.getElementById("message1").innerHTML = message;
                        }
                    }
                });
            } else {
                return false;
            }


        }




        var num = 0;

        function remove_all_images() {
            $("#pro-image").val('');
            $("#img1").empty();
            num = 0;
        }

        function readImage() {
            $(".preview-images-zone").empty();
            num = 0;
            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image'))
                        continue;

                    var picReader = new FileReader();

                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html = '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result +
                            '"></div>' +
                            '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                }
                //            $("#pro-image").val('');
            } else {
                console.log('Browser not support');
            }
        }




        function set_event_table_data() {
            var event_table = $("#event_table").DataTable({
                "ajax": "get_all_event_data.php",
                "columns": [{
                        "data": null,
                        width: "5%"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "place"
                    },
                    {
                        "data": "content",
                        width: "20%"
                    },
                    {
                        "data": null,
                        "render": function (data, type, row, meta) {
                            return '<button id="show_event_photos_btn" onclick="show_images(' + data[
                                'id'] + ')" class="btn btn-success">view images</button> ';
                        }
                    },
                    {
                        width: "10%",
                        data: null,
                        "render": function (data, type, row, meta) {
                            return '<button class="btn btn-primary" id="edit_event"><i class="fa fa-edit"></i></button>\n\
                                                <button id="delete_event" onclick="deleteevent(' +
                                data['id'] +
                                ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
                        }

                    }

                ],
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }]
            });
            event_table.on('order.dt search.dt', function () {
                event_table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();


        }

        $('#event_table tbody').on('click', '#edit_event', function () {
            var data = $("#event_table").DataTable().row($(this).parents('tr')).data();

            console.log(data);
            $("#edit_event_modal").modal("show");
            $("#date1").datepicker('update', data['date']);
            $("#title1").val(data['title']);
            $("#id").val(data['id']);
            $("#place1").val(data['place']);
            $("#content1").val(data['content']);

        });
        $('#journal_table tbody').on('click', '#delete_journal', function () {
            var data = $("#journal_table").DataTable().row($(this).parents('tr')).data();
            deletejournal(data['id']);
        });

        function show_images($event_id) {
            $("#event_photo_modal").modal("show");
            $.ajax({
                url: "get_event_photos.php",
                type: 'POST',
                data: {
                    "event_id": $event_id
                },
                dataType: 'json',
                success: function ($data, textStatus, jqXHR) {

                    $("#event_photos_show").empty();
                    $.each($data, function ($k, $v) {
                        $img_show =
                            " <div class='preview-image preview-show-0'> \n\
            <div class='image-zone'>\n\
            <img src='" +
                            $v['img_path'] +
                            "'>\n\
                                </div>\n\
                                    </div>";
                        $("#event_photos_show").append($img_show);
                    });

                }
            });
        }


        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                document.getElementById('img1').style.display = 'block';
                var output = document.getElementById('output_image');
                document.getElementById('output_image').style.height = '110px';
                document.getElementById('output_image').style.width = '110px';

                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_image1(event) {
            var reader = new FileReader();
            reader.onload = function () {
                document.getElementById('img2').style.display = 'block';
                var output = document.getElementById('output_image2');
                document.getElementById('output_image2').style.height = '110px';
                document.getElementById('output_image2').style.width = '110px';

                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    </body>

    </html>