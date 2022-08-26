@extends('layouts.app')
@section('content')
    <section class="content-header">

        <div class="box box-primary" style="margin: 70px">
            <div class="box-header with-border">
                <h3 class="box-title">Videos</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>

                    <tr>
                        <th>Kullanıcı Adı</th>
                        <th>Soru</th>
                        <th>Kaydedilme Tarihi</th>
                        <th>Video Süresi</th>
                        <th>Video</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @if(isset($data['video']))
                    @foreach($data['video'] as $video)
                            <tr id="item-{{$video->id}}">
                                <td>{{$video->username}}</td>
                                <td>{{$video->question}}</td>
                                <td>{{$video->saveDate}}</td>
                                <td>{{$video->time}}</td>
                                <td>{{$video->file}}</td>
                                <td width="5"><a href="javascript:void(0)"><i id="@php echo $video->id @endphp" class="fa fa-check"
                                                                              style="color: #00E466"></i></a>
                                </td>
                                <td width="5">
                                    <a href="javascript:void(0)"><i id="@php echo $video->id @endphp" class="fa fa-times"
                                                                    style="color: red"></i></a>
                                </td>
                            </tr>
                    @endforeach
                    @endif
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // $('#sortable').sortable({
            //     revert: true,
            //     handle: ".sortable",
            //     stop: function (event, ui) {
            //         var data = $(this).sortable('serialize');
            //         $.ajax({
            //             type: "POST",
            //             data: data,
            //             url: "",
            //             success: function (msg) {
            //                 // console.log(msg);
            //                 if (msg) {
            //                     alertify.success("İşlem Başarılı");
            //                 } else {
            //                     alertify.error("İşlem Başarısız");
            //                 }
            //             }
            //         });
            //
            //     }
            // });
            // $('#sortable').disableSelection();

        });

        $(".fa-times").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Reddetme işlemini onaylayın!', 'Bu işlem geri alınamaz',
                function () {

                    location.href = "/video/deny/"+destroy_id;
                },
                function () {
                    alertify.error('Reddetme işlemi iptal edildi')
                }
            )

        });
        $(".fa-check").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Video kaydını onaylayın!', 'Bu işlem geri alınamaz',
                function () {

                    location.href = "/video/confirm/"+destroy_id;
                },
                function () {
                    alertify.error('Onaylama işlemi iptal edildi')
                }
            )

        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
