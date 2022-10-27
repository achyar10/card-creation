@extends('admin.layouts.main')
@section('title', 'Kelola FAQ')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }} </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('faqCreate') }}" class="btn btn-info btn-sm mb-3"><i class="bx bx-plus"></i>
                                Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal Update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rows as $key => $row)
                                            <tr>
                                                <td>{{ $rows->firstItem() + $key }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ $row->updated_at }}
                                                </td>
                                                <td>
                                                    <a href="/admin/{{ $uri }}/{{ $row->id }}/edit"
                                                        class="btn btn-primary btn-sm btn-rounded"><i
                                                            class="bx bxs-pencil"></i></a>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btn-rounded btnDelete"
                                                        data-bs-toggle="modal" data-bs-target="#showModal"
                                                        data-id="{{ $row->id }}">
                                                        <i class="bx bxs-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-start">
                                    Showing {{ $rows->firstItem() }}
                                    to {{ $rows->lastItem() }}
                                    of {{ $rows->total() }} entries
                                </div>
                                <div class="float-end">
                                    {!! $rows->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route($uri) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" id="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.btnDelete').click(function() {
            const id = $(this).data('id')
            $('#id').val(id)
        })
    </script>

@endsection
