@extends('answers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Larahub</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('answers.create') }}"> Create New Answers</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Question ID</th>
            <th>User ID</th>
            <th>Content</th>
            <th>Is Selected</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($anwers as $answer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $answer->question_id }}</td>
            <td>{{ $answer->user_id }}</td>
            <td>{{ $answer->content }}</td>
            <td>{{ $answer->is_selected }}</td>
            <td>
                <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('answers.show',$answer->id) }}">Show</a>
    
                    <!-- <a class="btn btn-primary" href="{{ route('answers.edit',$answer->id) }}">Edit</a> -->
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $answers->links() !!}
      
@endsection