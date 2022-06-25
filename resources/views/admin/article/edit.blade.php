<x-master-layouts>
    @include('sweetalert::alert')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Edit Article</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div>{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <div class="media">
                                        <div class="avatar mr-75">
                                            <img src="{{ asset('assets') }}/images/portrait/small/avatar-s-9.jpg" width="38" height="38" alt="Avatar" />
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-25">{{ auth()->user()->name }}</h6>
                                            <p class="card-text">{{ \Carbon\Carbon::now()->format('D, d M Y') }}</p>
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <form action="{{ route('articles.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" onInput="edValueKeyPress()" value="{{ $data->title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="fp-date-time">Date & Time</label>
                                                    <input type="text" name="date" id="fp-date-time" class="form-control flatpickr-date-time" value="{{ $data->updated_at }}" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Slug</label>
                                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $data->slug }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label for="blog-edit-category">Category</label>
                                                <select class="select2 form-control" name="category">
                                                    @if ($currentCategory != null)
                                                        <option value="{{ $currentCategory->id }}">{{ strtoupper($currentCategory->name) }}</option>
                                                    @endif
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ strtoupper($category->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="blog-edit-title">Post Type</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="type" value="0" class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="customRadio1">Standard</label>
                                                    </div>
                                                    <div class="custom-control custom-control-warning custom-radio">
                                                        <input type="radio" id="customRadio2" name="type" value="1" class="custom-control-input" />
                                                        <label class="custom-control-label" for="customRadio2">Headline</label>
                                                    </div>
                                                    <div class="custom-control custom-control-success custom-radio">
                                                        <input type="radio" id="customRadio3" name="type" value="2" class="custom-control-input" />
                                                        <label class="custom-control-label" for="customRadio3">Latest Slider</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="blog-edit-title">Content</label>
                                                <textarea name="content" class="ckeditor" id="" cols="30" rows="10">{!! $data->content !!}</textarea>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status</label>
                                                    <select class="form-control" id="blog-edit-status" name="status">
                                                        <option value="1">Published</option>
                                                        <option value="2">Pending</option>
                                                        <option value="3">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Tags</label>
                                                    <input type="text" name="tags" id="tags" class="form-control" value="{{ $data->tags }}" placeholder="news, top, viral">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">Image</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        @if ($data->image != null)
                                                            <img src="{{ asset(config('app.POST_MID')) }}/{{ $data->image }}" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                                        @else
                                                            <img src="{{ asset('assets') }}/images/slider/03.jpg" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                                        @endif
                                                        <div class="media-body">
                                                            @if (isset($data->image))
                                                                <p class="my-50">
                                                                    <a href="javascript:void(0);" id="blog-image-text">{{ $data->image ? config('app.POST_MID').'/'.$data->image : 'C:\fakepath\banner.jpg'}}</a>
                                                                </p>
                                                            @endif
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    {{-- <div class="custom-file">
                                                                        <input type="file" name="image" class="custom-file-input" id="pic-form" accept="image/*" />
                                                                        <label class="custom-file-label" for="blogCustomFile">Choose file</label>
                                                                    </div> --}}
                                                                    <input class="w-50" type="file" id="pic-form" name="image" enctype="multipart/form-data">
                                                                    <input type="hidden" name="16_9_width" id="16_9_width"/>
                                                                    <input type="hidden" name="16_9_height" id="16_9_height"/>
                                                                    <input type="hidden" name="16_9_x" id="16_9_x"/>
                                                                    <input type="hidden" name="16_9_y" id="16_9_y"/>

                                                                    <input type="hidden" name="4_3_width" id="4_3_width"/>
                                                                    <input type="hidden" name="4_3_height" id="4_3_height"/>
                                                                    <input type="hidden" name="4_3_x" id="4_3_x"/>
                                                                    <input type="hidden" name="4_3_y" id="4_3_y"/>

                                                                    <input type="hidden" name="1_1_width" id="1_1_width"/>
                                                                    <input type="hidden" name="1_1_height" id="1_1_height"/>
                                                                    <input type="hidden" name="1_1_x" id="1_1_x"/>
                                                                    <input type="hidden" name="1_1_y" id="1_1_y"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 mb-2">
                                            </div> --}}
                                            <div class="col-12 mt-5 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                                <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Photo</h5>
                    <button type="button" class="close" id="closeAtas" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="overflow: hidden;">
                        <div class="col-md-4" style="width:25%;">
                            <div class="nav nav-tabs" style="display: inline;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a id="16-9-tab" data-toggle="pill" href="#v-16-9" role="tab" aria-controls="v-16-9" aria-selected="true" style="padding:0px;color:#3a3a3a;">
                                    <button class="btn btn-primary btn-block">16:9</button>
                                    <div id="preview-16-9" class="text-center" style="visibility: hidden;"></div>
                                </a>
                                <a id="4-3-tab" data-toggle="pill" href="#v-4-3" role="tab" aria-controls="v-4-3" aria-selected="false" style="padding:0px;color:#3a3a3a;">
                                    <button class="btn btn-primary btn-block">4:3</button>
                                    <div id="preview-4-3" class="text-center" style="visibility: hidden;"></div>
                                </a>
                                <a id="1-1-tab" data-toggle="pill" href="#v-1-1" role="tab" aria-controls="v-1-1" aria-selected="false" style="padding:0px;color:#3a3a3a;">
                                    <button class="btn btn-primary btn-block">1:1</button>
                                    <div id="preview-1-1" style="visibility: hidden;"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active text-center" id="v-16-9" role="tabpanel" aria-labelledby="16-9-tab">
                                    <div class="bg-primary text-white">16:9</div>
                                    <img src="" id="16-9-show">
                                </div>
                                <div class="tab-pane fade text-center" id="v-4-3" role="tabpanel" aria-labelledby="4-3-tab">
                                    <div class="bg-primary text-white">4:3</div>
                                    <img src="" id="4-3-show"/>4:3</div>
                                <div class="tab-pane fade text-center" id="v-1-1" role="tabpanel" aria-labelledby="1-1-tab">
                                    <div class="bg-primary text-white">1:1</div>
                                    <img src="" id="1-1-show"/>1:1</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Crop</button>
                    <button type="button" class="btn btn-secondary" aria-label="Close" id="onClose">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">
    @endpush
    @push('page-css')
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-fileinput/css/fileinput.css')}}">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/cropperjs/cropper.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/pickers/form-pickadate.css">
    @endpush
    @push('custom-scripts')
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/editors/quill/katex.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/editors/quill/quill.min.js"></script>
    @endpush
    @push('page-js')
    <script src="{{asset('backend/plugins/bootstrap-fileinput/js/fileinput.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap-fileinput/themes/fa/theme.js')}}"></script>
    <script src="{{ asset('assets') }}/vendors/cropperjs/cropper.js"></script>
    <script src="{{ asset('assets') }}/ckeditorx/ckeditor.js"></script>
    <script src="{{ asset('assets') }}/js/scripts/forms/pickers/form-pickers.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script>
        function edValueKeyPress() {
            var edValue = document.getElementById("title");
            var s = edValue.value;

            var lblValue = document.getElementById("slug");
            lblValue.value = s.toLowerCase().replace(/[^\w-]+/g, '-');
        }

    </script>

    <script>
        $(function(){
            $("#pic-form").fileinput({
                showCaption: false,
                showUpload: false,
                dropZoneEnabled: false,
                maxImageWidth: 1024,
                maxImageHeight: 768,
                browseLabel: "Pick Image",
                mainClass: "input-group",
                browseIcon: "<i class=\"fa fa-picture-o\"></i> ",
                allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
            }).on('fileloaded', function(event, file, previewId, index, reader){
                var t_file = file.type;
                if(t_file){
                    var img = new Image();
                    img.src = reader.result;
                    img.onload = (e) => {
                        width = e.target.naturalWidth;
                        height = e.target.naturalHeight;

                        if(width > 1440 || height > 810){
                            alert('dimension image terlalu besar');
                            $("#pic-form").fileinput('clear');
                        }else{
                            var fileImg = reader.result;

                            $('#16-9-show').attr("src", fileImg);
                            $('#4-3-show').attr("src", fileImg);
                            $('#1-1-show').attr("src", fileImg);

                            const image16_9         = document.getElementById('16-9-show');
                            var previews16_9        = document.getElementById('preview-16-9');
                            var preview16_9Ready    = false;

                            var cropper16_9       = new Cropper(image16_9, {
                                viewMode: 2,
                                ready: function(){
                                    var clone = this.cloneNode();
                                    clone.className = '';
                                    clone.style.cssText = (
                                        'display: block;' +
                                        'width: 178px;' +
                                        'min-width: 0;' +
                                        'min-height: 0;' +
                                        'max-width: none;' +
                                        'max-height: none;'
                                    );
                                    previews16_9.appendChild(clone.cloneNode());
                                    var cropBoxData = cropper16_9.getCropBoxData();
                                    var imageData   = cropper16_9.getImageData();
                                    var data        = cropper16_9.getData();

                                    var previewAspectRatio = data.width / data.height;
                                    var previewImage = previews16_9.getElementsByTagName('img').item(0);
                                    var previewWidth = 178;
                                    var previewHeight = previewWidth / previewAspectRatio;
                                    var imageScaledRatio = data.width / previewWidth;

                                    previews16_9.style.height = previewHeight + 'px';
                                    previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                    previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                    previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                    previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                    $('#16_9_width').val(data.width);
                                    $('#16_9_height').val(data.height);
                                    $('#16_9_x').val(data.x);
                                    $('#16_9_y').val(data.y);

                                    preview16_9Ready = true;
                                },
                                crop: function(event) {
                                    if (!preview16_9Ready) {
                                        return;
                                    }
                                    var data = event.detail;
                                    var imageData = cropper16_9.getImageData();
                                    var previewAspectRatio = data.width / data.height;

                                    var previewImage = previews16_9.getElementsByTagName('img').item(0);
                                    var previewWidth = previews16_9.offsetWidth;
                                    var previewHeight = previewWidth / previewAspectRatio;
                                    var imageScaledRatio = data.width / previewWidth;

                                    previews16_9.style.height = previewHeight + 'px';
                                    previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                    previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                    previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                    previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                    $('#16_9_width').val(event.detail.width);
                                    $('#16_9_height').val(event.detail.height);
                                    $('#16_9_x').val(event.detail.x);
                                    $('#16_9_y').val(event.detail.y);
                                },
                                responsive: true,
                                rotatable: false,
                                scalable: false,
                                zoomable: false,
                                zoomOnTouch: false,
                                zoomOnWheel: false,
                                minContainerWidth: 570,
                                minContainerHeight: 300,
                                aspectRatio: 16 / 9,
                            });
                            const image4_3 = document.getElementById('4-3-show');
                            var previews4_3        = document.getElementById('preview-4-3');
                            var preview4_3Ready    = false;
                            var cropper4_3 = new Cropper(image4_3, {
                                ready: function(event){
                                    var clone = this.cloneNode();
                                    clone.className = '';
                                    clone.style.cssText = (
                                        'display: block;' +
                                        'width: 178px;' +
                                        'min-width: 0;' +
                                        'min-height: 0;' +
                                        'max-width: none;' +
                                        'max-height: none;'
                                    );

                                    previews4_3.appendChild(clone.cloneNode());
                                    var cropBoxData = cropper4_3.getCropBoxData();
                                    var imageData   = cropper4_3.getImageData();
                                    var data        = cropper4_3.getData();

                                    var previewAspectRatio = data.width / data.height;
                                    var previewImage = previews4_3.getElementsByTagName('img').item(0);
                                    var previewWidth = 178;
                                    var previewHeight = previewWidth / previewAspectRatio;
                                    var imageScaledRatio = data.width / previewWidth;

                                    previews4_3.style.height = previewHeight + 'px';
                                    previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                    previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                    previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                    previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                    $('#4_3_width').val(data.width);
                                    $('#4_3_height').val(data.height);
                                    $('#4_3_x').val(data.x);
                                    $('#4_3_y').val(data.y);

                                    preview4_3Ready = true;
                                },
                                crop: function(event) {
                                    if (!preview4_3Ready) {
                                        return;
                                    }
                                    var data = event.detail;
                                    var imageData = cropper4_3.getImageData();
                                    var previewAspectRatio = data.width / data.height;

                                    var previewImage = previews4_3.getElementsByTagName('img').item(0);
                                    var previewWidth = previews4_3.offsetWidth;
                                    var previewHeight = previewWidth / previewAspectRatio;
                                    var imageScaledRatio = data.width / previewWidth;

                                    previews4_3.style.height = previewHeight + 'px';
                                    previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                    previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                    previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                    previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                    $('#4_3_width').val(event.detail.width);
                                    $('#4_3_height').val(event.detail.height);
                                    $('#4_3_x').val(event.detail.x);
                                    $('#4_3_y').val(event.detail.y);
                                },
                                responsive: true,
                                rotatable: false,
                                scalable: false,
                                zoomable: false,
                                zoomOnTouch: false,
                                zoomOnWheel: false,
                                minContainerWidth: 570,
                                minContainerHeight: 300,
                                aspectRatio: 4 / 3,
                            });
                            const image1_1 = document.getElementById('1-1-show');
                            var previews1_1        = document.getElementById('preview-1-1');
                            var preview1_1Ready    = false;
                            var cropper1_1 = new Cropper(image1_1, {
                                ready: function(event){
                                    var clone = this.cloneNode();
                                    clone.className = '';
                                    clone.style.cssText = (
                                        'display: block;' +
                                        'width: 178px;' +
                                        'min-width: 0;' +
                                        'min-height: 0;' +
                                        'max-width: none;' +
                                        'max-height: none;'
                                    );
                                    previews1_1.appendChild(clone.cloneNode());
                                    var cropBoxData = cropper1_1.getCropBoxData();
                                    var imageData   = cropper1_1.getImageData();
                                    var data        = cropper1_1.getData();

                                    var previewAspectRatio = data.width / data.height;
                                    var previewImage = previews1_1.getElementsByTagName('img').item(0);
                                    var previewWidth = 178;
                                    var previewHeight = previewWidth / previewAspectRatio;
                                    var imageScaledRatio = data.width / previewWidth;

                                    previews1_1.style.height = previewHeight + 'px';
                                    previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                    previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                    previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                    previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                    $('#1_1_width').val(data.width);
                                    $('#1_1_height').val(data.height);
                                    $('#1_1_x').val(data.x);
                                    $('#1_1_y').val(data.y);

                                    preview1_1Ready = true;
                                },
                                crop: function(event) {
                                    if (!preview1_1Ready) {
                                        return;
                                    }
                                    var data = event.detail;
                                    var imageData = cropper1_1.getImageData();
                                    var previewAspectRatio = data.width / data.height;

                                    var previewImage = previews1_1.getElementsByTagName('img').item(0);
                                    var previewWidth = previews1_1.offsetWidth;
                                    var previewHeight = previewWidth / previewAspectRatio;
                                    var imageScaledRatio = data.width / previewWidth;

                                    previews1_1.style.height = previewHeight + 'px';
                                    previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                    previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                    previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                    previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                    $('#1_1_width').val(event.detail.width);
                                    $('#1_1_height').val(event.detail.height);
                                    $('#1_1_x').val(event.detail.x);
                                    $('#1_1_y').val(event.detail.y);
                                },
                                responsive: true,
                                rotatable: false,
                                scalable: false,
                                zoomable: false,
                                zoomOnTouch: false,
                                zoomOnWheel: false,
                                minContainerWidth: 570,
                                minContainerHeight: 300,
                                aspectRatio: 1 / 1,
                            });
                            $('#modal-default').modal({
                                show: true,
                                keyboard: false,
                                backdrop: 'static'
                            }).on('hidden.bs.modal', function (e) {

                                $('#preview-16-9').html('');
                                var preview16_9Ready    = false;
                                $('#16-9-show').attr('src','#');
                                cropper16_9.destroy();

                                $('#preview-4-3').html('');
                                var preview4_3Ready    = false;
                                $('#4-3-show').attr('src','#');
                                cropper4_3.destroy();

                                $('#preview-1-1').html('');
                                var preview1_1Ready    = false;
                                $('#1-1-show').attr('src','#');
                                cropper1_1.destroy();

                                $('.cropper-container').remove();
                            });
                            $('#onClose').on('click', function(){
                                $('#modal-default').modal('hide');

                                $('#preview-16-9').html('');
                                var preview16_9Ready    = false;
                                $('#16_9_width').val('');
                                $('#16_9_height').val('');
                                $('#16_9_x').val('');
                                $('#16_9_y').val('');

                                $('#16-9-show').attr('src','#');
                                cropper16_9.destroy();

                                $('#preview-4-3').html('');
                                var preview4_3Ready    = false;
                                $('#4_3_width').val('');
                                $('#4_3_height').val('');
                                $('#4_3_x').val('');
                                $('#4_3_y').val('');
                                $('#4-3-show').attr('src','#');
                                cropper4_3.destroy();

                                $('#preview-1-1').html('');
                                var preview1_1Ready    = false;
                                $('#1_1_width').val('');
                                $('#1_1_height').val('');
                                $('#1_1_x').val('');
                                $('#1_1_y').val('');
                                $('#1-1-show').attr('src','#');
                                cropper1_1.destroy();

                                $('.cropper-container').remove();
                                $("#pic-form").fileinput('clear');
                            });
                            $('#closeAtas').on('click', function(){
                                $('#modal-default').modal('hide');

                                $('#preview-16-9').html('');
                                var preview16_9Ready    = false;
                                $('#16_9_width').val('');
                                $('#16_9_height').val('');
                                $('#16_9_x').val('');
                                $('#16_9_y').val('');

                                $('#16-9-show').attr('src','#');
                                cropper16_9.destroy();

                                $('#preview-4-3').html('');
                                var preview4_3Ready    = false;
                                $('#4_3_width').val('');
                                $('#4_3_height').val('');
                                $('#4_3_x').val('');
                                $('#4_3_y').val('');
                                $('#4-3-show').attr('src','#');
                                cropper4_3.destroy();

                                $('#preview-1-1').html('');
                                var preview1_1Ready    = false;
                                $('#1_1_width').val('');
                                $('#1_1_height').val('');
                                $('#1_1_x').val('');
                                $('#1_1_y').val('');
                                $('#1-1-show').attr('src','#');
                                cropper1_1.destroy();

                                $('.cropper-container').remove();
                                $("#pic-form").fileinput('clear');
                            });
                        }
                    };
                }
            });
        })
    </script>
    @endpush
    </x-master-layouts>

