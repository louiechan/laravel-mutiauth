@extends('layouts.app')

@section('content')


    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
    <!-- Create Task Form... -->

  <!-- Current Tasks -->
  @if (count($tasks) > 0)
      <div class="panel panel-default ">
          <div class="panel-heading col-sm-6 col-sm-offset-3">
              Current Tasks
          </div>

          <div class="panel-body col-sm-6 col-sm-offset-3">
              <table class="table table-striped task-table">

              <!-- Table Headings -->
              <thead>
                  <th>Task</th>
                  <th>&nbsp;</th>
              </thead>

              <!-- Table Body -->
              <tbody>
              @foreach ($tasks as $task)
                  <tr>
                      <!-- Task Name -->
                      <td class="table-text">
                          <div>{{ $task->name }}</div>
                      </td>

                      <td>
                          <!-- TODO: Delete Button -->
                          <form  action="{{url('/task/'.$task->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">delete</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
              </tbody>
              </table>
          </div>
      </div>
  @endif



@endsection
