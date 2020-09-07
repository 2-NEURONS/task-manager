@extends('layouts.app')
@section('content')
<!--create content using bootstrap classes -->
<!-- place the content at the center using flex-->
<div class="w-100 h-100 d-flex justify-content-center align-items-center text-gray ">
    <!-- heading of the application -->
    <div class="text-center"style="width:50%"> <!-- give the content a font weight of 50% -->
        <h1 class="display-5 pb-3">  Personal Task Manager </h1>
         <!-- create a form -->
        <form action="{{route('task.store')}}" method="POST"> <!-- the action will hit the store method of the taskCOntrollerClass -->
          @csrf <!-- protection -->
          <!-- create an input using bootstrap -->
              <div class="input-group mb-3 w-100">
                 <input type="text" class="form-control form-control-lg" name="title" placeholder="My next task?........" aria-label="Recipient's username" aria-describedby="button-addon2">
                 <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-add-addon2"> Add a task </button>
                    </div>
              </div>
             </form>

                <!-- geading for my tasks -->
              <h2 class="text-white pt-2">My existing Tasks </h2>

                <!-- show tasks inside this div -->
            <div class="bg-white w-100">

           @forelse($tasks as $task)
           <div class="w-100 d-flex align-items-center justify-content-between">
             <div class="p-4">
               @if($task-> completed == 0)
               <!-- clipboard sgv -->
               <svg width="2em" height="4em" viewBox="0 0 16 16" class="bi bi-clipboard-minus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                 <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm-1 9.5A.5.5 0 0 1 6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
               </svg>
                @else
                <!-- is used this clipboard for denoting a cpmpleted task -->
                <svg width="2em" height="4em" viewBox="0 0 16 16" class="bi bi-clipboard-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
               @endif
               {{$task->title}}
            </div>

                <div class="mr-3 d-flex align-items-center justify-content-between">
                @if($task->completed == 0)

                                 <form action = "{{ route("task.update",$task->id) }}" method="POST">
                                   @method('PUT')
                                   @csrf
                                  <input type="text" name ="completed" value = "1" hidden>

                                   <button class="btn btn-success"> Mark as completed </button>
                                  </form>
                                  @else

                                                   <form action = "{{ route("task.update",$task->id) }}" method="POST">
                                                     @method('PUT')
                                                     @csrf
                                                    <input type="text" name ="completed" value = "0" hidden>

                                                     <button class="btn btn-warning"> Mark as not completed </button>
                                              </form>
                                  @endif
                                 <a class="inline-block"href="{{route('task.edit',$task->id)}}">

                                  <svg width="2em" height="4em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-down-left ml-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="#FFEC89">
                                  <path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                  <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z"/>
                                  </svg>

                                 </a>
                                              <!-- the delete form -->
                <form action="{{ route('task.destroy',$task->id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button class="border-0 bg-transparent ml-2">

     <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg" stroke="#c14638">
     <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
     <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
     </svg>

  </button>

</form>

                </div>

           </div>
           @empty
            No tasks added, you might consider adding new!
           @endforelse

         </div> <!-- end of tasks container -->
    </div>
</div> <!-- outer div / container-->
@endsection
