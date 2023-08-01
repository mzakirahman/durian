@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between py-2" >
        <div class="card p-1 col">
        <h5>Table Value Sub Kriteria</h5>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success addButton" data-toggle="modal" data-target="#exampleModalCenter">
        Add
        </button>
    </div>
    <div class="card shadow-sm p-2">
        <table class="table" id="dtHorizontalExample" cellspacing="0"width="100%">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Keterangan Value</th>
                <th>Value</th>
                <th>Aksi</th>
            </tr>
            </thead>
           <tbody>
             @foreach($value as $v)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$v->nama_kriteria}}</td>
                    <td>{{$v->keterangan_value}}</td>
                    <td>{{$v->value}}</td>
                    <td>
                         <button class="btn btn-warning btn-detail open_modal"   value="{{$v->id_value_set}}"><i class="bi bi-pencil-square"></i></button>
                         <a href="value-set/data/hapus/{{$v->id_value_set}}" onclick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-danger"><i class="bi bi-trash2"></i></a>
                    </td>
                </tr>
            @endforeach
           </tbody>
        </table>


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route('value-set/tambah-data/proses') }}" id="form_modal" method="post">
             {{ csrf_field() }}
             <input type="hidden" class="form-control" name="id_value_set" id="id_value_set">
             <label for="">Kriteria</label>
             <select name="id_kriteria" id="id_kriteria" class="form-control">
                 @foreach($kriteria as $k)
                 <option value="{{$k->id_kriteria}}">{{$k->nama_kriteria}}</option>
                 @endforeach
             </select>
            <label for="">Keterangan Value</label>
            <input type="text" class="form-control" name="keterangan_value" id="keterangan_value">
            <label for="">Value</label>
            <input type="text" class="form-control" name="value" id="value">
            {{-- <button class="btn btn-success">Simpan</button> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
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
        var url = "value-set/get-data";
        var id= $(this).val();
        $.get(url + '?id_value_set=' + id, function (data) {
            //success data
            // console.log(data);
            $('#exampleModalLongTitle').html('Edit Data')
            $('#exampleModalCenter').modal('show');
            $('#id_value_set').val(data[0].id_value_set);
            $('#id_kriteria').val(data[0].id_kriteria);
            $('#keterangan_value').val(data[0].keterangan_value);
            $('#value').val(data[0].value);
            $('select option[value="' + data[0].id_kriteria +'"]').prop("selected", true);
            $('#form_modal').attr('action', '{{ route('value-set/edit-data/proses') }}');
        }) 
    });
    $(document).on('click','.addButton', function(){
         $('#form_modal')[0].reset();
        $('#exampleModalLongTitle').html('Tambah Data')
    });
    $(document).on('click','.closebtn', function(){
        $('#form_modal')[0].reset();
    });
</script>
@endsection
