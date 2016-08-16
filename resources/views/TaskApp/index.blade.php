@extends('app')
@section('content')
<div class="container" ng-app="TaskApp" ng-controller="TaskController">
  <h1>TaskApp Index View</h1>
  <div class="row">
    <div class="col-md-4">
      <h2>Add Task</h2>
      <input type="text" ng-model="task.title">
      <input type="text" ng-model="task.description">
      <input type="hidden" ng-model="task.done" ng-value="0">
      <button class="btn btn-primary btn-md" ng-click="addTask()">Add</button>
      <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
    </div>
  </div>
  <hr />
  <div class="row">
    <div class="col-md-4">
      <table class="table table-stripped">
        <tr ng-repeat="task in tasks">
          <td><input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="task.done" ng-change="updateTask(task)"></td>
          <td><% task.title %></td>
          <td><% task.description %></td>
          <td><button class="button btn-danger btn-xs" ng-click="deleteTask($index)">  <span class="glyphicon glyphicon-trash"></span></button></td>
        </tr>
      </table>
    </div>
  </div>
</div>
@stop
