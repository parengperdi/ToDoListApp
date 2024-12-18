// Define the AngularJS module
var app = angular.module('todoApp', []);

// Define the controller
app.controller('TodoController', function ($scope, $http) {
    // Initialize variables
    $scope.tasks = [];       // Holds the list of tasks
    $scope.newTask = "";     // Holds the new task input

    // Function to fetch tasks from the server
    $scope.getTasks = function () {
        $http.get('api/get_tasks.php').then(function (response) {
            $scope.tasks = response.data;  // Populate the tasks array
        }, function (error) {
            console.error("Error fetching tasks:", error);
        });
    };

    // Function to add a new task
    $scope.addTask = function () {
        if ($scope.newTask.trim() !== "") {
            $http.post('api/add_task.php', { title: $scope.newTask }).then(function () {
                $scope.getTasks();    // Refresh the list
                $scope.newTask = "";  // Clear input field
            }, function (error) {
                console.error("Error adding task:", error);
            });
        }
    };

    // Function to update task completion status
    $scope.updateTask = function (task) {
        $http.post('api/update_task.php', { id: task.id, completed: task.completed }).then(function () {
            $scope.getTasks();  // Refresh the list
        }, function (error) {
            console.error("Error updating task:", error);
        });
    };

    // Function to delete a task
    $scope.deleteTask = function (id) {
        $http.post('api/delete_task.php', { id: id }).then(function () {
            $scope.getTasks();  // Refresh the list
        }, function (error) {
            console.error("Error deleting task:", error);
        });
    };

    // Load tasks when the app starts
    $scope.getTasks();
});
