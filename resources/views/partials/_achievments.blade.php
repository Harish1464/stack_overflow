 @auth
    @if($achievments = \App\Models\Achievment::where('user_id', auth()->user()->id)->get())
        <div class="card text-white bg-light mt-2 mb-2">
            <div class="card-body">
                <ul class="navbar-nav me-auto p-2">
                    <h4 class="text-info">Achievments: </h4>
                    @foreach($achievments as $achievment)
                        <li class="nav-item">
                            <button type="button" class="btn btn-info position-relative">
                                <i class="fas fa-trophy" style="font-size: 20px;"></i><br>
                              {{$achievment->achievmentType->title}} <br>Achiever
                              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                1+
                                <span class="visually-hidden">unread messages</span>
                              </span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endauth
