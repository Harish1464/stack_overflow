<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <title>Stack Overflow | @yield('title')</title>
</head>
<body>
    
    <div class="container">
        @include('partials._navbar')
        @include('partials._achievments')


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

     <script type="text/javascript">
        $(document).on('click', '#delete-btn', function(event){
            event.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                $(this).parent().find('form').submit();
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'This file has been deleted.',
                  'success'
                )
              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your file is now safe :)',
                  'error'
                )
              }
            })
        });
    </script>
    @stack('scripts')
</body>
</html>