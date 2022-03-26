@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

@if(session('achievment'))
    <div class="alert alert-warning">
        <p><strong>WoW !!</strong></p>
        <ul>
            <li>{{session('achievment')}}</li>
        </ul>
    </div>
@endif

@if(session()->has('failures'))
    <table class="table table-danger">
        <tr>
            <td>Row</td>
            <td>Attribute</td>
            <td>Errors</td>
            <td>Value</td>
        </tr>
        @foreach(session()->get('failures') as $validation)
        <tr>
            <td>{{$validation->row()}}</td>
            <td>{{$validation->attribute()}}</td>
            <td>
                <ul>
                    @foreach ($validation->errors() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                {{$validation->values()[$validation->attribute()]}}
            </td>
        </tr>

        @endforeach
        
    </table>
@endif