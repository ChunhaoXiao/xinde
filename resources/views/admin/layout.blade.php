@extends('adminlte::page')

@section('title', '后台管理系统')

@section('content_header')
    <!-- <h1>首页</h1> -->
@stop

@section('content')

@stop

@section('css')


@stop 


@section('js')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".fa-trash-alt").on('click', function(){
            //alert('aaaafff')
            const url = $(this).data('url');
            Swal.fire({
            title: '确认删除',
            text: '确定要删除吗？',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '确定',
            cancelButtonText:'取消',
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:url,
                    type:'delete',
                    success:res => {
                        Swal.fire(
                        '删除成功!',
                        
                        )
                        setTimeout(function(){location.reload()}, 1000)
                    },
                    error:res => {
                        Swal.fire(
                            res.responseJSON.message
                        
                        )
                    }
                })
            }
            })
        })
    })
</script>
@stop




