<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

   var app = angular.module('myApp',[]);
	 app.controller('myCtrl',function($scope,$http)
	 {

    $scope.postData = function(){
    $http.post('http://localhost/crud/index.php/pages/postdata',$scope.newUser).
	  then(function successCallback(response){
		 $scope.getData();
		 console.log(response);
	 },function errorCallback(response){
		 console.log('error');

	 });

  };


$scope.getData = function (){
            $http.get('http://localhost/crud/index.php/pages/getdata').
	 then(function successCallback(data)
	{
		 $scope.getnames = data;
	});
 };
          $scope.getData();
				  $scope.editUser = function(user){
				  $scope.clickedUser=user;
				};

				   $scope.updateUser = function(){
					 $http.post('http://localhost/crud/index.php/pages/updatedata',$scope.clickedUser).
				   then(function successCallback(response){
					 console.log(response);
				 },function errorCallback(response){
					 console.log('error');
				 });

				 };

				   $scope.deleteUser = function(){
					 $http.post('http://localhost/crud/index.php/pages/deletedata',$scope.clickedUser).
			 	   then(function successCallback(response){
					 $scope.getData();
					 console.log(response);
				},function errorCallback(response){
					console.log('error');
				});
			 };

    });
</script>

</head>
<body ng-app="myApp" ng-controller=myCtrl>
	<div class="container">
<center><h2> Codeigniter-Angular Users</h2><hr>
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add User</button></span></center>
<div class="modal fade" id="myModal" role="dialog">
 <div class="modal-dialog">
	 <!-- Modal content-->
	 <div class="modal-content">
		 <div class="modal-header">
			 <h4 class="modal-title">New Registration</h4>
		 </div>
		 <div class="modal-body">
	<form name="User">
<div class="form-group">
	<label>Firstname:</label>
	<input type="text" class="form-control" id="fname" placeholder="Firstname" ng-model="newUser.firstname">
</div>
<div class="form-group">
	<label>Lastname:</label>
	<input type="text" class="form-control" id="lname" placeholder="Lastname" ng-model="newUser.lastname">
</div>
<div class="form-group">
	<label>E-mail:</label>
	<input type="text" class="form-control" id="email" placeholder="E-mail" ng-model="newUser.email">
</div>

<button type="submit" class="btn btn-default" ng-click ="postData()" data-dismiss="modal">Submit</button>
</form>
</div>
		 <div class="modal-footer">
			 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 </div>
	 </div>
	 </div>
</div>


</div> <br>
<table class="table table-striped">
	<tbody>
<thead>
	<tr>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Email</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
</thead>
		<tr ng-repeat = "user in getnames.data.info">

			<td>{{user.firstname}}</td>
			<td>{{user.lastname}}</td>
			<td>{{user.email}}</td>

			<td>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalEdit" ng-click="editUser(user)">Edit</button></span>
				<div class="modal fade" id="myModalEdit" role="dialog">
				 <div class="modal-dialog">
					 <!-- Modal content-->
					 <div class="modal-content">
						 <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal"></button>
							 <h4 class="modal-title"> Edit selected User</h4>
						 </div>
						 <div class="modal-body">
							 <form>
				<div class="form-group">
				 		<label>Id:</label>
				 					<input type="text" class="form-control" id="id" placeholder="Firstname" ng-model="clickedUser.id">
				 				</div>
				<div class="form-group">
					<label>Firstname:</label>
					<input type="text" class="form-control" id="fname" placeholder="Firstname" ng-model="clickedUser.firstname">
				</div>
				<div class="form-group">
					<label>Lastname:</label>
					<input type="text" class="form-control" id="lname" placeholder="Lastname" ng-model="clickedUser.lastname">
				</div>
				<div class="form-group">
					<label>E-mail:</label>
					<input type="text" class="form-control" id="email" placeholder="E-mail" ng-model="clickedUser.email">
				</div>

				<button type="submit" class="btn btn-info" ng-click="updateUser()"  data-dismiss="modal">Update</button>
			</form>
			 </div>
						 <div class="modal-footer">
							 <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						 </div>
					 </div>
					 </div>
			 </div>

			</td>
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete" ng-click="editUser(user)">Delete</button></span>
				<div class="modal fade" id="myModalDelete" role="dialog">
				 <div class="modal-dialog">
					 <!-- Modal content-->
					 <div class="modal-content">
						 <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal"></button>
							 <h4 class="modal-title"> Delete Selected info of {{clickedUser.firstname}}</h4>
						 </div>
						 <div class="modal-body">
							 <strong style="color:red;"> Sure you want to delete!!</strong>
						 </div>
						 <div class="modal-footer">
							 <button type="button" class="btn btn-danger"  ng-click="deleteUser()" data-dismiss="modal">Yes</button>
							 <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
						 </div>
					 </div>
					 </div>
			 </div>


			</td>
		</tr>
</tbody>
</table>
</body>
</html>
