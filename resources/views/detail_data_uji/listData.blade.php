@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-2">
        @foreach($detail as $d)
        <div class="col-md-3">
            <a href="#" type="button" class="modal_open text-decoration-none text-center text-dark " value="{{$d->id_detail_data_uji}}">
                <div class="card" >
                     <img src="{{url('public/Image/'.$d->img)}}" class="card-img-top p-1 rounded" alt="">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$d->data_uji->nama_data_uji}}</h5>
                    </div>
                </div>
             </a>
        </div>
        @endforeach
    </div>
</div>


<!-- Modal -->

 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content bg-opacity-50">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Durian</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <img src="" class="w-100 img-responsive img-thumbnail" id="preview" alt="">
            </div>
            <div class="col-md-8">
                <h4 id="title"></h4>
                <div class="" id="keterangan"></div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">

    $(document).on('click','.modal_open',function(){
        var url = "detailDTU/get-data";
        var id= $(this).attr('value');
        console.log(id);
        $.get(url + '?id_detail_data_uji=' + id, function (data) {
            $('#title').html('');
            $('#keterangan').html('');
            $('#preview').attr('src','');
            $('#exampleModal').modal('show');
            $('#title').html(data[0].data_uji.nama_data_uji);
            $('#keterangan').html(data[0].ket_data_uji);
            var link ="{{ URL::asset('public/Image') }}/"+data[0].img;
            $('#preview').attr('src',link);
        }) 
    });
</script>



@endsection