@extends('layout.template')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Devices</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="deviceTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Device</th>
                            <th>Topic Publish</th>
                            <th>Topic Subscribe</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devices as $device)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $device->nama_device }}</td>
                                <td>{{ $device->topic_publish }}</td>
                                <td>{{ $device->topic_subscribe }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deviceEditModal"
                                        id="btnEdit" data-id="{{ $device->id }}" data-nama="{{ $device->nama_device }}"
                                        data-publish="{{ $device->topic_publish }}"
                                        data-subscribe="{{ $device->topic_subscribe }}"><i
                                            class="fas fa-edit"></i></button>
                                    <form action="{{ url('devices/' . $device->id) }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Apakah anda yakin?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('content-modal')
    <div class="modal fade" id="deviceModal" tabindex="-1" aria-labelledby="deviceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deviceModalLabel">Tambah Device</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('devices') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_device">Nama Device</label>
                            <input type="text" name="nama_device" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topic_publish">Topic Publish</label>
                            <input type="text" name="topic_publish" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topic_subscribe">Topic Subscribe</label>
                            <input type="text" name="topic_subscribe" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deviceEditModal" tabindex="-1" aria-labelledby="deviceEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deviceEditModalLabel">Edit Device</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_device">Nama Device</label>
                            <input type="text" name="nama_device" id="nama_device" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topic_publish">Topic Publish</label>
                            <input type="text" name="topic_publish" id="topic_publish" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topic_subscribe">Topic Subscribe</label>
                            <input type="text" name="topic_subscribe" id="topic_subscribe" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('content-script')
    <script>
        $(function() {
            $("body").on('click', '#btnEdit', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                let publish = $(this).data('publish');
                let subscribe = $(this).data('subscribe');

                $("#nama_device").val(nama);
                $("#topic_publish").val(publish);
                $("#topic_subscribe").val(subscribe);

                $("#form").attr("action", "{{ url('devices') }}/" + id);
            })
        })
    </script>
@endsection
