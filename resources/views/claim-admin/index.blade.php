@extends('layout.home')
@section('content')
    <div class="card bg-white pt-2 pb-2">
        @if ($errors->any())
            <div class="alert alert-danger p-1" role="alert">
                <h6 class="pl-1 text-danger"> <b>Error</b>, Silahkan Cek inputan anda</h6>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <x-table>
            <x-slot name="title">
                Request Claim List
            </x-slot>
            <x-slot name="urlAdd">null</x-slot>
            <x-slot name="thead">
                <tr>
                    <th>#</th>
                    <th style="min-width:250px">Akun Bank</th>
                    <th style="min-width:250px">Nama Claim Benefit</th>
                    <th style="min-width:250px">Tanggal Request</th>
                    <th style="min-width:150px">Kwitansi</th>
                    <th style="min-width:250px">Status Claim Anda</th>
                    <th>Action</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->no_rekening }} / {{ $item->name_bank }} ({{ $item->bank }})</td>
                            <td>{{ $item->productBenefit->name }}</td>
                            <td>{{ date('d F Y',strtotime($item->tanggal)) }}</td>
                            <td><button class="btn btn-warning" onclick="viewKwitansi('{{ $item->kwitansi }}')" data-toggle="modal" data-target="#staticBackdrop">View Kwitnasi</button></td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="input-group-append">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="statusClaim({{ $item->id }},'Approve')" ><i data-feather="check"></i> Approve</a>
                                    <a class="dropdown-item" href="#" onclick="statusClaim({{ $item->id }},'Tolak Claim')" ><i data-feather="x"></i> Tolak Claim</a>
                                </div>
                            </td>
                        </tr>   
                @endforeach
            </x-slot>
        </x-table>
    </div>


    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Kwitansi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <iframe id="kwitansi_view" width="100%" height="600" style="visibility:visible" src=""></iframe>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="reason" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reasonLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reasonLabel">Alasan Menolak</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('admin.claim_request_list.updateTolak') }}" method="post">
            @csrf
            <div class="modal-body">
                    <input type="hidden" value="" id="id" name="id">
                    <div class="row">
                        <div class="col">
                            <label for="status">Status</label>
                            <input type="text" readonly class="form-control" id="status" name="status" value="Tolak Claim" autocomplete="false" placeholder="Status" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="alasan">Alasan</label>
                            <textarea name="alasan" id="alasan" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-warning">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
@endsection

@push('js')
    <script>
        function viewKwitansi(url) {
            $('#kwitansi_view').attr('src',url);
        }
    </script>

    <script>
        function statusClaim(id,status) {
            Swal.fire({
                title: 'Apakah anda Me-'+status+' Data Ini ?',
                text: "Menghapus data bersifat permanent hati-hati!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!',
                cancelButtonText: 'Batal',
                }).then((result) => {
                if (result.isConfirmed) {
                    if(status === 'Tolak Claim'){
                        $('#reason').modal('show');
                        $('#id').val(id);
                    }else{
                        var url = '{{ route("admin.claim_request_list.update", ["id"=>":id","status"=>":status"]) }}';
                        url = url.replace(':id', id);
                        url = url.replace(':status', status);
                        window.location=url;
                    }
                }
            })
        }
    </script>

    @if (session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text:  '{{ session("status") }}',
        })
    </script>
    @endif
@endpush
