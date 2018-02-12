//  var app = angular.module("app", []);


//  app.controller("mainController", function ($scope, $http) {

//      $scope.employee = [];
//      $scope.employeeData = [];

//      $http.get('/api.php/employee/').then(function(res){      
//         $scope.employeeData = res.data;
//         $scope.employee = $scope.employeeData.slice(0,2);
//      });

//      $scope.pagination = function(page){
//         var from = 0;
//         var to = 0;

//         if(page != 0)
//             from = page + 1;

//         to = from + 2;

//         $scope.employee = $scope.employeeData.slice(from, to);
//         $scope.method();
//      }

//      $scope.method = function(){
//         alert("it worked!!!");
//      }

//  });