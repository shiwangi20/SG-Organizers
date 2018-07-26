<?php include_once("session.php") ?>
<!doctype html>
<html lang="en">

<head>
    <title>FUNCTION-ORGANISER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript">
        var myapp = angular.module("app", []);
        myapp.controller("mycontroller", function($scope, $http) {
            $scope.event;
            $scope.showServices = function() {
                $event = $scope.event;
                $scope.jsonServices;
                $http.get("json-fetch-all-services.php?event=" + $event).then(fill, notfill);

                function fill(jsonArray) {
                    $scope.jsonServices = jsonArray.data;
                    var values = $scope.jsonServices[0].services;

                    $scope.abc = values.split(",");
                    /*alert($scope.abc);
                    $.each(values.split(","),function(i,e){
                           alert(e);
                        });*/
                }

                function notfill(jsonArray) {
                    alert(jsonArray.data);
                }
            }

            $scope.json;
            $scope.doFindVendors = function() {
                $task = $scope.requiredServices;
                $city=  $scope.city;
               // alert($task);
                //alert($scope.requiredServices);
                $http.get("json-fetch-all-vendors.php?task="+$task+"&city="+$city).then(shanti, noshanti);

                function shanti(jsonArray) {
                    //alert(JSON.stringify(jsonArray.data));
                    $scope.json = jsonArray.data;
                }

                function noshanti(jsonArray) {
                    alert(jsonArray.data);
                }

            }
            
            $scope.addToWishlist=function(vid)
            {
                //alert(vid);
                $http.get("ajax-add-to-wishlist.php?vid="+vid).then(function(response){
                    alert(response.data);
                })
            }

        });

    </script>
</head>

<body ng-app="app" ng-controller="mycontroller">
    <?php include_once("header.php") ?>
    <div class="row">

        <div class="col-md-12 " style="background-color:black">

            <center>

                <div style="color:orange;font-size:50px;">
                    EVENT ORGANISER
                </div>


            </center>

        </div>

    </div>

    <div class="container  ">
        <div class="row bg-danger" style="border:5px orange solid"><br>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form class="needs-validation text-white" id="frm" style="margin-top:20px">

                    <div class="form-row">
                        <div class="col-md-4 mb-3"> </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipEvents">Events</label>
                            <div class="form-group">
                                <select class="custom-select" ng-model="event" ng-change="showServices();">
                                  <option value="">Select Event</option>
                                  <option value="Marriage">MARRIAGE</option>
                                  <option value="Birthday">BIRTHDAY</option>
                                  <option value="Farewell">FAREWELL</option>
                                  <option value="Jagran">JAGRAN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3"> </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipTask">Services</label>
                            <div class="form-group">
                                <select class="custom-select" ng-model="requiredServices" ng-options="x for x in abc" required >
                                <option value="">Select Services</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3"> </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipCity">City</label>
                            <div class="form-group">
                                <select class="custom-select" ng-model="city" required>
                                  <option value="">Select City</option>
                                  <option value="mansa">Mansa</option>
                                  <option value="bathinda">Bathinda</option>
                                   <option value="ludhiana">Ludhiana</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <center>
                        <input class="btn btn-white" type="button" value="Find Vendors" ng-click="doFindVendors();">
                    </center>
                    <div class="form-row" style="margin-top:20px"></div>
                </form>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-3 " ng-repeat="record in json" style="margin-top:20px;margin-bottom:20px">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">{{record.fname}} {{record.lname}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{record.mobile}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{record.firmName}}</h6>
                        <p>{{record.task}}</p>
                        <input class="btn btn-danger" type="button" value="Add To Wishlist" ng-click="addToWishlist(record.vid);">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("footer.php") ?>
</body>

</html>
