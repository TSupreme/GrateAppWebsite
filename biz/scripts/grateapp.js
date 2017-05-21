'use strict';
var module = angular.module('grateapp', ['ngRoute'])
.config(['$routeProvider',
    function config($routeProvider) {
      

      $routeProvider
          .when('/', {
          template: 'views/home.html'
        })
          .when('/login', {
          template: 'views/login.html'
        })
          .when('/register', {
          template: 'views/register.html'
        })
          .otherwise('/');
    }
  ])



.controller('PropertyController', function PhoneListController($scope) 
            {
  
    $scope.page = 'home';
    
    $scope.SetPage = function (name)
    {
        $scope.page = name;
    };
    
  
});
    


    
    
   
