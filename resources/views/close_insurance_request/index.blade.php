@extends('layout.home')
@section('content')
<div class="card bg-white pt-2 pb-2">
    <x-table>
        <x-slot name="title">
            Permintaan Penutupan Polis
        </x-slot>
        <x-slot name="urlAdd">null</x-slot>
        <x-slot name="thead">
            <tr>
                <th>#</th>
                <th style="min-width:150px">Nama Karyawan</th>
                <th style="min-width:150px">Asuransi</th>
                <th style="min-width:150px">Tanggal</th>
                <th style="min-width:150px">Status</th>
                <th style="min-width:150px">Action</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->employee->name }}</td>
                        <td>{{ $item->employee->empProduct->product->name }}</td>
                        <td>{{ date('d F Y',strtotime($item->date)) }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if ($item->status == 'Menunggu Konfirmasi')
                                <div class="input-group-append">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="statusPenutupanPolis({{ $item->id }},'Approve')" ><i data-feather="check"></i> Approve</a>
                                        <a class="dropdown-item" href="#" onclick="statusPenutupanPolis({{ $item->id }},'Reject')" ><i data-feather="x"></i> Reject</a>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>   
            @endforeach
        </x-slot>
    </x-table>
</div>
@endsection

@push('js')
    <script>
        $(document).ready( function () {
            var table = $('.myTable').DataTable({});
        } );
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

    <script>
        function zoom(e){
            var zoomer = e.currentTarget;
            e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
            e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
            x = offsetX/zoomer.offsetWidth*100
            y = offsetY/zoomer.offsetHeight*100
            zoomer.style.backgroundPosition = x + '% ' + y + '%';
        }
    </script>


    <script>
        function statusPenutupanPolis(id,status) {
            Swal.fire({
                title: 'Apakah anda Me-'+status+' Data Ini ?',
                text: "Menghapus data bersifat permanent hati-hati!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                }).then((result) => {
                if (result.isConfirmed) {
                    var url = '{{ route("admin.close_insurance_req.update", ["id"=>":id","status"=>":status"]) }}';
                    url = url.replace(':id', id);
                    url = url.replace(':status', status);
                    window.location=url;
                }
            })
        }
    </script>
        
@endpush
