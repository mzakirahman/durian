@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between py-2" >
       <div class="card p-1 col">
         <h5>Tabel Data Uji</h5>
       </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success addButton" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Add
        </button>
    </div>
    <div class="card shadow-sm p-2">
        {{-- {{$data_uji}} --}}
        <table id="dtHorizontalExample" class="table table-responsive table-bordered" cellspacing="0"width="100%">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Data Uji Alternatif</th>
                    @foreach($kriteria as $k)
                        <th >{{$k->nama_kriteria}}</th>
                    @endforeach
                    <th rowspan="2">Aksi</th>
                    <tr>
                    @foreach($kriteria as $k)
                        <th >{{$k->kode_kriteria}}</th>
                    @endforeach
                    </tr>
                </tr>
            </thead>
          <tbody>
              @foreach($data_uji as $dt)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$dt->nama_data_uji}}</td>
                    @foreach($dt->value as $v)
                        <td>{{$v->nilai_data_uji}}</td>
                    @endforeach
                    <td>
                         <button class="btn btn-warning btn-detail open_modal p-1" value="{{$dt->id_data_uji}}"><i class="bi bi-pencil-square"></i></button>
                         <a href="data-uji/data/hapus/{{$dt->id_data_uji}}" onclick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-danger p-1"><i class="bi bi-trash2"></i></a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>


    </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="{{ route('data-uji/tambah-data/proses') }}" id="form_modal" method="post">
             {{ csrf_field() }}
             <input type="hidden" class="form-control" name="id_data_uji" id="id_data_uji">
            <label for="">Nama Data Uji Alternatif</label>
            <input type="text" class="form-control" name="nama_data_uji" id="nama_data_uji">
            @foreach($kriteria as $k)
                    <label for="">{{$k->kode_kriteria}}</label>
                    <label for="">{{$k->nama_kriteria}}</label>
                     <input type="hidden" class="form-control" value="{{$k->id_kriteria}}" name="id_kriteria[]" id="id_kriteria_{{$k->id_kriteria}}">
                    <input type="hidden" class="form-control" name="id_value_data_uji[]" id="id_value_data_uji_{{$k->id_kriteria}}">
                    <input type="text" class="form-control" name="nilai_data_uji[]" id="nilai_data_uji_{{$k->id_kriteria}}">
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary closebtn" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>



<script type="text/javascript">
        $(document).ready(function () {
        $('#dtHorizontalExample').DataTable({
            "scrollX": true
        });
        $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function() {
                $('#dtHorizontalExample').DataTable();
            } );
        $(document).on('click','.open_modal',function(){
        var url = "data-uji/get-data";
        var id= $(this).val();
        console.log(id);
        $.get(url + '?id_data_uji=' + id, function (data) {
            //success data
            // console.log(data);
            $('#exampleModalCenter').modal('show');
            $('#id_data_uji').val(data[0].id_data_uji);
            $('#nama_data_uji').val(data[0].nama_data_uji);
          
            // setTimeout(() => {
                data[0].value.forEach(e => {
                    console.log(e.nilai_data_uji);
                $('#id_value_data_uji_'+e.id_kriteria).val(e.id_value_data_uji);
                $('#id_kriteria_'+e.id_kriteria).val(e.id_kriteria);
                $('#nilai_data_uji_'+e.id_kriteria).val(e.nilai_data_uji);
            });
              console.log($('#nilai_data_uji_4').val());
            // }, 1000);
         
            // $('#nama_kriteria').val(data[0].nama_kriteria);
            // $('#bobot').val(data[0].bobot);
            $('#form_modal').attr('action', '{{ route('data-uji/edit-data/proses') }}');
            $('#exampleModalLongTitle').html('Edit Data')
        }) 
    });
    $(document).on('click','.addButton', function(){
        $('#exampleModalLongTitle').html('Tambah Data')
        $('#form_modal')[0].reset();
    });
    $(document).on('click','.closebtn', function(){
        console.log('true')
        $('#form_modal')[0].reset();
    });
</script>



@endsection


