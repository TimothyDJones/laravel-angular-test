var app = angular.module('TaskApp', [], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

app.controller('TaskController', function($scope, $http) {
  $scope.tasks = [];
  $scope.loading = false;

  $scope.init = function() {
    $scope.loading = true;
    $http.get('/api/task').
    success(function(data, status, headers, config) {
      $scope.tasks = data;
      $scope.loading = false;
    });
  }

  $scope.addTask = function() {
    $scope.loading = true;

    $http.post('/api/task', {
      title: $scope.task.title,
      description: $scope.task.description,
      done: "0" //$scope.task.done
    }).success(function(data, status, headers, config) {
      $scope.tasks.push(data);
      $scope.task = '';
      $scope.loading = false;
    });
  };

  $scope.updateTask = function(task) {
    $scope.loading = true;

    $http.put('/api/task/' + task.id, {
      title: task.title,
      description: task.description,
      done: task.done
    }).success(function(data, status, headers, config) {
      task = data;
      $scope.loading = false;
    });
  };

  $scope.deleteTask = function(index) {
    $scope.loading = true;

    var task = $scope.tasks[index];

    $http.delete('/api/task/' + task.id)
      .success(function() {
        $scope.tasks.splice(index, 1);
        $scope.loading = false;
      });
  };

  $scope.init();

});
