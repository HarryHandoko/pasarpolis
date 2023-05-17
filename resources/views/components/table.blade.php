<div>
    <div>
        <h3 class="pl-1">{{ $title ?? null }}</h3>
        <hr>
        <div class="row pl-1 pr-1 mb-0">
            <div class="col-6">
                <div class="col-3">
                    <select name="selectCount" class="form-control" id="selectCount">
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" id="search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-warning" type="button"><i data-feather="search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <a href="{{ $urlAdd ?? null }}" class="btn btn-warning"  ><i data-feather="plus"></i>Add Data</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive pt-0 mt-0">
            <table class="table  table-striped" id="myTable">
                <thead class="thead-light">
                    {{ $thead ?? null }}
                    
                </thead>
                <tbody class="tbody-light">
                    {{ $tbody ?? null }}
                </tbody>
            </table>
        </div>
    </div>
    
    
    
    @push('js')
    <script>
        $(document).ready( function () {
            var table = $('#myTable').DataTable({
                'dom' : "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5 p-1'i><'col-sm-12 col-md-7 p-1'p>>",
            });
    
            $('#search').on( 'keyup', function () {
                table.search( this.value ).draw();
            } );
        } );
    </script>
        
    @endpush
</div>