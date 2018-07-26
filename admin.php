<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        var myapp = angular.module("app", []);
        myapp.controller("mycontroller", function($scope, $http) {

            
            $scope.deleteCustomer = function(cid) {
                $http.get("json-del-customer.php?cid=" + cid).then(shanti, noshanti);

                function shanti(jsonArray) {

                    alert(jsonArray.data);
                    $scope.doFetchCustomers();
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }
            
            $scope.deleteVendor = function(vid) {
                $http.get("json-del-vendor.php?vid=" + vid).then(shanti, noshanti);

                function shanti(jsonArray) {

                    alert(jsonArray.data);
                    $scope.doFetchVendors();
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }
            }

            $scope.json;
            $scope.doFetchCustomers = function() {
                $http.get("json-fetch-customers.php").then(shanti, noshanti);
                    
                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    $scope.json = jsonArray.data;
                    
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }

            }
            
             $scope.json1;
            $scope.doFetchVendors = function() {
                $http.get("json-fetch-vendors.php").then(shanti, noshanti);
                    
                function shanti(jsonArray) {
                    //alert(JSON.stringify(response.data));
                    $scope.json1 = jsonArray.data;
                    
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }

            }
            
            
        });

    </script>
</head>

<body ng-app="app" ng-controller="mycontroller">
  <div class="row">
      <div class="col-md-12 bg-danger text-white">
         <center>
             <h1>ADMIN DASHBOARD</h1>
         </center>
          
      </div>
    </div>
      <div class="row">
         <div class="col-md-6">
             <center>
                 <img src="pics/loginn.png" style="border:1px white solid;border-radius:50%">
                  Filter:<input type="text" ng-model="chint">
        <p>
            <input type="button" ng-click="doFetchCustomers();" value="fetch customers">
        </p>
        <table width="400" border=1>
            <tr>
                <th>Sr. No</th>
                <th>UID</th>
                <th>Password</th>
                <th>Mobile</th>
            </tr>
            <tr ng-repeat="record in json | filter:chint">
                <td>{{$index+1}}</td>
                <td>{{record.cid}}</td>
                <td>{{record.pwd}}</td>
                <td>{{record.mobile}}</td>
                <th>
                    <input type="button" ng-click="deleteCustomer(record.cid);" value="delete"></th>
            </tr>
        </table>
             </center>
         </div>
         
         <div class="col-md-6">
             <center>
                 <img src="pics/customer.PNG" style="border:1px white solid;border-radius:50%">
                   Filter:<input type="text" ng-model="vhint">
        <p>
            <input type="button" ng-click="doFetchVendors();" value="fetch vendors">
        </p>
        <table width="400" border=1>
            <tr>
                <th>Sr. No</th>
                <th>UID</th>
                <th>Password</th>
                <th>Mobile</th>
            </tr>
            <tr ng-repeat="record in json1 | filter:vhint">
                <td>{{$index+1}}</td>
                <td>{{record.uid}}</td>
                <td>{{record.pwd}}</td>
                <td>{{record.mobile}}</td>
                <th>
                    <input type="button" ng-click="deleteVendor(record.uid);" value="delete"></th>
            </tr>
        </table>
             </center>
         </div>
          
      </div>
</body>
</html>