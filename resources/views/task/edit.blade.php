@extends('layouts.app')
@section('content')
<!--create content using bootstrap classes -->
<!-- place the content at the center using flex-->
<div class="w-100 h-100 d-flex justify-content-center align-items-center text-gray ">
    <!-- heading of the application -->
    <div class="text-center"style="width:50%"> <!-- give the content a font weight of 50% -->
        <h1 class="display-5 pb-3"> Edit {{$task->title}}  </h1>
         <!-- create a form -->
        <form action="{{route('task.update',$task->id)}}" method="POST"> <!-- the action will hit the store method of the taskCOntrollerClass -->
          @csrf <!-- protection -->
          @method('PUT')
          <!-- create an input using bootstrap -->
              <div class="input-group mb-3 w-100">
                 <input type="text" class="form-control form-control-lg" name="title" value= "{{$task->title}}"placeholder="My next task?........" aria-label="Recipient's username" aria-describedby="button-addon2">
                 <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-add-addon2"> Add a task </button>
                    </div>
              </div>
         </form>


    </div>
</div> <!-- outer div / container-->
@endsection
