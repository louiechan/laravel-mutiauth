@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User Management</div>
                <div class="panel-body">

                    @include('common.errors')
                    @if(count($users)==0)
                      <h4>There aren't any users!!</h4>
                    @endif
                    <div class="row">
                      <div class="col-xs-3">
                        <h4>user id</h4>
                      </div>
                      <div class="col-xs-3">
                        <h4>user name</h4>
                      </div>
                      <div class="col-xs-3">
                        <h4>operations</h4>
                      </div>
                    </div>
                    @foreach ($users as $user)
                        <hr>

                        <div class="row">
                          <div class="col-xs-3 c">
                            <h4>{{ $user->id}}</h4>
                          </div>
                          <div class="col-xs-3">
                            <h4>{{ $user->name }}</h4>
                          </div>
                          <div class=" col-xs-3">

                            <form action="{{ url('admin/user/'.$user->id) }}" method="POST" style="display: inline;">
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
