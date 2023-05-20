@extends('layout.home')
@section('content')
    
<div class="card bg-white pt-2 pb-2">
    <x-table>
        <x-slot name="title">
            Benefit Asuransi
        </x-slot>
        <x-slot name="urlAdd">{{ route('admin.product_benefit.add',$product_id) }}</x-slot>
        <x-slot name="thead">
            <tr>
                <th style="max-width: 10px">#</th>
                <th>Logo</th>
                <th>Nama Benfit</th>
                <th>Jumlah Penanganan</th>
                <th>Asuransi</th>
                <th style="max-width: 40px">Actions</th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><i class="{{ $item->logo }}" style="font-size:48px;"></i></td>
                        <td>{{ Str::ucfirst($item->name) }}</td>
                        <td>Rp. {{ number_format($item->jumlah_biaya) }}</td>
                        <td>{{ Str::ucfirst($item->product->name) }}</td>
                        <td>
                            <div class="input-group-append">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.product_benefit.edit',$item->id) }}" ><i data-feather="eye"></i> Lihat Detail</a>
                                <a class="dropdown-item" href="#" onclick="deletes({{$product_id}},{{ $item->id }})" ><i data-feather="trash"></i> Hapus</a>
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
    function deletes(product_id,id) {
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
                    var url = '{{ route("admin.product_benefit.delete", ["products_id"=>":product_id","id"=>":id"]) }}';
                    url = url.replace(':id', id);
                    url = url.replace(':product_id', product_id);
                    window.location=url;
                }
            })
        }
</script>
    
@endpush