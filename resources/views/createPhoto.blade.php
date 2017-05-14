@extends('layouts.blank')

@push('scripts')
    <!-- Validator -->
    <script src="{{ asset("js/validator.min.js") }}"></script>
    <!-- Tinymce -->
    <script src="{{ asset("js/tinymce/tinymce.min.js") }}"></script>
    <script>
        var init_tinymce = function() {
            tinymce.init({
                selector:'textarea',
                theme: 'modern',
                language: 'zh_TW',
                paste_data_images: true,
                plugins: [
                    'advlist autolink lists link image charmap preview hr anchor pagebreak',
                    'searchreplace visualblocks visualchars code',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | forecolor backcolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview',
                height: '320',
                setup: function (editor) {
                    editor.on('init', function(args) {
                        editor = args.target;
                        editor.on('NodeChange', function(e) {
                            if (e && e.element.nodeName.toLowerCase() == 'img') {
                                var height = (e.element.height > 563) ? 563 : e.element.height;
                                var width = (e.element.width > 1000) ? 1000 : e.element.width;
                                tinyMCE.DOM.setAttribs(e.element, {'width': width, 'height': height});
                            }
                        });
                    });
                }
            });
        }

        var init_ToolbarBootstrapBindings = function() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'
                ],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');

            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });

            $('a[title]').tooltip({
                container: 'body'
            });

            $('.dropdown-menu input').click(function () {
                    return false;
                })
                .change(function () {
                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                })
                .keydown('esc', function () {
                    this.value = '';
                    $(this).change();
                });

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this),
                    target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });

            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();

                $('.voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('.voiceBtn').hide();
            }
        }

        var init_validator = function () {
            if (typeof (validator) === 'undefined') {
                return;
            }

            // initialize the validator function
            validator.message.date = 'not a real date';

            // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
            $('form')
                .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                .on('change', 'select.required', validator.checkField);

            $('.multi.required').on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

            $('form').submit(function (e) {
                e.preventDefault();
                var submit = true;

                // evaluate the form using generic validaing
                if (!validator.checkAll($(this))) {
                    submit = false;
                }

                if (submit) {
                    var inputDescr = $('#editor-one').text();
                    $('#photo-desc').val(inputDescr);
                    this.submit();
                }

                return false;
            });
        };

        init_ToolbarBootstrapBindings();
        init_validator();
        init_tinymce();

        $(document)
            .on('blur', '#photo-url', function() {
                $('#photo-review').html('<img src="' + $(this).val() + '" height="100">');
            });
    </script>
@endpush

@section('main_container')
    <div class="page-title">
        <div class="title_left">
            <h3>相簿 <small>HOME > 個人專案管理 > 新增/編輯圖片</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="{{ $putURL or url('projects/album') }}" novalidate>
@if (!empty($putURL))
                        {{ method_field('PUT') }}
@endif
                        {{ csrf_field() }}
                        <div class="item form-group">
                            <label for="title" class="control-label col-md-1 col-sm-1 col-xs-12">標題<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="title" class="form-control" name="photoTitle" required="required" type="text" value="{{ $photoTitle or old('photoTitle') }}">
                            </div>
@if ($errors->has('photoTitle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('photoTitle') }}</strong>
                            </span>
@endif
                        </div>
                        <div class="item form-group">
                            <label for="photo-url" class="control-label col-md-1 col-sm-1 col-xs-12">圖片網址<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="photo-url" class="form-control" name="photoURL" required="required" type="text" value="{{ $photoURL or old('photoURL') }}">
                            </div>
@if ($errors->has('photoURL'))
                            <span class="help-block">
                                <strong>{{ $errors->first('photoURL') }}</strong>
                            </span>
@endif
                        </div>
                        <div class="item form-group">
                            <label for="photo_preview" class="control-label col-md-1 col-sm-1 col-xs-12">圖片預覽
                            </label>
                            <div id="photo-review" class="col-md-8 col-sm-8 col-xs-12">
@if (!empty($photoURL))
                                <img src="{{ $photoURL }}" height="100">
@endif
                            </div>
                        </div>
                        <textarea id="photo-desc" name="photoDesc">{{ $photoDesc or old('photoDesc') }}</textarea>
                        <input name="image" type="file" id="uploadFiles" class="hidden" onchange="" accept="image/*" style="display:none;">
@if ($errors->has('photoDesc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('photoDesc') }}</strong>
                        </span>
@endif
                        <div class="ln_solid"></div>

                        <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10">
                            <a href="{{ url('/projects/album') }}"><button type="button" class="btn btn-primary">回列表</button></a>
                            <button type="submit" class="btn btn-success">發佈</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection