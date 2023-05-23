@extends('layout.home')
@section('content')
<div class="card bg-white pt-2 pb-2">
    <x-table>
        <x-slot name="title">
            Payment List
        </x-slot>
        <x-slot name="urlAdd">null</x-slot>
        <x-slot name="thead">
            <tr>
                <th>#</th>
                <th style="min-width:150px">Nama Perusahaan</th>
                <th style="min-width:150px">Pembayaran Bulan</th>
                <th style="min-width:150px">Total</th>
                <th style="min-width:150px">Tanggal</th>
                <th style="min-width:150px">Bukti Transfer</th>
                <th style="min-width:150px">Status Pembayaran</th>
                <th style="min-width:150px">Action</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->hrd->office_name }}</td>
                        <td>{{ date('F',strtotime('2023-'.$item->pembayaran_bulan.'-01')) }}</td>
                        <td>Rp. {{ number_format($item->totals) }}</td>
                        <td>{{ date('d F Y',strtotime($item->tanggal)) }}</td>
                        <td>
                            <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{ $item->bukti_transfer }}'); width:250px" height="auto">
                                <img src="{{ $item->bukti_transfer }}" />
                            </figure>    
                        </td>
                        <td>{{ $item->status_pembayaran }}</td>
                        <td>
                            <div class="input-group-append">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="statusPembayaran({{ $item->id }},'Approve','{{ $item->pembayaran_bulan }}')" ><i data-feather="check"></i> Approve</a>
                                    <a class="dropdown-item" href="#" onclick="statusPembayaran({{ $item->id }},'Reject','{{ $item->pembayaran_bulan }}')" ><i data-feather="x"></i> Reject</a>
                                </div>
                            </div>
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
        function statusPembayaran(id,status,bulan) {
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
                    var url = '{{ route("admin.paymentlist.update", ["id"=>":id","status"=>":status","bulan"=>":bulan"]) }}';
                    url = url.replace(':id', id);
                    url = url.replace(':status', status);
                    url = url.replace(':bulan', bulan);
                    window.location=url;
                }
            })
        }
    </script>
        
@endpush
