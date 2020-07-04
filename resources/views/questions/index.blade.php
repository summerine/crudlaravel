@extends('questions.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Larahub</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New Questions</a>
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
            <th>Title</th>
            <th>Content</th>
            <th>User ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($questions as $question)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $question->title }}</td>
            <td>{{ $question->content }}</td>
            <td>{{ $question->user_id }}</td>
            <td>
                <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $questions->links() !!}
      
@endsection