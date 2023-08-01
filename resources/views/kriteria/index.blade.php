@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between py-2" >
        <div class="card p-1 col">
            <h5>Tabel Data Kriteria</h5>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success addButton" data-toggle="modal" data-target="#exampleModalCenter">
        Add
        </button>
    </div>
    <div class="card shadow-sm p-2">
        <table class="table " id="dtHorizontalExample" cellspacing="0"width="100%">
           <thead>
             <tr>
                <th>No</th>
                <th>Kode Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Faktor</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
           </thead>
           <tbody>
             @foreach($kriteria as $k)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$k->kode_kriteria}}</td>
                    <td>{{$k->nama_kriteria}}</td>
                    <td>{{$k->faktor}}</td>
                    <td>{{$k->bobot}}</td>
                    <td>
                         <button class="btn btn-warning btn-detail open_modal"   value="{{$k->id_kriteria}}"><i class="bi bi-pencil-square"></i></button>
                         <a href="kriteria/data/hapus/{{$k->id_kriteria}}" onclick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-danger"><i class="bi bi-trash2"></i></a>
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
         <form action="{{ route('kriteria/tambah-data/proses') }}" id="form_modal" method="post">
             {{ csrf_field() }}
             <input type="hidden" class="form-control" name="id_kriteria" id="id_kriteria">
            <label for="">Kode Kriteria</label>
            <input type="text" class="form-control" name="kode_kriteria" id="kode_kriteria">
            <label for="">Nama Kriteria</label>
            <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria">
            <label for="">Bobot Kriteria</label>
            <input type="text" class="form-control" name="bobot" id="bobot">
            <label for="">Faktor</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="faktor"  value="core" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Core Faktor
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="faktor" value="secondary" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Secondary Faktor
                </label>
            </div>
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
        var url = "kriteria/get-data";
        var id= $(this).val();
        $.get(url + '?id_kriteria=' + id, function (data) {
            //success data
            // console.log(data);
            $('#exampleModalCenter').modal('show');
            $('#id_kriteria').val(data[0].id_kriteria);
            $('#kode_kriteria').val(data[0].kode_kriteria);
            $('#nama_kriteria').val(data[0].nama_kriteria);
            $('#bobot').val(data[0].bobot);
             if(data[0].faktor=='core'){
                $('#flexRadioDefault1').prop('checked',true);
            }
            if(data[0].faktor=='secondary'){
                $('#flexRadioDefault2').prop('checked',true);
            }
            $('#form_modal').attr('action', '{{ route('kriteria/edit-data/proses') }}');
            $('#exampleModalLongTitle').html('Edit Data')
        }) 
    });
    $(document).on('click','.addButton', function(){
        $('#exampleModalLongTitle').html('Tambah Data')
    });
    $(document).on('click','.closebtn', function(){
        console.log('true')
        $('#form_modal')[0].reset();
    });
</script>



@endsection