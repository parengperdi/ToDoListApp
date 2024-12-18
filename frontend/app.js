// Define the AngularJS module
var app = angular.module('todoApp', []);

// Define the controller
app.controller('TodoController', function ($scope, $http) {
    $scope.tasks = [];
    $scope.newTask = "";

    // Fetch tasks
    $scope.getTasks = function () {
        $http.get('../backend/get_tasks.php').then(function (response) {
            $scope.tasks = response.data;
        }, function (error) {
            console.error("Error fetching tasks:", error);
        });
    };

    // Add a new task
    $scope.addTask = function () {
        if ($scope.newTask.trim() !== "") {
            $http.post('../backend/add_task.php', { title: $scope.newTask }).then(function () {
                $scope.getTasks();
                $scope.newTask = "";
            }, function (error) {
                console.error("Error adding task:", error);
            });
        }
    };

    // Update task
    $scope.updateTask = function (task) {
        $http.post('../backend/update_task.php', { id: task.id, completed: task.completed }).then(function () {
            $scope.getTasks();
        }, function (error) {
            console.error("Error updating task:", error);
        });
    };

    // Delete a task
    $scope.deleteTask = function (id) {
        $http.post('../backend/delete_task.php', { id: id }).then(function () {
            $scope.getTasks();
        }, function (error) {
            console.error("Error deleting task:", error);
        });
    };

    // Load tasks on start
    $scope.getTasks();
});
