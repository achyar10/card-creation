@extends('admin.layouts.main')
@section('title', 'Detail Member')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $row->fullname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $row->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Join</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Point</td>
                                        <td><span class="badge bg-danger">{{ $row->point }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Status Member</td>
                                        <td><span
                                                class="badge bg-{{ $row->is_active ? 'success' : 'danger' }}">{{ $row->is_active ? 'Aktif' : 'Block' }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button class="btn btn-{{ $row->is_active ? 'danger' : 'success' }}" data-bs-toggle="modal"
                                data-bs-target="#showModal">{{ $row->is_active ? 'Blokir' : 'Aktifkan' }}
                                Member</button>
                        </div>
                    </div>
                    <h4>History Member</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Via</th>
                                            <th>Point</th>
                                            <th>IP Address</th>
                                            <th>Tanggal Share</th>
                                            <th>Tanggal Buat Kartu</th>
                                            <th>Gambar Kartu</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histories as $key => $history)
                                            <tr class="align-middle">
                                                <td>{{ $histories->firstItem() + $key }}</td>
                                                <td>{{ $history->via }}</td>
                                                <td>{{ $history->point }}</td>
                                                <td>{{ $history->ip_address }}</td>
                                                <td>{{ $history->created_at }}</td>
                                                <td>{{ isset($history->creation) ? $history->creation->created_at : '-' }}
                                                <td>
                                                    @if (isset($history->creation))
                                                        <a href="{{ $history->creation->url_path }}"
                                                            class="btn btn-success btn-sm" target="_blank">Lihat</a>
                                                    @else
                                                        Tidak ada kartu
                                                    @endif

                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-start">
                                    Showing {{ $histories->firstItem() }}
                                    to {{ $histories->lastItem() }}
                                    of {{ $histories->total() }} entries
                                </div>
                                <div class="float-end">
                                    {!! $histories->links() !!}
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
            <form action="{{ url("/admin/member/$row->id/status") }}" method="post">
                @csrf
                {{-- @method('delete') --}}
                {{-- <input type="hidden" name="id" id="id"> --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Blokir</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan memblokir member ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Blokir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
