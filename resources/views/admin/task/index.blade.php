@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Task Management</div>
                <div class="panel-body">

                    @include('common.errors')
                    @if(count($tasks)==0)
                      <h4>There aren't any tasks!!</h4>
                    @endif

                    <div class="row">
                      <div class="col-xs-3">
                        <h4>user id</h4>
                      </div>
                      <div class="col-xs-3">
                        <h4>task name</h4>
                      </div>
                      <div class="col-xs-3">
                        <h4>operations</h4>
                      </div>
                    </div>
                    @foreach ($tasks as $task)
                        <hr>

                        <div class="row">
                          <div class="col-xs-3 c">
                            <h4>{{ $task->user_id}}</h4>
                          </div>
                          <div class="col-xs-3">
                            <h4>{{ $task->name }}</h4>
                          </div>
                          <div class=" col-xs-3">

                            <!-- <a href="{{ url('admin/task/'.$task->id.'/edit') }}" class="btn btn-success">edit</a> -->
                            <form action="{{ url('admin/task/'.$task->id) }}" method="POST" style="display: inline;">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                          </div>


                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
