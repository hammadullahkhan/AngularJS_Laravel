(function () {
    'use strict';

    angular
        .module('app.controllers')
        .controller('TemperatureController', TemperatureController);

    TemperatureController.$inject = ['$http'];

    /* @ngInject */
    function TemperatureController ($http) {
        var vm = this;
        vm.postURL = 'temperatureSave';
        vm.heading = 'Temperature Conversion Calculator';
        vm.msgText = 'Utility to convert Fahrenheit to Celsius (and vice versa)';
        vm.fahrenheit = '';
        vm.celsius = '';
        vm.seperator = '<==>';
        vm.lableFahrenheit = 'Fahrenheit';
        vm.lableCelsius = 'Celsius';
        vm.lableSave = 'Save Log';
        vm.message = '';


        activate();

        ////////////////

        function activate() {

        }

        function isInt(n) {
            return n % 1 === 0;
        }

        function isFloat (value) {

            return  (!isNaN(value) && value.toString().indexOf('.') != -1)  ? true : false;
        }

        vm.validateInput = function (val) {

            return ( isInt(val) || isFloat(val) ) ? true : false;
        };

        vm.clearMessage = function () {

            $('#message').removeClass('btn-success');
            $('#message').removeClass('btn-danger');
            vm.message = '';
        };

        vm.showMessage = function (msgType, message) {

            switch ( msgType ) {
                case "success":
                    $('#message').addClass('btn-success');
                    vm.message = message;
                    break;
                case "fail":
                    $('#message').addClass('btn-danger');
                    vm.message = message;
                    break;
            }
        };

        vm.convertToFahrenheit = function () {

            vm.clearMessage();
            if ( !vm.validateInput(vm.celsius) ) {

                vm.showMessage('fail', 'oops!!! something went wrong. Please enter a valid input');
                return;
            }

            vm.fahrenheit = (vm.celsius * 9/5) + 32;
        };

        vm.convertToCelsius = function () {

            vm.clearMessage();
            if ( !vm.validateInput(vm.celsius) ) {

                vm.showMessage('fail', 'oops!!! something went wrong. Please enter a valid input');
                return;
            }

            vm.celsius = (vm.fahrenheit - 32) / 1.8;
        };

        vm.saveToDB = function () {

            var postData = {
                'fahrenheit': vm.fahrenheit,
                'celsius': vm.celsius
            };

            $http.post(vm.postURL, postData).then( function (response) {

                var apiResponse = response.data && response.data.apiResponse || null;

                if ( apiResponse !== null && apiResponse.result == 'Success' ) {

                    vm.showMessage('success', 'yay... successfully saved.');
                    return;
                }

                vm.showMessage('fail', 'oops!!! something went wrong. Invalid Response.');

            }, function (response) {

                vm.showMessage('fail', 'oops!!! something went wrong. Bad Response.');
                return;
            });
        };
    }

})();