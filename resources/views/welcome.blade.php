@extends('layouts.app')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">

        <div class="text-center" style="width:40%">
            <h1 class="display-2 ">Todo App</h1>
            <form action="{{route('todo.store')}}" method="POST" id="add-form">
                    @csrf
                    <div class="input-group mb-3 w-100">
                        <input type="text" class="form-control form-control-lg " name="title" placeholder="type here..." >
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2">
                                Add to the list
                            </button>
                        </div>
                    </div>
            </form>
            <h2>My Todo List:</h2>
            <div class="bg-red w-100">
                @foreach ($todos as $todo)
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <div class="p-4">
                            @if ($todo->completed == 0)
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                            @else 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                            @endif 
                            {{$todo->title}}
                        </div>
                        {{-- update complete or incomplete --}}
                        <div class="mr-4 d-flex align-items-center">
                            @if ($todo->completed == 0)
                                <form action="{{route('todo.update',$todo->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <input name="completed" type="text" value="1" hidden>
                                <button class="btn btn-success">Mark it as Completed.</button>
                                </form>
                            @else
                                <form action="{{route('todo.update',$todo->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <input name="completed" type="text" value="0" hidden>
                                <button class="btn btn-warning">Mark it as Incompleted.</button>
                                </form>
                            @endif
                            {{-- edit the task title--}}
                            <a class="inline-block" href="{{ route('todo.edit', $todo->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil ml-2" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c14638" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                            
                            {{-- Delete form --}}
                            <form action="{{route('todo.destroy',$todo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="border-0 bg-transparent ml-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash " width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                               
                            </form>
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#add-form").submit( function (e){
                e.preventDefault();
                var form = $("#add-form")[0];
                var data = new FormData(form);

                $('#button-addon2').prop("disabled",true);
                var url = $(this).attr('action');
                $.ajax({
                    type:"POST",
                    url:url,
                    data:data,
                    processData:false,
                    contentType:false,
                    success: function(data){
                       
                    },
                    error:function(e){

                    }
                });
            })
        });
    </script>
@endsection