@extends('layout.home')
@section('content')
    
<div class="card bg-white pt-2 pb-2">
    <x-table>
        <x-slot name="title">
            Peserta Asuransi
        </x-slot>
        <x-slot name="urlAdd">{{ route('admin.employee.add') }}</x-slot>
        <x-slot name="thead">
            <tr>
                <th style="max-width: 10px">#</th>
                <th style="min-width: 165px">No Polis</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Nama Perusahaan</th>
                <th>Email</th>
                <th>Asuransi</th>
                <th>Status</th>
                <th class="fixed" style="max-width: 40px">Actions</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->no_polis }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->hrd->office_name }}</td>
                        <td>{{ $item->users->email }}</td>
                        <td>{{ $item->empProduct->product->name }}</td>
                        <td>{{ $item->empProduct->status_asuransi }}</td>
                        <td>
                            <div class="input-group-append">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.employee.edit',$item->id) }}" ><i data-feather="eye"></i> Lihat Detail</a>
                                <a class="dropdown-item" href="#" onclick="deletes({{ $item->id }})" ><i data-feather="trash"></i> Hapus</a>
                                <hr>
                                @if (auth()->user()->role_id == '1')
                                <a class="dropdown-item" href="#" onclick="statusPembayaran({{ $item->id }},'Aktif')" ><i data-feather="check"></i> Aktif</a>
                                <a class="dropdown-item" href="#" onclick="statusPembayaran({{ $item->id }},'Tidak Aktif')" ><i data-feather="x"></i> Tidak Aktif</a>
                                @endif

                                @if (auth()->user()->role_id == '2')
                                    @if ($item->empProduct->status_asuransi != 'Proses Penutupan Polis' && $item->empProduct->status_asuransi != 'Tidak Aktif')
                                        <a class="dropdown-item" href="#" onclick="reqCloseInsurance({{ $item->id }})" ><i data-feather="slash"></i> Tutup Polis</a>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>   
            @endforeach
        </x-slot>
    </x-table>
</div>

@endsection

@push('js')

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
    function deletes(id) {
            Swal.fire({
                title: 'Apakah anda yakin ingin Menghapus Data Ini ?',
                text: "Menghapus data bersifat permanent hati-hati!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                }).then((result) => {
                if (result.isConfirmed) {
                    var url = '{{ route("admin.employee.delete", ":id") }}';
                    url = url.replace(':id', id);
                    window.location=url;
                }
            })
        }
</script>

<script>
    function statusPembayaran(id,status) {
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
                var url = '{{ route("admin.employee.updateStatus", ["id"=>":id","status"=>":status"]) }}';
                url = url.replace(':id', id);
                url = url.replace(':status', status);
                window.location=url;
            }
        })
    }
</script>


<script>
    function reqCloseInsurance(id) {
        Swal.fire({
            title: 'Apakah anda Menutup Polis Ini ?',
            text: "Menutup data bersifat permanent hati-hati!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            }).then((result) => {
            if (result.isConfirmed) {
                var url = '{{ route("admin.employee.reqCloseInsurance", ["id"=>":id"]) }}';
                url = url.replace(':id', id);
                window.location=url;
            }
        })
    }
</script>
    
@endpush