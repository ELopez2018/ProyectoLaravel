@extends('layout/header')
    <script  type="text/javascript">
       document.onreadystatechange = function () {
        if (document.readyState == "interactive") {

               Swal.fire({ 
                   icon:  "{{ $repuesta['icon'] }}",
                   title: "{{ $repuesta['title'] }}",
                   text:  "{{ $repuesta['text'] }}",
                   }).then((result) => {
                       window.location.href="{{ $repuesta['ruta'] }}";
                    })
                   ;

            }
        }
    </script>