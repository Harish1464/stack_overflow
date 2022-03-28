 @auth
    <?php 
        $achievment_types = \App\Models\AchievmentType::all(); 
        $achievment_types->achievments_count = 0;
        $achievment_data = [];
    ?>
    @if($achievments = \App\Models\Achievment::where('user_id', auth()->user()->id)->with('achievmentType')->get())

        @foreach($achievments as $achievment)
            @foreach($achievment_types as $key=>$achievment_type)
                @if($achievment_type->id == $achievment->achievment_type_id)
                    <?php $achievment_type['achievments_count'] = $achievment_type['achievments_count']+1; ?>
                @endif
            @endforeach
        @endforeach
        <div class="card text-white bg-light mt-3"  style="display: none;" id="achievments">
            <div class="card-body">
                <h4 class="text-info">Achievments: </h4>
                <ul class="list-group list-group-horizontal-md">
                    @foreach($achievment_types as $achievment_type)
                        @if($achievment_type->achievments_count>0)
                            @push('scripts')
                                <script type="text/javascript">
                                    document.getElementById("achievments").style.display = 'block';
                                </script>
                            @endpush
                            <li class="list-group-item">
                                <button type="button" class="btn btn-info position-relative">
                                    <i class="fas fa-trophy" style="font-size: 20px;"></i><br>
                                  {{$achievment_type->title}} <br>Achiever
                                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{$achievment_type->achievments_count}}
                                    <span class="visually-hidden">unread messages</span>
                                  </span>
                                </button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>        
    @endif
@endauth



<!-- @auth

    @if($achievments = \App\Models\Achievment::where('user_id', auth()->user()->id)->withCount('achievmentType')->get())
        <div class="card text-white bg-light mt-2 mb-2">
            <div class="card-body">
                <h4 class="text-info">Achievments: </h4>
                <ul class="list-group list-group-horizontal-md">
                    @foreach($achievments as $achievment_type=>$achievment)
                    <li class="list-group-item">
                            <button type="button" class="btn btn-info position-relative">
                                <i class="fas fa-trophy" style="font-size: 20px;"></i><br>
                              {{$achievment->achievmentType->title}} <br>Achiever
                              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{111}}
                                <span class="visually-hidden">unread messages</span>
                              </span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>        
    @endif
@endauth -->
