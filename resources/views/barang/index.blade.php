@extends('layouts/app')

@section('konten')

                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA BARANG</th>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">KONDISI</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($barang as $item)
                                <tr>

                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/barang/').$item->gambar }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td>{{ $item->kondisi }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $barang->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>

</body>
</html>
@endsection
