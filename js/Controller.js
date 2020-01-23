//mainApp.controller("EmployeeController", function($scope,$http) { 
    mainApp.controller('network', ['$scope', '$http', function($scope, $http) { 
    $http.get('http://10.50.3.105:9090/AppManager/xml/ListAlarms?apikey=c95d8d7bbe3febbd46e0209b86e3c5b3&type=critical')
    .then(function (response_user) {
        debugger;
    $scope.user = response_user;
    $scope.color = null;
    $scope.status_code =0;
    if(response_user.status >= 100 && response_user.status <200)
    {
        $scope.color = 'gray';
        $scope.status_code =response_user.status;
    }
    else if(response_user.status >= 200 && response_user.status <300)
    {
        $scope.color = 'green';
        $scope.status_code =response_user.status;
    }
    else if(response_user.status >= 400 && response_user.status <500)
    {
        $scope.color = 'black';
        $scope.status_code =response_user.status;
    }

}, function(response) {
    //some error
    console.log(response_user.status);
    $scope.color = 'red';
    $scope.status_code =response_user.status;

    
}); 

$http.get('http://10.50.3.105:9090/AppManager/xml/ListAlarms?apikey=c95d8d7bbe3febbd46e0209b86e3c5b3&type=critical')
    .then(function (response_internet) {
        debugger;
    $scope.user = response_internet;
    $scope.color_internet = null;
    $scope.status_code_internet =0;
    if(response_internet.status == 200)
    {
        $scope.color_internet = 'green';
        $scope.status_code_internet =response_internet.status;
    }
    else if(response_internet.status == 301)
    {
        $scope.color_internet = 'blue';
        $scope.status_code_internet =response_internet.status;
    }
    else{
        $scope.color_internet = 'red';
        $scope.status_code_internet =response_internet.status;

    }
}, function(response_internet) {
    //some error
    console.log(response_internet.status);
    $scope.color_internet = 'red';
    $scope.status_code_internet =response_internet.status;

    
}); 


$http.get('http://10.50.3.105:9090/AppManager/xml/ListAlarms?apikey=c95d8d7bbe3febbd46e0209b86e3c5b3&type=critical')
    .then(function (response_firewall) {
        debugger;
    $scope.user = response_firewall;
    $scope.color_firewall = null;
    $scope.status_code_firewall =0;
    if(response_firewall.status == 200)
    {
        $scope.color_firewall = 'green';
        $scope.status_code_firewall =response_firewall.status;
    }
    else if(response_firewall.status == 301)
    {
        $scope.color_firewall = 'blue';
        $scope.status_code_firewall =response_firewall.status;
    }
    else{
        $scope.color_firewall = 'red';
        $scope.status_code_firewall =response_firewall.status;

    }
}, function(response_firewall) {
    //some error
    console.log(response_firewall.status);
    $scope.color_firewall = 'red';
    $scope.status_code_firewall =response_firewall.status; 
}); 


$http.get('http://10.50.3.105/AppManager/xml/ListAlarms?apikey=c95d8d7bbe3febbd46e0209b86e3c5b3&type=critical')
    .then(function (response_switch) {
        debugger;
    $scope.user = response_switch;
    $scope.color_switch = null;
    $scope.status_code_switch =0;
    if(response_switch.status == 200)
    {
        $scope.color_switch = 'green';
        $scope.status_code_switch =response_switch.status;
    }
    else if(response_switch.status == 301)
    {
        $scope.color_switch = 'blue';
        $scope.status_code_switch =response_switch.status;
    }
    else{
        $scope.color_switch = 'red';
        $scope.status_code_switch =response_switch.status;

    }
}, function(response_switch) {
    //some error
    console.log(response_switch.status);
    $scope.color_switch = 'red';
    $scope.status_code_switch =response_switch.status;   
}); 


}]);  