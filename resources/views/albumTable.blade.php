@extends('layouts.blank')

@push('stylesheets')
    <!-- DataTables -->
    <link href="{{ asset("css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/responsive.bootstrap.min.css") }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- iCheck -->
    <script src="{{ asset("js/icheck.min.js") }}"></script>
    <!-- DataTables -->
    <script src="{{ asset("js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/dataTables.responsive.min.js") }}"></script>
    <script>
        var table = $(".datatable").DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            autoWidth: false,
            ajax: {
                url: '/api/v1/album',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            },
            columnDefs: [
                {
                    render: function(data, type, row) {
                        return '<a href="/projects/album/' + row[0] + '/edit">' + data + '</a>';
                    },
                    targets: 1
                },
                {
                    render: function(data, type, row) {
                        return '<img src="' + data + '" height="100">';
                    },
                    targets: 2
                },
                {
                    orderable: false,
                    render: function(data, type, row) {
                        let html = '';
                        html += '<a href="/projects/album/' + row[0] + '/edit"><button type="button" class="btn btn-sm btn-info">編輯</button></a>';
                        html += '<button type="button" class="btn btn-sm btn-danger btn-del" data-del="' + row[0] + '" data-toggle="modal" data-target=".bs-example-modal-sm">刪除</button>';
                        return html;
                    },
                    targets: 7
                }
            ]
        });

        $(document)
            .on('click', '.btn-del', function() {
                var $id = $(this).attr('data-del');
                $('.bs-example-modal-sm .btn-primary').attr('data-del', $id);
            })
            .on('click', '.bs-example-modal-sm .btn-primary', function() {
                var $id = $(this).attr('data-del');
                axios({
                    'method': 'delete',
                    'url': '/api/v1/album/' + $id
                })
                .then(function(response) {
                    table.ajax.reload();
                    $('.modal').modal('hide');
                })
                .catch(function(error) {
                    console.log(error);
                });
            });
    </script>
@endpush

@section('main_container')
    <div class="page-title">
        <div class="title_left">
            <h3>相簿 <small>HOME > 個人專案管理 > 相簿</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <a href="{{ route('album.create') }}"><button type="button" class="btn btn-success">新增</button></a>
                    <hr>
                    <table class="table table-striped table-bordered dt-responsive nowrap datatable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>編號</th>
                                <th>標題</th>
                                <th>圖片</th>
                                <th>描述</th>
                                <th>分類</th>
                                <th>建立時間</th>
                                <th>更新時間</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h4>確定刪除？</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-bottom: 0;">取消</button>
                <button type="button" class="btn btn-primary">確定</button>
            </div>
        </div>
    </div>
</div>
@endsection