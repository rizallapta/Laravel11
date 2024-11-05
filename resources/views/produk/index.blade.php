@extends('layoutes.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <a href="{{ route('index.create') }}" class="btn btn-sm btn-primary mb-4">Tambah Data</a> <!-- Button moved here -->
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Produk
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($produk as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->jenis }}</td>
                            <td>{{ $k->harga_jual }}</td>
                            <td>{{ $k->harga_beli }}</td>
                            <td>
                                @empty($k->foto)
                                <img src="{{url('image/nophoto.jpg')}}" alt="No Image" class="rounded" style="width: 100px; height: auto;">
                                @else
                                <img src="{{url('image/'.$k->foto)}}" alt="Foto Produk" class="rounded" style="width: 100px; height: auto;">
                                @endempty
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-secondary">Show</a>
                                <a href="{{ route('index.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$k->id}}">
                                    Hapus
                                    </button>
                                     
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$k->nama}}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                            <form action="{{ route('index.destroy', $k->id) }}" method="POST" style="display:inline;">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                    
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
